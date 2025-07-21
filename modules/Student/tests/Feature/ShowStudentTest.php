<?php

use SchoolApi\Student\Models\Student;
use Tests\TestCase;
use function Pest\Laravel\getJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class, TestCase::class);

it("can retrieve student by ID", function () {
    //  arrange
    $student = Student::factory()->create();

    //  act
    $url = route("api.students.show", ["id" => $student->id]);
    $response = getJson($url);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $student->id,
                "code" => $student->code,
                "first_name" => $student->first_name,
                "last_name" => $student->last_name,
                "address" => $student->address,
                "email" => $student->email,
                "phone" => $student->phone,
                "created_at" => $student->created_at->toISOString(),
            ]
        ]);
});

it("returns error when student not exists", function () {
    //  arrange
    $studentID = 1;

    //  act
    $url = route("api.students.show", ["id" => $studentID]);
    $response = getJson($url);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "code" => "STUD_001",
            "message" => "Estudiante no encontrado",
            "extended_message" => "El estudiante con ID 1 no fué encontrado en la base de datos",
            "type" => "not_found_error"
        ]);
});
