<?php

namespace App\Http\Controllers;

use App\Label;
use App\Task;
use Exception;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function adminIndex()
    {
        if (Gate::allows('admin')) {
            $labels = Label::get();
            return view('labels.index', compact('labels'));
        }
        flash(__('flash.labels_admin'))->error();
        return redirect()->route('tasks.index');
    }

    public function adminDestroy(Label $label)
    {
        if (Gate::allows('admin')) {
            $label->task()->detach();
            $label->delete();
            return redirect()->route('labels.adminIndex');
        }

        flash(__('flash.labels_admin'))->error();
        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Task $task)
    {
        return view('labels.create', compact('task'));
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
            'text' => 'required|max:7'
        ]);

        $label = new Label();
        $label->fill($request->input());
        $label->save();
        $task->label()->attach($label);
        flash(__('flash.labels_store'))->success();
        return redirect()->route('tasks.show', $task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Label  $label
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task, Label $label)
    {
        if ($label) {
            $task->label()->detach($label);
        }
        return redirect()->back();
    }

    public function newConnection(Request $request, Task $task)
    {
        $this->validate($request, [
            'label_id' => 'exists:App\Label,id'
        ]);
        
        $label = Label::find($request->input()['label_id']);
        
        try {
            $task->label()->attach($label);
            flash(__('flash.add_labels_to_task'))->success();
        } catch (Exception $e) {
            flash(__('flash.add_labels_to_task_error'))->error();
        }

        return redirect()->back();
    }
}
