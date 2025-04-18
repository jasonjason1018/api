<?php

namespace App\Services;

use App\Models\Todolist;
use Carbon\Carbon;

class TodoService
{
    public function createTask($taskContent)
    {
        return Todolist::create([
            'task_content' => $taskContent
        ]);
    }

    public function getTask($status)
    {
        return Todolist::select('id_todolist', 'task_content', 'updated_at')
            ->where('status', '=', $status)
            ->get();
    }

    public function deleteTask($idTodolist)
    {
        return Todolist::where('id_todolist', '=', $idTodolist)->delete();
    }

    public function updateTask($idTodolist, $updateData)
    {
        return Todolist::where('id_todolist', '=', $idTodolist)
            ->update($updateData);
    }
}
