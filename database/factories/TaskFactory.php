<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
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
    public function definition()
    {
        $maxCountStatus = count(TaskStatus::get());
        $maxCountCreater = count(User::all());
        $maxCountAssigned = count(User::all());
        return [
            'status_id' => random_int(1, $maxCountStatus),
            'name' => fake()->unique()->name(),
            'description' => fake()->unique()->text(),
            'created_by_id' => User::find(random_int(1, $maxCountCreater)),
            'assigned_to_id' => User::find(random_int(1, $maxCountAssigned)),
        ];
    }
}
