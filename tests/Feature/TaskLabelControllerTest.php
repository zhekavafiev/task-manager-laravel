<?php

namespace Tests\Feature;

use App\Model\Label;
use App\Model\Task;
use App\Model\User;
use Tests\TestCase;

class TaskLabelControllerTest extends TestCase
{
    protected $user;
    protected $task;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::factory()->create();
        $this->task = Task::factory()->create();
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
        $label = Label::factory()->create();
        $this->task->label()->attach($label);
        $response = $this
            ->actingAs($this->user)
            ->delete(route('tasks.labels.destroy', [$this->task, $label]));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertEmpty($this->task->label);
    }
}
