<?php

namespace SchoolApi\Student\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \SchoolApi\Student\Models\Student::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            "code" => $this->faker->numerify("##########"),
            "first_name" => $this->faker->firstName,
            "last_name" => $this->faker->lastName,
            "email" => $this->faker->email,
            "birthday" => $this->faker->date,
            "address" => $this->faker->address,
            "phone" => $this->faker->phoneNumber
        ];
    }
}

