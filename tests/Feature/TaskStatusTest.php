<?php

namespace Tests\Feature;

use App\TaskStatus;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    protected $status;

    protected function setUp(): void
    {
        parent::setUp();
        $status = factory(TaskStatus::class)->make();
        $this->status = $status;
        $status->save();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $response = $this->get(route('task_statuses.edit', $this->status));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = ['name' => 'Example'];
        $this->withoutMiddleware();
        $response = $this->post(route('task_statuses.store', $data));
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdate()
    {
        $status = factory(TaskStatus::class)->create();
        $data = ['name' => 'Example'];
        $this->withoutMiddleware();
        $response = $this->patch(route('task_statuses.update', $status), $data);
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        
        $this->assertDatabaseHas('task_statuses', $data);
        $this->assertDatabaseMissing('task_statuses', [$status]);
    }
    
    public function testDestroy()
    {
        $status = factory(TaskStatus::class)->create();
        $response = $this->delete(route('task_statuses.destroy', $status));
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('task_statuses', [$status]);
    }
}
