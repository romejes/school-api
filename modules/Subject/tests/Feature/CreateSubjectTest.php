<?php

use SchoolApi\Subject\Models\Subject;
use Tests\TestCase;
use SchoolApi\Subject\Enums\Routes;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\postJson;

uses(DatabaseTransactions::class, TestCase::class);

it("can create new subject", function () {
    //  arrange
    $payload = [
        "name" => "Matemática",
        "code" => "MAT",
    ];

    //  act
    $url = route(Routes::CREATE_SUBJECT);
    $response = postJson($url, $payload);

    //  assert
    $response->assertCreated()
        ->assertJson([
            "data" => [
                "code" => $payload["code"],
                "name" => $payload["name"],
                "active" => true
            ]
        ]);
});

it("returns error when create subject with existing code", function () {
    //  arrange
    $existingSubject = Subject::factory()->create();

    $payload = [
        "name" => "Matemática",
        "code" => $existingSubject->code,
    ];

    //  act
    $url = route(Routes::CREATE_SUBJECT);
    $response = postJson($url, $payload);

    //  assert
    $response->assertUnprocessable()
        ->assertJsonValidationErrorFor("code");
});
