<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class LabelTest extends TestCase
{
    private User $user;
    private Label $label;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->label = Label::factory()->create();
    }

    public function testIndex(): void
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('labels.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->actingAs($this->user)
            ->post(route('labels.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $data);
    }

    public function testStoreWithExistingLabelName(): void
    {
        $data = $this->label->name;

        $response = $this->actingAs($this->user)
            ->post(route('labels.store', $data));
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('labels.edit', $this->label));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->actingAs($this->user)
            ->patch(route('labels.update', $this->label), $data);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $data);
    }

    public function testUpdateWithExistingLabelName(): void
    {
        $newLabel = Label::factory()->create();
        $data = [
            'name' => $this->label->name
        ];

        $response = $this->actingAs($this->user)
            ->patch(route('labels.update', $newLabel), $data);
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testDestroy(): void
    {
        $response = $this->actingAs($this->user)
            ->delete(route('labels.destroy', $this->label));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($this->label);
    }

    public function testDestroyLabelThatUsedInTask(): void
    {
        $label = Label::factory()
            ->has(Task::factory(), 'tasks')
            ->create();

        $response = $this->actingAs($this->user)
            ->delete(route('labels.destroy', $label));
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $label->toArray());
    }
}
