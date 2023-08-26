<?php

namespace Database\Factories\Model;

use App\Model\TaskStatus;
use App\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'second_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'telegram' => $this->faker->url,
            'github' => $this->faker->url,
            'country' => $this->faker->country,
            'city' => $this->faker->city,
            'user_role_id' => random_int(1, 2),
            'password' => $this->faker->password,
            'remember_token' => $this->faker->password,
            'email_verified_at' => $this->faker->time,
            'birthday' => $this->faker->time
        ];
    }
}

