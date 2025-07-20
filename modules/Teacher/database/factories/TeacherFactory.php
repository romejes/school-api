<?php

namespace SchoolApi\Teacher\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \SchoolApi\Teacher\Models\Teacher::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "first_name" => $this->faker->firstName(),
            "last_name" => $this->faker->lastName,
            "email" => $this->faker->email(),
            "phone" => $this->faker->phoneNumber,
            "address" => $this->faker->streetAddress()
        ];
    }
}

