<?php

namespace Tests\Http\Controllers\User;

use App\Model\User;
use Tests\TestCase;

class RegisterFormControllerTest extends TestCase
{
    public function testGuest()
    {
        $response = $this
            ->get(route('register.show'));
        $response->assertOk();
        $response->assertStatus(200);
    }

    public function testUser()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get(route('register.show'));
        $response->assertRedirect();
    }
}
