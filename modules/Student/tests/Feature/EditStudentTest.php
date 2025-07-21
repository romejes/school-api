<?php

use SchoolApi\Student\Models\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\putJson;

uses(DatabaseTransactions::class, TestCase::class, WithFaker::class);

it("can edit student", function () {
    //  arrange
    $student = Student::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];
    $url = route("api.students.edit", ["id" => $student->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $student->id,
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address'],
                "birthday" => $payload['birthday']
            ]
        ]);
});

it("can edit student data without modify email", function () {
    //  arrange
    $student = Student::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $student->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];
    $url = route("api.students.edit", ["id" => $student->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $student->id,
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address']
            ]
        ]);
});

it("can edit student data without modify phone", function () {
    //  arrange
    $student = Student::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $student->phone,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];
    $url = route("api.students.edit", ["id" => $student->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $student->id,
                "first_name" => $payload["first_name"],
                "last_name" => $payload['last_name'],
                "email" => $payload['email'],
                "phone" => $payload['phone'],
                "address" => $payload['address']
            ]
        ]);
});

it("returns error when edit student email that already exists", function () {
    //  arrange
    $anotherStudent = Student::factory()->create();

    $studentForEdit = Student::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $anotherStudent->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];
    $url = route("api.students.edit", ["id" => $studentForEdit->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("email", "extended_message");
});

it("returns error when edit student phone number that already exists", function () {
    //  arrange
    $anotherStudent = Student::factory()->create();

    $studentForEdit = Student::factory()->create();

    //  act
    $payload = [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $anotherStudent->phone,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ];
    $url = route("api.students.edit", ["id" => $studentForEdit->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("phone", "extended_message");
});

it("should return error when student not exists", function () {
    //  arrange
    $studentID = 1;

    //  act
    $url = route("api.students.edit", ["id" => $studentID]);
    $response = putJson($url, [
        "first_name" => $this->faker->firstName,
        "last_name" => $this->faker->lastName,
        "email" => $this->faker->email,
        "phone" => $this->faker->phoneNumber,
        "address" => $this->faker->streetAddress,
        "birthday" => $this->faker->date
    ]);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "code" => "STUD_001",
            "message" => "Estudiante no encontrado",
            "extended_message" => "El estudiante con ID 1 no fué encontrado en la base de datos",
            "type" => "not_found_error"
        ]);
});
