<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TodolistTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodolistTaskControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTodoListTaskList()
    {
        $todolistTask = TodolistTask::create([
            'text' => 'test',
        ]);

        $response = $this->get('/api/todoList/list');
        $response->assertStatus(200);
        $this->assertEquals($response->json()['result'][0]['text'], $todolistTask->text);
    }
}
