<?php

namespace Tests\Feature;

use App\Model\Label;
use App\Model\Task;
use App\Model\User;
use Tests\TestCase;

class LabelControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->user = User::factory()->create();
        $this->task = Task::factory()->create();
    }

    public function testIndex()
    {
        $user = User::factory()->create(['email' => 'admin@admin.admin']);
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

    public function testDestroy()
    {
        $user = User::factory()->create(['email' => 'admin@admin.admin']);
        $label = Label::factory()->create();
        $this->task->label()->attach($label);

        $response = $this
            ->actingAs($user)
            ->delete(route('labels.destroy', $label));

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('labels', $label->toArray());
        $this->assertEmpty($this->task->label);
    }
}
