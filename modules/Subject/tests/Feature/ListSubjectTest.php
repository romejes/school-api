<?php

use Tests\TestCase;
use function Pest\Laravel\getJson;
use SchoolApi\Subject\Enums\Routes;
use SchoolApi\Subject\Models\Subject;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class, TestCase::class);

it("can retrieve subject list", function () {
    //  arrange
    Subject::factory()->count(5)->create();

    //  act
    $url = route(Routes::LIST_SUBJECTS);
    $response = getJson($url);

    //  assert
    $response->assertOk()
        ->assertJsonCount(5, "data");
});
