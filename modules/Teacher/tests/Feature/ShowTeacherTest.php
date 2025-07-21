<?php

use SchoolApi\Teacher\Models\Teacher;
use Tests\TestCase;
use function Pest\Laravel\getJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class, TestCase::class);

it("can retrieve teacher by ID", function () {
    //  arrange
    $teacher = Teacher::factory()->create();

    //  act
    $url = route("api.teachers.show", ["id" => $teacher->id]);
    $response = getJson($url);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $teacher->id,
                "first_name" => $teacher->first_name,
                "last_name" => $teacher->last_name,
                "address" => $teacher->address,
                "email" => $teacher->email,
                "phone" => $teacher->phone
            ]
        ]);
});

it("returns error when teacher not exists", function () {
    //  arrange
    $teacherID = 1;

    //  act
    $url = route("api.teachers.show", ["id" => $teacherID]);
    $response = getJson($url);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "code" => "TEAC_001",
            "extended_message" => "El docente con el ID 1 no fué encontrado en la base de datos",
            "type" => "not_found_error",
            "message" => "Docente no encontrado"
        ]);
});
