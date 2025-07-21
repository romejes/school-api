<?php

use SchoolApi\Teacher\Models\Teacher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\deleteJson;

uses(DatabaseTransactions::class, TestCase::class);

it("can delete teacher", function () {
    //  arrange
    $teacher = Teacher::factory()->create();

    //  act
    $url = route("api.teachers.delete", parameters: ["id" => $teacher->id]);
    $response = deleteJson($url);

    //  assert
    $response->assertOk()
        ->assertJson([
            "id" => $teacher->id,
            "deleted" => true
        ]);

    $this->assertDatabaseMissing("subject", ["id" => $teacher->id]);
});

it("should return error when teacher not exists", function () {
    //  arrange
    $teacherID = 1;

    //  act
    $url = route("api.teachers.delete", parameters: ["id" => $teacherID]);
    $response = deleteJson($url);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "code" => "TEAC_001",
            "extended_message" => "El docente con el ID 1 no fué encontrado en la base de datos",
            "type" => "not_found_error",
            "message" => "Docente no encontrado"
        ]);
});
