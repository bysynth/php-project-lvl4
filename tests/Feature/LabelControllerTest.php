<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    private User $user;
    private Label $label;

    protected function setUp(): void
    {
        parent::setUp();

        /** @var User $user */
        $user = User::factory()->create();
        $this->user = $user;

        /** @var Label $label */
        $label = Label::factory()->create();
        $this->label = $label;
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
        $labelData = Label::factory()->make()->toArray();

        $response = $this->actingAs($this->user)
            ->post(route('labels.store', $labelData));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $labelData);
    }

    public function testEdit(): void
    {
        $response = $this->actingAs($this->user)
            ->get(route('labels.edit', $this->label->id));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $labelData = Label::factory()->make()->toArray();

        $response = $this->actingAs($this->user)
            ->patch(route('labels.update', $this->label->id), $labelData);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $labelData);
    }

    public function testDestroy(): void
    {
        $response = $this->actingAs($this->user)
            ->delete(route('labels.destroy', $this->label->id));
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
