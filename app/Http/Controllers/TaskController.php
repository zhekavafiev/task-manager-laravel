<?php

namespace App\Http\Controllers;

use App\Label;
use App\Task;
use App\TaskStatus;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use App\Jobs\CreateNewTaskMail;
use Exception;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'update', 'destroy'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter');
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status', 'status_id')->ignore(0),
                AllowedFilter::exact('creator', 'creator_by_id')->ignore(0),
                AllowedFilter::exact('assigner', 'assigned_to_id')->ignore(0),
                AllowedFilter::callback('label', function (Builder $q, $value) {
                    $q->whereHas('label', function ($q) use ($value) {
                        $q->where('id', $value);
                    });
                })->ignore(0)
            ])
            ->get();
        $statuses = TaskStatus::get();
        $users = User::get();
        $labels = Label::get();
        return view('tasks.index', compact('tasks', 'statuses', 'users', 'labels', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task();
        $statuses = TaskStatus::get();
        $users = User::get();
        $labels = Label::get();
        return view('tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Task $task)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'status_id' => 'not_in:0',
            'description' => 'max:1000|min:5',
            'assigned_to_id' => 'nullable'
        ]);
        $data = $request->input();
        $labelId = $data['label_id'] ?? null;
        $task = new Task();
        $label = Label::find($labelId);
        $task->fill($data);
        $task->creator()->associate(Auth::user());
        $task->save();
        $task->label()->attach($label);

        flash(__('flash.tasks_added'))->success();

        if ($task->assigned_to_id) {
            CreateNewTaskMail::dispatch($task);
        }
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $statuses = TaskStatus::get();
        $users = User::get();
        $labels = Label::get();
        return view('tasks.edit', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:255',
            'status_id' => 'not_in:0',
            'description' => 'max:1000|min:5',
            'assigned_to_id' => 'nullable',
            'label_id' => 'numeric'
        ]);
        $task->fill($data);
        $task->save();
        flash(__('flash.tasks_update'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            $this->authorize('delete', $task);
            if ($task) {
                flash(__('flash.tasks_delete'))->success();
                $task->label()->detach();
                $task->delete();
            }
            return redirect()->route('tasks.index');
        } catch (Exception $e) {
            flash(__('flash.tasks_delete_error'))->error();
            return redirect()->back();
        }
    }
}
