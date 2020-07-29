<?php

namespace App\Http\Controllers;

use App\TaskStatus;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if (Gate::allows('edit-create-delete-status')) {
            $status = new TaskStatus();
            return view('task_statuses.create', compact('status'));
        } else {
            flash('You need register or log in')->error();
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::allows('edit-create-delete-status')) {
            $data = $this->validate($request, [
                'name' => 'required|unique:task_statuses|max:255:'
            ]);
                   
            $status = new TaskStatus();
            $status->fill($data);
            $status->save();
            flash(__('flash.statuses_added'))->success();
            return redirect()->route('task_statuses.index');
        } else {
            flash(__('flash.statuses_create_error'))->error();
            return redirect()->back();
        }
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskStatus $taskStatus)
    {
        if (Gate::allows('edit-create-delete-status')) {
            $status = TaskStatus::find($taskStatus->id);
            return view('task_statuses.edit', compact('status'));
        } else {
            flash(__('flash.statuses_create_error'))->error();
            return redirect()->back();
        }
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
        if (Gate::allows('edit-create-delete-status')) {
            $data = $this->validate($request, [
                'name' => 'required|unique:task_statuses|min:5|max:255:'
            ]);
            flash(__('flash.statuses_update'))->success();
    
            $taskStatus->fill($data);
            $taskStatus->save();
            return redirect()->route('task_statuses.index');
        } else {
            flash(__('flash.statuses_create_error'))->error();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskStatus  $taskStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if (Gate::allows('edit-create-delete-status')) {
            try {
                if ($taskStatus) {
                    $taskStatus->delete();
                }
                flash(__('flash.statuses_delete'))->success();
                return redirect()->route('task_statuses.index');
            } catch (Exception $e) {
                Log::info("Attempt to delete {$taskStatus->name}" . $e->getMessage());
                flash(__('flash.status_have_task_error'))->error();
                return redirect()->back();
            }
        } else {
            flash(__('flash.statuses_create_error'))->error();
            return redirect()->back();
        }
    }
}
