<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Tests\TestCase;

class TaskStatusControllerTest extends TestCase
{
    private User $user;
    private TaskStatus $taskStatus;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var TaskStatus $taskStatus */
        $taskStatus = TaskStatus::factory()->create();
        $this->taskStatus = $taskStatus;
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
        $taskStatusData = TaskStatus::factory()->make()->toArray();

        $response = $this->actingAs($this->user)
            ->post(route('task_statuses.store', $taskStatusData));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $taskStatusData);
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('task_statuses.edit', $this->taskStatus));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $taskStatusData = TaskStatus::factory()->make()->toArray();

        $response = $this->actingAs($this->user)
            ->patch(route('task_statuses.update', $this->taskStatus), $taskStatusData);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $taskStatusData);
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
