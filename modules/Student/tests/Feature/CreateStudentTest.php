<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use SchoolApi\Student\Models\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\postJson;

uses(DatabaseTransactions::class, TestCase::class, WithFaker::class);

it("can create new student", function () {
    $now = Carbon::create(2025, 2, 5);
    Carbon::setTestNow($now);

    //  arrange
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];

    //  act
    $url = route("api.students.create");
    $response = postJson($url, $payload);

    //  assert
    $response->assertCreated()
        ->assertJson([
            "data" => [
                "code" => "2025020500001",
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address'],
                "birthday" => $payload["birthday"]
            ]
        ]);
});

it("returns error when create student with existing email", function () {
    //  arrange
    $existingStudent = Student::factory()->create();

    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $existingStudent->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];

    //  act
    $url = route("api.students.create");
    $response = postJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("email");
});

it("returns error when create student with existing phone", function () {
    //  arrange
    $existingStudent = Student::factory()->create();

    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $existingStudent->phone,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];

    //  act
    $url = route("api.students.create");
    $response = postJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("phone");
});
