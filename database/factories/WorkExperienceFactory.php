<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkExperience>
 */
class WorkExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $dateTo = (Carbon::now())->subYears(rand(0, 10));
        $dateFrom = (clone $dateTo)->subYears(rand(1, 3));

        $current = (bool) rand(0, 1);

        return [
            'company_name' => $this->faker->company(),
            'job_title' => $this->faker->jobTitle(),
            'date_from' => $dateFrom,
            'summary' => $this->faker->paragraph(),
            'date_to' => $current ? null : $dateTo,
            'is_current' => $current,
        ];
    }
}
