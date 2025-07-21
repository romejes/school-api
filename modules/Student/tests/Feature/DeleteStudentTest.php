<?php

use SchoolApi\Student\Models\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\deleteJson;

uses(DatabaseTransactions::class, TestCase::class);

it("can delete student", function () {
    //  arrange
    $student = Student::factory()->create();

    //  act
    $url = route("api.students.delete", parameters: ["id" => $student->id]);
    $response = deleteJson($url);

    //  assert
    $response->assertOk()
        ->assertJson([
            "id" => $student->id,
            "deleted" => true
        ]);

    $this->assertDatabaseMissing("student", ["id" => $student->id]);
});

it("should return error when student not exists", function () {
    //  arrange
    $studentID = 1;

    //  act
    $url = route("api.students.delete", parameters: ["id" => $studentID]);
    $response = deleteJson($url);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "message" => "Estudiante no encontrado"
        ]);
});
