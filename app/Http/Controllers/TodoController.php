<?php

namespace App\Http\Controllers;

use App\Services\TodoService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function createTask(Request $request)
    {
        $taskContent = $request->input('task_content');

        if (!$taskContent) {
            throw new \Exception('Invalid Parameter Request');
        }

        $todoService = new TodoService();

        return $todoService->createTask($taskContent);
    }

    public function getTask()
    {
        $todoService = new TodoService();

        return $todoService->getTask();
    }
}
