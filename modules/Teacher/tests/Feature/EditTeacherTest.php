<?php

use SchoolApi\Teacher\Models\Teacher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\putJson;

uses(DatabaseTransactions::class, TestCase::class, WithFaker::class);

it("can edit teacher", function () {
    //  arrange
    $teacher = Teacher::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress
    ];
    $url = route("api.teachers.edit", ["id" => $teacher->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $teacher->id,
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address']
            ]
        ]);
});

it("can edit teacher data without modify email", function () {
    //  arrange
    $teacher = Teacher::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $teacher->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress
    ];
    $url = route("api.teachers.edit", ["id" => $teacher->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $teacher->id,
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address']
            ]
        ]);
});

it("can edit teacher data without modify phone", function () {
    //  arrange
    $teacher = Teacher::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $teacher->phone,
        "address" => $this->faker->streetAddress
    ];
    $url = route("api.teachers.edit", ["id" => $teacher->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $teacher->id,
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address']
            ]
        ]);
});

it("returns error when edit teacher email that already exists", function () {
    //  arrange
    $anotherTeacher = Teacher::factory()->create();

    $teacherForEdit = Teacher::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $anotherTeacher->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress
    ];
    $url = route("api.teachers.edit", ["id" => $teacherForEdit->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("email");
});

it("returns error when edit teacher phone number that already exists", function () {
    //  arrange
    $anotherTeacher = Teacher::factory()->create();

    $teacherForEdit = Teacher::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $anotherTeacher->phone,
        "address" => $this->faker->streetAddress
    ];
    $url = route("api.teachers.edit", ["id" => $teacherForEdit->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("phone");
});

it("should return error when subject not exists", function () {
    //  arrange
    $teacherID = 1;

    //  act
    $url = route("api.teachers.edit", ["id" => $teacherID]);
    $response = putJson($url, [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress
    ]);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "message" => "Docente no encontrado"
        ]);
});
