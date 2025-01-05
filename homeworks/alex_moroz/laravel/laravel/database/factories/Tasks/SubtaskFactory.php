<?php

namespace Database\Factories\Tasks;

use App\Models\Tasks\Subtask;
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
            'taskId' => $this->faker->numberBetween(1,5),
        ];
    }
}
