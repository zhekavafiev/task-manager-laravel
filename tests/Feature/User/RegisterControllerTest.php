<?php

namespace Tests\Feature\User;

use App\Model\Label;
use App\Model\Task;
use App\Model\User;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testNoData()
    {
        $response = $this
            ->post(route('register.store'));
        $response->assertRedirect();
        $response->assertSessionHasErrors();
        $response->assertRedirectToRoute('welcome');
    }

    public function testDublicateEmail()
    {
        $user = User::factory()->create();
        $data = [
            'name' => 'name',
            'email' => $user->email,
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'country' => 'RU',
            'birthday' => '1999-01-01',
        ];
        $response = $this
            ->post(route('register.store'), $data);
        $response->assertSessionHasErrors();
        $response->assertRedirectToRoute('welcome');
        $response->assertRedirect();
    }

    public function testSuccess()
    {
        $data = [
            'name' => 'name',
            'email' => '123@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'country' => 'RU',
            'birthday' => '1999-01-01',
        ];
        $response = $this
            ->post(route('register.store'), $data);
        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();
    }
}
