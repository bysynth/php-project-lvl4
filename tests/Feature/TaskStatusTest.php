<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    private User $user;
    private TaskStatus $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->user = Auth::loginUsingId($user->id);
        $taskStatusData = TaskStatus::factory()->make()->toArray();
        $this->taskStatus = TaskStatus::create($taskStatusData);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->actingAs($this->user)
            ->post(route('task_statuses.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testStoreWithExistingTaskStatusName(): void
    {
        $data = $this->taskStatus->name;

        $response = $this->actingAs($this->user)
            ->post(route('task_statuses.store', $data));
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('task_statuses.edit', $this->taskStatus));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->actingAs($this->user)
            ->patch(route('task_statuses.update', $this->taskStatus), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdateWithExistingTaskStatusName(): void
    {
        $newTaskStatus = TaskStatus::factory()->create();
        $data = [
            'name' => $this->taskStatus->name
        ];

        $response = $this->actingAs($this->user)
            ->patch(route('task_statuses.update', $newTaskStatus), $data);
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testDestroy(): void
    {
        $response = $this->actingAs($this->user)
            ->delete(route('task_statuses.destroy', $this->taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($this->taskStatus);
    }

    public function testDestroyTaskStatusThatUsedInTask(): void
    {
        $taskStatus = TaskStatus::factory()
            ->has(Task::factory(), 'tasks')
            ->create();

        $response = $this->actingAs($this->user)
            ->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $taskStatus->toArray());
    }
}
