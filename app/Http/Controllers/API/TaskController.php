<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Http\Resources\TaskResourceCollection;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks(Request $request)
    {
        $tasks = Task::paginate();
        return new TaskResourceCollection($tasks);
    }

    public function getTask($id)
    {
        $task = Task::findOrFail($id);
        TaskResource::withoutWrapping();
        return new TaskResource($task);
    }

    public function createTask()
    {
    }

    public function deleteTask($id)
    {
    }

    public function updateTask($id)
    {
    }
}
