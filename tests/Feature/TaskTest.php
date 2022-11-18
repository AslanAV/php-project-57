<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    private User $user1;
    private User $user2;
    private Task $task;
    private array $data;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user1 = User::factory()->create();
        $this->user2 = User::factory()->create();
        $this->taskStatus = TaskStatus::factory()->create();
        $this->task = Task::factory()->create();
        $this->data = Task::factory()->make()->only(
            [
                'name',
                'description',
                'status_id',
                'assigned_to_id',
            ]
        );
        $this->task2 = Task::factory()->create();
        $this->data2 = $this->task2->only(
            [
                'name',
                'description',
                'status_id',
                'assigned_to_id',
            ]
        );
    }

    public function testTasksPage(): void
    {
        $response = $this->actingAs($this->user1)
            ->withSession(['banned' => false])
            ->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testStoreTask(): void
    {
        $response = $this->actingAs($this->user1)
            ->withSession(['banned' => false])
            ->post(route('tasks.store', $this->data));

        $response->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', $this->data);
    }

    public function testNotCreateStoreTaskWithoutAuthorized(): void
    {
        $response = $this->post(route('tasks.store', $this->data));

        $response->assertRedirect('tasks');

        $this->assertDatabaseMissing('tasks', $this->data);
    }

    public function testEditPage(): void
    {
        $response = $this->actingAs($this->user1)
                        ->withSession(['banned' => false])
                        ->get(route('tasks.edit', $this->task));

        $response->assertOk();
    }

    public function testUpdateTask(): void
    {
        $response = $this->actingAs($this->user1)
            ->withSession(['banned' => false])
            ->put(route('tasks.update', $this->task), $this->data);

        $response->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', $this->data);
    }

    public function testNotUpdateTaskWithoutAuthorized(): void
    {
        $response = $this->put(route('tasks.update', $this->task), $this->data);

        $response->assertRedirect('/tasks');

        $this->assertDatabaseMissing('tasks', $this->data);
    }

    public function testDeleteTask(): void
    {
        $response = $this->actingAs($this->user2)
            ->withSession(['banned' => false])
            ->delete(route('tasks.destroy', $this->task));

        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', $this->task->only([
            'name',
            'description',
            'status_id',
            'assigned_to_id'
        ]));
    }

    public function testNotDeleteTaskWithoutCreater(): void
    {
        $responseUser1 = $this->actingAs($this->user1)
            ->withSession(['banned' => false])
            ->post(route('tasks.store', $this->data2));


        $responseUser2 = $this->actingAs($this->user2)
            ->withSession(['banned' => false])
            ->delete(route('tasks.destroy', $this->task2));


        $responseUser2->assertRedirect();

        $this->assertDatabasehas('tasks', $this->data2);
    }

    public function testNotCreateTaskUnauthorized(): void
    {
        $response = $this->get(route('tasks.create'));

        $response->assertStatus(403);
    }
}
