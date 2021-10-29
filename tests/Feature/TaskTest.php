<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Database\Factories\LabelFactory;
use Tests\TestCase;

class TaskTest extends TestCase
{
    private User $user;
    private Task $task;
    private Label $label;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->label = Label::factory()->create();
        $this->task = Task::factory()->create();
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
        $data = Task::factory()
            ->for($this->user, 'creator')
            ->make()
            ->toArray();

        $response = $this->actingAs($this->user)
            ->post(route('tasks.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testStoreWithLabel(): void
    {
        $taskData = Task::factory()
            ->for($this->user, 'creator')
            ->make()
            ->toArray();
        $data = array_merge($taskData, ['labels' => [$this->label->id]]);

        $response = $this->actingAs($this->user)
            ->post(route('tasks.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);
        $this->assertDatabaseCount('label_task', 1);
    }

    public function testStoreWithExistingTaskName(): void
    {
        $data = Task::factory()
            ->for($this->user, 'creator')
            ->make(['name' => $this->task->name])
            ->toArray();

        $response = $this->actingAs($this->user)
            ->post(route('tasks.store', $data));
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
        $this->assertDatabaseMissing('tasks', $data);
    }

    public function testShow(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('tasks.show', $this->task));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('tasks.edit', $this->task));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = Task::factory()
            ->make(['created_by_id' => $this->task->creator->id])
            ->toArray();

        $response = $this->actingAs($this->user)
            ->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdateWithLabel(): void
    {
        $taskData = Task::factory()
            ->make(['created_by_id' => $this->task->creator->id])
            ->toArray();
        $data = array_merge($taskData, ['labels' => [$this->label->id]]);

        $response = $this->actingAs($this->user)
            ->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);
        $this->assertDatabaseCount('label_task', 1);
    }

    public function testUpdateWithExistingTaskName(): void
    {
        $anotherTask = Task::factory()->create();
        $existingName = $anotherTask->name;
        $data = Task::factory()
            ->make([
                'name' => $existingName,
                'created_by_id' => $this->task->creator->id,
            ])
            ->toArray();

        $response = $this->actingAs($this->user)
            ->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testDestroy(): void
    {
        $existUserTask = Task::factory()
            ->for($this->user, 'creator')
            ->create();

        $response = $this->actingAs($this->user)
            ->delete(route('tasks.destroy', $existUserTask));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($existUserTask);
    }

    public function testDestroyTaskThatNotBelongToUser(): void
    {
        $response = $this->actingAs($this->user)
            ->delete(route('tasks.destroy', $this->task));
        $response->assertForbidden();
    }
}
