<?php

namespace Tests\Feature;

use App\Model\TaskStatus;
use App\Model\User;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    protected $status;
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->status = factory(TaskStatus::class)->create();
        $this->user = factory(User::class)->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('task_statuses.create'));

        $this->assertAuthenticatedAs($this->user);
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $response = $this
            ->actingAs($this->user)
            ->get(route('task_statuses.edit', $this->status));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = ['name' => 'Example'];
        $this->withoutMiddleware();
        $response = $this
            ->actingAs($this->user)
            ->post(route('task_statuses.store', $data));
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate()
    {
        $status = factory(TaskStatus::class)->create();
        $data = ['name' => 'Example'];
        $this->withoutMiddleware();
        $response = $this
            ->actingAs($this->user)
            ->patch(route('task_statuses.update', $status), $data);
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
        $this->assertDatabaseMissing('task_statuses', [$status]);
    }

    public function testDestroy()
    {
        $status = factory(TaskStatus::class)->create();
        $response = $this
            ->actingAs($this->user)
            ->delete(route('task_statuses.destroy', $status));

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('task_statuses', [$status]);
    }
}
