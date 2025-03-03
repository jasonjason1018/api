<?php

namespace App\Http\Controllers;

use App\Models\TodolistTask;
use Illuminate\Http\Request;

class TodolistTaskController extends Controller
{
    protected function getTaskList(Request $request)
    {
        return TodolistTask::get();
    }
}
