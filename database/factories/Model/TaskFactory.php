<?php

namespace Database\Factories\Model;

use App\Model\Task;
use App\Model\TaskStatus;
use App\Model\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text(rand(60, 100)),
            'status_id' => TaskStatus::factory()->create(),
            'creator_by_id' => User::factory()->create(),
            'assigned_to_id' => User::factory()->create(),
        ];
    }
}
