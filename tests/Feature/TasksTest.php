<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TasksTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_task_list(): void
    {
        $response = $this->get('/tasks');

        $response->assertStatus(200);

        $response->assertSee('Tasks List');
    }

    public function test_create_new_task(): void
    {
        $response = $this->post('/tasks', [
            'name' => 'Test Task',
            'description' => 'This is just a test task.'
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task'
        ]);
    }

    public function test_destroy_task(): void
    {
        $task = Task::create([
            'name' => 'Test Delete Task',
            'description' => 'This a test task to be deleted.'
        ]);

        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Delete Task'
        ]);

        $task->delete();

        $this->assertDatabaseMissing('tasks', [
            'name' => 'Test Delete Task'
        ]);
    }
}
