<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Todolist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTask()
    {
        $taskContent = 'Test Task';
        $params = [
            'task_content' => $taskContent
        ];

        $this->assertEquals(0, Todolist::count());

        $response = $this->call('POST', '/api/todo/task', $params);
        $response->assertStatus(200);

        $todolist = Todolist::first();

        $this->assertEquals($taskContent, $todolist->task_content);
    }

    private function createFakeTodolist()
    {
        $taskContent = 'Test Task';
        $params = [
            'task_content' => $taskContent
        ];

        return Todolist::create($params);
    }

    public function testGetTaskList()
    {
        $todolist = $this->createFakeTodolist();

        $params = [
            'status' => Todolist::STATUS['unprocess']
        ];

        $response = $this->call('GET', '/api/todo/task', $params);
        $response->assertStatus(200);

        $this->assertEquals($todolist->task_content, $response->json()['result'][0]['task_content']);
    }

    public function testDeleteTask()
    {
        $todolist = $this->createFakeTodolist();
        $this->assertEquals(1, Todolist::count());

        $response = $this->call('delete', "/api/todo/task/$todolist->id_todolist");
        $response->assertStatus(200);

        $this->assertEquals(0, Todolist::count());
    }

    public function testUpdateTask()
    {
        $todolist = $this->createFakeTodolist();
        $newContent = 'test update';

        $this->assertNotEquals($todolist->task_content, $newContent);

        $params = [
            'task_content' => $newContent
        ];

        $response = $this->call('patch', "/api/todo/task/$todolist->id_todolist", $params);
        $response->assertStatus(200);

        $this->assertEquals($newContent, $todolist->refresh()->task_content);
    }
}
