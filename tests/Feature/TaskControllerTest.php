<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    private User $user;
    private Task $task;
    private Label $label;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var Task $task */
        $task = Task::factory()->create();
        $this->task = $task;

        /** @var Label $label */
        $label = Label::factory()->create();
        $this->label = $label;
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $taskData = Task::factory()
            ->for($this->user, 'creator')
            ->make()
            ->toArray();

        $response = $this->actingAs($this->user)
            ->post(route('tasks.store', $taskData));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function testStoreWithLabel(): void
    {
        $taskData = Task::factory()
            ->for($this->user, 'creator')
            ->make()
            ->toArray();
        $taskDataWithLabel = array_merge($taskData, ['labels' => [$this->label->id]]);

        $response = $this->actingAs($this->user)
            ->post(route('tasks.store', $taskDataWithLabel));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);

        $lastSavedTask = Task::all()->last();
        $labelTaskTableExpectedData = [
            'label_id' => $this->label->id,
            'task_id' => $lastSavedTask->id
        ];
        $this->assertDatabaseHas('label_task', $labelTaskTableExpectedData);
    }

    public function testShow(): void
    {
        $response = $this->get(route('tasks.show', $this->task->id));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('tasks.edit', $this->task->id));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $taskData = Task::factory()
            ->make(['created_by_id' => $this->task->created_by_id])
            ->toArray();

        $response = $this->actingAs($this->user)
            ->patch(route('tasks.update', $this->task->id), $taskData);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function testUpdateWithLabel(): void
    {
        $taskData = Task::factory()
            ->make(['created_by_id' => $this->task->created_by_id])
            ->toArray();
        $taskDataWithLabel = array_merge($taskData, ['labels' => [$this->label->id]]);
        $labelTaskTableExpectedData = [
            'label_id' => $this->label->id,
            'task_id' => $this->task->id
        ];

        $response = $this->actingAs($this->user)
            ->patch(route('tasks.update', $this->task->id), $taskDataWithLabel);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);
        $this->assertDatabaseHas('label_task', $labelTaskTableExpectedData);
    }

    public function testDestroy(): void
    {
        $existUserTask = Task::factory()
            ->for($this->user, 'creator')
            ->create();

        $response = $this->actingAs($this->user)
            ->delete(route('tasks.destroy', $existUserTask->id));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($existUserTask);
    }

    public function testDestroyTaskThatNotBelongToUser(): void
    {
        $response = $this->delete(route('tasks.destroy', $this->task->id));
        $response->assertForbidden();
    }
}
