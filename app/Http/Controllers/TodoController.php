<?php

namespace App\Http\Controllers;

use App\Models\Todolist;
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

    public function getTask(Request $request)
    {
        $status = $request->get('status', null);

        if ($status === null) {
            throw new \Exception('Invalid Parameter Request');
        }

        $todoService = new TodoService();

        return $todoService->getTask($status);
    }

    public function deleteTask($idTodolist)
    {
        if (!$idTodolist) {
            throw new \Exception('Invalid Parameter Request');
        }

        $todolist = Todolist::find($idTodolist);

        if (!$todolist) {
            throw new \Exception('idTodolist not found');
        }


        $TodoService = new TodoService();
        $TodoService->deleteTask($idTodolist);
    }

    public function updateTask(Request $request, $idTodolist)
    {
        $taskContent = $request->input('task_content');
        $status = $request->input('status', null);

        if ((!$taskContent && $status === null) || !$idTodolist) {
            throw new \Exception('Invalid Parameter Request');
        }

        if ($taskContent) {
            $updateData['task_content'] = $taskContent;
        }

        if ($status !== null) {
            $updateData['status'] = $status;
        }

        $todolist = Todolist::find($idTodolist);

        if (!$todolist) {
            throw new \Exception('idTodolist not found');
        }

        $TodoService = new TodoService();
        $TodoService->updateTask($idTodolist, $updateData);
    }
}
