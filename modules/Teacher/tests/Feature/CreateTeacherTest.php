<?php

use Illuminate\Foundation\Testing\WithFaker;
use SchoolApi\Teacher\Models\Teacher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\postJson;

uses(DatabaseTransactions::class, TestCase::class, WithFaker::class);

it("can create new teacher", function () {
    //  arrange
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress
    ];

    //  act
    $url = route("api.teachers.create");
    $response = postJson($url, $payload);

    //  assert
    $response->assertCreated()
        ->assertJson([
            "data" => [
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address']
            ]
        ]);
});

it("returns error when create teacher with existing email", function () {
    //  arrange
    $existingTeacher = Teacher::factory()->create();

    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $existingTeacher->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress
    ];

    //  act
    $url = route("api.teachers.create");
    $response = postJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("email", "extended_message");
});

it("returns error when create teacher with existing phone", function () {
    //  arrange
    $existingTeacher = Teacher::factory()->create();

    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $existingTeacher->phone,
        "address" => $this->faker->streetAddress
    ];

    //  act
    $url = route("api.teachers.create");
    $response = postJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("phone", "extended_message");
});
