<?php

namespace Tests\Feature;

use App\Task;
use App\TaskStatus;
use App\User;
use DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        factory(User::class)->create();
        factory(Task::class)->create();
    }

    public function testIndex()
    {
        // dd(Task::get()->toArray());
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }
}
