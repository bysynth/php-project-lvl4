<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskTest extends TestCase
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

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->get(route('tasks.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = Task::factory()
            ->for($this->user, 'creator')
            ->make()
            ->toArray();

        $response = $this->post(route('tasks.store', $data));
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

        $response = $this->post(route('tasks.store', $data));
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

        $response = $this->post(route('tasks.store', $data));
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
        $this->assertDatabaseMissing('tasks', $data);
    }

    public function testShow(): void
    {
        $response = $this->get(route('tasks.show', $this->task));
        $response->assertOk();
    }

    public function testEdit(): void
    {
        $response = $this->get(route('tasks.edit', $this->task));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = Task::factory()
            ->make(['created_by_id' => $this->task->created_by_id])
            ->toArray();

        $response = $this->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testUpdateWithLabel(): void
    {
        $taskData = Task::factory()
            ->make(['created_by_id' => $this->task->created_by_id])
            ->toArray();
        $data = array_merge($taskData, ['labels' => [$this->label->id]]);

        $response = $this->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('tasks', $taskData);
        $this->assertDatabaseCount('label_task', 1);
    }

    public function testUpdateWithExistingTaskName(): void
    {
        $anotherTaskData = Task::factory()->make()->toArray();
        $anotherTask = Task::create($anotherTaskData);
        $existingName = $anotherTask->name;
        $data = Task::factory()
            ->make([
                'name' => $existingName,
                'created_by_id' => $this->task->created_by_id,
            ])
            ->toArray();

        $response = $this->patch(route('tasks.update', $this->task), $data);
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testDestroy(): void
    {
        $existUserTask = Task::factory()
            ->for($this->user, 'creator')
            ->create();

        $response = $this->delete(route('tasks.destroy', $existUserTask));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($existUserTask);
    }

    public function testDestroyTaskThatNotBelongToUser(): void
    {
        $response = $this->delete(route('tasks.destroy', $this->task));
        $response->assertForbidden();
    }
}
