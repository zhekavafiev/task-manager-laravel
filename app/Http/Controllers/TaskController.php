<?php

namespace App\Http\Controllers;

use App\Label;
use App\Task;
use App\TaskStatus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('edit-create-task')) {
            flash('You need register or log in')->error();
            return redirect()->back();
        }
        $task = new Task();
        $getStatuses = TaskStatus::select('id', 'name')
            ->get();
        $getUsers = User::select('id', 'name')
            ->get();
        $getLabels = Label::select('id', 'text')
            ->get();

        $statuses[0] = 'Status';
        $users[0] = 'Assigner';
        $labels[0] = 'Label';
        
        foreach ($getLabels as $label) {
            $labels[$label->id] = $label->text;
        }
        
        foreach ($getStatuses as $status) {
            $statuses[$status->id] = $status->name;
        }

        foreach ($getUsers as $user) {
            $users[$user->id] = $user->name;
        }

        return view('tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('edit-create-task')) {
            flash('You need register or log in')->error();
            return redirect()->back();
        }

        $data = $this->validate($request, [
            'name' => 'required|max:255',
            'status_id' => 'not_in:0',
            'description' => 'max:1000|min:5',
            'assigned_to_id' => 'required'
        ]);
        $task = new Task();
        $task->fill($data);
        $task->creator()->associate(Auth::user());

        // вынести в Form Request validation

        if ($task->assigned_to_id == 0) {
            $task->assigned_to_id = null;
        }
        $task->save();

        flash("Task {$task->nane} will be added")->success();
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
        if (!Gate::allows('edit-create-task')) {
            flash('You need register or log in')->error();
            return redirect()->back();
        }

        $getStatuses = TaskStatus::select('id', 'name')
            ->get();
        $getUsers = User::select('id', 'name')
            ->get();
        $getLabels = Label::select('id', 'text')
            ->get();

        $statuses[0] = 'Status';
        $users[0] = 'Assigner';
        $labels[0] = 'Label';
        
        foreach ($getLabels as $label) {
            $labels[$label->id] = $label->text;
        }

        foreach ($getUsers as $user) {
            $users[$user->id] = $user->name;
        }

        foreach ($getStatuses as $status) {
            $statuses[$status->id] = $status->name;
        }

        // dd($labels);
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
        // dd($request->input());
        if (!Gate::allows('edit-create-task')) {
            flash('You need register or log in')->error();
            return redirect()->back();
        }

        $data = $this->validate($request, [
            'name' => 'required|max:255',
            'status_id' => 'not_in:0',
            'description' => 'max:1000|min:5',
            'assigned_to_id' => 'required',
            'label_id' => 'numeric'
        ]);
        // dd($data);
        if ($data['assigned_to_id'] == 0) {
            $data['assigned_to_id'] = null;
        }
        $task->fill($data);
        $task->save();
        flash("Task {$task->name} will be updated")->success();
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
        if (Gate::allows('delete-task', $task)) {
            if ($task) {
                flash("Task {$task->name} will be deleted");
                $task->delete();
            }
            return redirect()->route('tasks.index');
        } else {
            flash('You need register or log in or this task wos not created by you')->error();
            return redirect()->back();
        }
    }
}
