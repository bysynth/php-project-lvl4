<?php

namespace Tests\Feature;

use App\Models\Label;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LabelTest extends TestCase
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

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('labels.index'));
        $response->assertOk();
    }

    public function testCreate(): void
    {
        $response = $this->get(route('labels.create'));
        $response->assertOk();
    }

    public function testStore(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->post(route('labels.store', $data));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $data);
    }

    public function testStoreWithExistingLabelName(): void
    {
        $data = $this->label->name;

        $response = $this->post(route('labels.store', $data));
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testEdit(): void
    {
        $response = $this->get(route('labels.edit', $this->label));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $data = ['name' => 'Test'];

        $response = $this->patch(route('labels.update', $this->label), $data);
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

        $response = $this->patch(route('labels.update', $newLabel), $data);
        $response->assertSessionHasErrors('name');
        $response->assertRedirect();
    }

    public function testDestroy(): void
    {
        $response = $this->delete(route('labels.destroy', $this->label));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();
        $this->assertDeleted($this->label);
    }

    public function testDestroyLabelThatUsedInTask(): void
    {
        $label = Label::factory()
            ->has(Task::factory(), 'tasks')
            ->create();

        $response = $this->delete(route('labels.destroy', $label));
        $response->assertRedirect();
        $this->assertDatabaseHas('labels', $label->toArray());
    }
}
