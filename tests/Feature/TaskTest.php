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

    private User $user;
    private TaskStatus $taskStatus;
    private array $data;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->task = Task::factory()->create();
        $this->data = Task::factory()->make()->only(
            [
                'name',
                'description',
                'status_id',
                'created_by_id',
                'assigned_by_id',
            ]
        );
    }

    public function testTaskPage(): void
    {
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->get(route('tasks.index'));

        $response->assertOk();
    }

    public function testStoreTaskStatus(): void
    {
        $response = $this->actingAs($this->user)
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
        $response = $this->actingAs($this->user)
                        ->withSession(['banned' => false])
                        ->get(route('tasks.edit', $this->taskStatus));

        $response->assertOk();
    }

    public function testUpdateTaskStatus(): void
    {
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->put(route('tasks.update', $this->taskStatus), $this->data);

        $response->assertRedirect('/tasks');

        $this->assertDatabaseHas('tasks', $this->data);
    }

    public function testNotUpdateTaskWithoutAuthorized(): void
    {
        $response = $this->put(route('tasks.update', $this->taskStatus), $this->data);

        $response->assertRedirect('/tasks');

        $this->assertDatabaseMissing('tasks', $this->data);
    }

    public function testDeleteTask(): void
    {
        $response = $this->actingAs($this->user)
            ->withSession(['banned' => false])
            ->delete(route('tasks.destroy', $this->taskStatus));

        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', $this->taskStatus->only(['name']));
    }

    public function testNotCreateTaskUnauthorized(): void
    {
        $response = $this->get(route('tasks.create'));

        $response->assertStatus(403);
    }
}
