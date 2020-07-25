<?php

namespace Tests\Feature;

use App\Label;
use App\Task;
use App\TaskStatus;
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
        $response = $this->get(route('tasks.labels.create', $this->task));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = ['text' => 'Test'];
        $response = $this->post(route('tasks.labels.store', $this->task), $data);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertNotEmpty($this->task->label);
        $this->assertDatabaseHas('labels', $data);
    }

    public function testDestroy()
    {
        $label = factory(Label::class)->create();
        $this->task->label()->attach($label);
        $response = $this->delete(route('tasks.labels.destroy', [$this->task, $label]));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertEmpty($this->task->label);
    }
}
