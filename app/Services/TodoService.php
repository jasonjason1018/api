<?php

namespace App\Services;

use App\Models\Todolist;

class TodoService
{
    public function createTask($taskContent)
    {
        return Todolist::create([
            'task_content' => $taskContent
        ]);
    }

    public function getTask()
    {
        return Todolist::select('id_todolist', 'task_content')
            ->where('status', '=', Todolist::STATUS['unprocess'])
            ->get();
    }
}
