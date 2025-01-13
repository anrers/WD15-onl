<?php

namespace Database\Factories\Tasks;

use App\Models\Tasks\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(10, true),
            'dueDate' => $this->faker->dateTimeBetween('now', '+1 years'),
            'userId' => $this->faker->numberBetween(1,5),
        ];
    }
}
