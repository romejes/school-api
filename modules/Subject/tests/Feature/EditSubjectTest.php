<?php

use SchoolApi\Subject\Models\Subject;
use Tests\TestCase;
use SchoolApi\Subject\Enums\Routes;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\putJson;

uses(DatabaseTransactions::class, TestCase::class);

it("can edit subject ", function ($subjectData, $payload) {
    //  arrange
    $subject = Subject::factory()->create($subjectData);

    //  act
    $url = route(Routes::EDIT_SUBJECT, ["id" => $subject->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $subject->id,
                "code" => $payload["code"],
                "name" => $payload["name"],
                "active" => true
            ]
        ]);
})->with([
            "edit all fields" => [
                [
                    "name" => "Matemática",
                    "code" => "MAT",
                ],
                [
                    "name" => "Geografia",
                    "code" => "GEO"
                ]
            ],
            "not edit code" => [
                [
                    "name" => "Matemática",
                    "code" => "MAT",
                ],
                [
                    "name" => "Geografia",
                    "code" => "MAT"
                ]
            ]
        ]);

it("returns error when edit subject code that already exists", function () {
    //  arrange
    $anotherSubject = Subject::factory()->create();
    $subject = Subject::factory()->create();


    $payload = [
        "name" => "Matemática",
        "code" => $anotherSubject->code,
    ];

    //  act
    $url = route(Routes::EDIT_SUBJECT, ["id" => $subject->id]);
    $response = putJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("code", "extended_message");
});

it("should return error when subject not exists", function () {
    //  arrange
    $subjectID = 1;

    //  act
    $url = route(Routes::EDIT_SUBJECT, ["id" => $subjectID]);
    $response = putJson($url, [
        "name" => "Matemática",
        "code" => "MAT",
    ]);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "code" => "SUBJ_001",
            "extended_message" => "La asignatura con el ID 1 no fué encontrada en la base de datos",
            "type" => "not_found_error",
            "message" => "Asignatura no encontrada"
        ]);
});
