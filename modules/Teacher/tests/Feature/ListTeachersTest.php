<?php

use SchoolApi\Teacher\Models\Teacher;
use Tests\TestCase;
use function Pest\Laravel\getJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class, TestCase::class);

it("can retrieve teachers list", function () {
    //  arrange
    Teacher::factory()->count(5)->create();

    //  act
    $url = route("api.teachers.list");
    $response = getJson($url);

    //  assert
    $response->assertOk()
        ->assertJsonCount(5, "data");
});
