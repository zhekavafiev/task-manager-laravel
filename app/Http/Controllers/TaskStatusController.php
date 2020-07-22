<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskStatus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $a = User::get();
        
        // factory(Task::class)->create();
        // $a = TaskStatus::get()->pluck('id')->random();
        // dd($a);
        $statuses = TaskStatus::get();
        return view('task_statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*
            Разобраться переделать под гейт
        */
        if (empty(Auth::user())) {
            return redirect()->route('login');
        }

        $status = new TaskStatus();
        return view('task_statuses.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:task_statuses|min:5|max:255:'
        ]);
               
        $status = new TaskStatus();
        $status->fill($data);
        $status->save();
        flash("Status {$status->name} will be added")->success();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function show(TaskStatus $taskStatus)
    {
        dd(Auth::user() === null, empty(!Auth::user()));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        /*
            Разобраться переделать под гейт
        */

        if (empty(Auth::user())) {
            return redirect()->route('login');
        }

        $status = TaskStatus::findOrFail($taskStatus->id);
        return view('task_statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:task_statuses|min:5|max:255:'
        ]);
        flash("Status name will be changed from {$taskStatus->name} to {$data['name']}")->success();

        $taskStatus->fill($data);
        $taskStatus->save();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $taskStatus)
    {
        /*
            Разобраться переделать под гейт
        */

        if (empty(Auth::user())) {
            return redirect()->route('login');
        }

        flash("Statuse {$taskStatus->name} will be removed")->success();
        
        if ($taskStatus) {
            $taskStatus->delete();
        }

        return redirect()->route('task_statuses.index');
    }
}
