<?php

namespace Tests\Http\Controllers\User;

use App\Model\User;
use Tests\TestCase;

class LoginFormControllerTest extends TestCase
{
    public function testGuest()
    {
        $response = $this
            ->get(route('login.show'));
        $response->assertOk();
        $response->assertStatus(200);
    }

    public function testUser()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('login.show'));
        $response->assertRedirect();
    }
}
