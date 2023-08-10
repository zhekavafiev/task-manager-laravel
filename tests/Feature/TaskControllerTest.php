<?php

namespace Tests\Feature;

use App\Model\Task;
use App\Model\User;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::factory()->create();
        Task::factory()->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('tasks.create'));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = Task::factory()->make()->toArray();
        $response = $this
            ->actingAs($this->user)
            ->post(route('tasks.store', $data));
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $this->assertDatabaseHas('tasks', $data);
    }

    public function testEdit()
    {
        $task = Task::factory()->create();
        $response = $this
            ->actingAs($this->user)
            ->get(route('tasks.edit', $task));
        $response->assertOk();
    }

    public function testUpdate()
    {
        $task = Task::factory()->create();

        $newData = Task::factory()->make()->toArray();

        $response = $this
            ->actingAs($this->user)
            ->patch(route('tasks.update', $task), $newData);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', [$task]);
        $this->assertDatabaseHas('tasks', $newData);
    }

    public function testDestroy()
    {
        $task = Task::factory()->create();

        $response = $this
            ->actingAs($this->user)
            ->delete(route('tasks.destroy', $task));

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('tasks', [$task]);
    }
}
