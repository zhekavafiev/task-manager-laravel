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
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = factory(User::class)->create();
        factory(Task::class)->create();
    }

    public function testIndex()
    {
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $data = factory(Task::class)->make()->toArray();
        $response = $this
            ->actingAs($this->user)
            ->post(route('tasks.store', $data));
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', $data);
    }
}
