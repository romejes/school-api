<?php

namespace SchoolApi\Subject\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \SchoolApi\Subject\Models\Subject::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "code" => $this->faker->bothify("##??"),
            "name" => $this->faker->word,
            "active" => true,
        ];
    }
}

