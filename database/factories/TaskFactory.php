<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['TODO', 'IN_PROGRESS', 'COMPLETED']),
            'importance' => $this->faker->numberBetween(1, 5),
            'deadline' => $this->faker->dateTimeBetween('now', '+10 days'),
        ];
    }
}
