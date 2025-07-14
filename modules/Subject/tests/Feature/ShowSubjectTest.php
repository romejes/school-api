<?php

use Tests\TestCase;
use function Pest\Laravel\getJson;
use SchoolApi\Subject\Enums\Routes;
use SchoolApi\Subject\Models\Subject;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class, TestCase::class);

it("can retrieve subject by ID", function () {
    //  arrange
    $subject = Subject::factory()->create();

    //  act
    $url = route(Routes::SHOW_SUBJECT, ["id" => $subject->id]);
    $response = getJson($url);

    //  assert
    $response->assertOk()
        ->assertJson([
            "data" => [
                "code" => $subject->code,
                "name" => $subject->name,
                "active" => true
            ]
        ]);
});

it("returns error when subject not exists", function () {
    //  arrange
    $subjectID = 1;

    //  act
    $url = route(Routes::SHOW_SUBJECT, ["id" => $subjectID]);
    $response = getJson($url);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "message" => "Asignatura no encontrada"
        ]);
});
