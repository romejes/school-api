<?php

use Tests\TestCase;
use SchoolApi\Subject\Models\Subject;
use SchoolApi\Subject\Enums\Routes;
use Illuminate\Foundation\Testing;
use function Pest\Laravel\patchJson;

uses(Testing\DatabaseTransactions::class, Testing\WithFaker::class, TestCase::class);

it("can change active subject", function () {
    //  arrange
    $subject = Subject::factory()->create();

    //  act
    $payload = ["active" => $this->faker->boolean];
    $url = route(Routes::CHANGE_ACTIVE_SUBJECT, ["id" => $subject->id]);
    $response = patchJson($url, $payload);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "id" => $subject->id,
                "active" => $payload["active"],
            ]
        ]);
});

it("should return error when subject not exists", function () {
    //  arrange
    $subjectID = 1;

    //  act
    $payload = ["active" => $this->faker->boolean];
    $url = route(Routes::CHANGE_ACTIVE_SUBJECT, ["id" => $subjectID]);
    $response = patchJson($url, $payload);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "code" => "SUBJ_001",
            "extended_message" => "La asignatura con el ID 1 no fué encontrada en la base de datos",
            "type" => "not_found_error",
            "message" => "Asignatura no encontrada"
        ]);
});
