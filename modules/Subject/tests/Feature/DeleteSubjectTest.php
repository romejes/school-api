<?php

use SchoolApi\Subject\Models\Subject;
use Tests\TestCase;
use SchoolApi\Subject\Enums\Routes;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function Pest\Laravel\deleteJson;

uses(DatabaseTransactions::class, TestCase::class);

it("can delete subject ", function () {
    //  arrange
    $subject = Subject::factory()->create();

    //  act
    $url = route(Routes::DELETE_SUBJECT, ["id" => $subject->id]);
    $response = deleteJson($url);

    //  assert
    $response->assertOk()
        ->assertJson([
            "id" => $subject->id,
            "deleted" => true
        ]);

    $this->assertDatabaseMissing("subject", ["id" => $subject->id]);
});

it("should return error when subject not exists", function () {
    //  arrange
    $subjectID = 1;

    //  act
    $url = route(Routes::DELETE_SUBJECT, ["id" => $subjectID]);
    $response = deleteJson($url);

    //  assert
    $response->assertNotFound()
        ->assertJson([
            "message" => "Asignatura no encontrada"
        ]);
});
