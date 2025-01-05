<?php

namespace Database\Factories\Subtask;

use App\Models\Subtasks\Subtask;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Subtask>
 */
class SubtaskFactory extends Factory
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
            'description' => $this->faker->sentence(10),
            'dueDate' => $this->faker->dateTimeBetween('now', '+1 years'),
            'taskId' => $this->faker->numberBetween(1, 10),
        ];
    }
}
