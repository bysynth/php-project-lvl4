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

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var TaskStatus $taskStatus */
        $taskStatus = TaskStatus::factory()->create();
        $this->taskStatus = $taskStatus;

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->post(route('task_statuses.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testStoreWithExistingTaskStatusName(): void
    {
        $data = $this->taskStatus->name;

        $response = $this->post(route('task_statuses.store', $data));
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testEdit(): void
    {
        $response = $this->get(route('task_statuses.edit', $this->taskStatus));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->patch(route('task_statuses.update', $this->taskStatus), $data);
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

        $response = $this->patch(route('task_statuses.update', $newTaskStatus), $data);
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testDestroy(): void
    {
        $response = $this->delete(route('task_statuses.destroy', $this->taskStatus));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($this->taskStatus);
    }

    public function testDestroyTaskStatusThatUsedInTask(): void
    {
        $taskStatus = TaskStatus::factory()
            ->has(Task::factory(), 'tasks')
            ->create();

        $response = $this->delete(route('task_statuses.destroy', $taskStatus));
        $response->assertRedirect();
        $this->assertDatabaseHas('task_statuses', $taskStatus->toArray());
    }
}
