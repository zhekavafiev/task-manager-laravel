<?php

namespace Tests\Feature;

use App\TaskStatus;
use Tests\TestCase;

class TaskStatusTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $status = factory(TaskStatus::class)->make();
        $status->save();
    }

    public function testIndex()
    {
        $response = $this->get(route('task_statuses.index'));
        $response->assertStatus(200);
        // dd(TaskStatus::get());
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
