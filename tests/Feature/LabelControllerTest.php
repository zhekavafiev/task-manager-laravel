<?php

namespace Tests\Feature;

use App\Label;
use App\Task;
use App\User;
use Tests\TestCase;

class LabelTest extends TestCase
{
    protected $user;
    protected $task;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = factory(User::class)->create();
        $this->task = factory(Task::class)->create();
    }

    public function testCreate()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('tasks.labels.create', $this->task));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = ['text' => 'Test'];
        $response = $this
            ->actingAs($this->user)
            ->post(route('tasks.labels.store', $this->task), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertNotEmpty($this->task->label);
        $this->assertDatabaseHas('labels', $data);
    }

    public function testDestroy()
    {
        $label = factory(Label::class)->create();
        $this->task->label()->attach($label);
        $response = $this
            ->actingAs($this->user)
            ->delete(route('tasks.labels.destroy', [$this->task, $label]));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertEmpty($this->task->label);
    }

    public function testIndex()
    {
        $user = factory(User::class)->create(['email' => 'admin@admin.admin']);
        $response = $this
            ->actingAs($user)
            ->get(route('labels.index'));
        $response->assertOk();
        $response->assertSessionHasNoErrors();

        $response = $this
            ->actingAs($this->user)
            ->get(route('labels.index'));
        $response->assertStatus(403);
    }

    public function testLabelDelete()
    {
        $user = factory(User::class)->create(['email' => 'admin@admin.admin']);
        $label = factory(Label::class)->create();
        $this->task->label()->attach($label);

        $response = $this
            ->actingAs($user)
            ->delete(route('labels.delete', $label));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('labels', $label->toArray());
        $this->assertEmpty($this->task->label);
    }
}
