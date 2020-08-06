<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskCollection;
use App\Task;
use Illuminate\Http\Request;

class ApiTaskController extends Controller
{
    public function getTasks(Request $request)
    {
        $limit = $request->get('limit', 1);
        $offset = $request->get('offset', 0);
        $tasks = Task::limit($limit)
            ->offset($offset)
            ->get();
        return new TaskCollection($tasks);
    }

    public function getTask($id)
    {
        $task = Task::findOrFail($id);
        return new TaskCollection($task);
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
