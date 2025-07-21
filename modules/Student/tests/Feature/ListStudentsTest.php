<?php

use SchoolApi\Student\Models\Student;
use Tests\TestCase;
use function Pest\Laravel\getJson;
use Illuminate\Foundation\Testing\DatabaseTransactions;

uses(DatabaseTransactions::class, TestCase::class);

it("can retrieve students list", function () {
    //  arrange
    Student::factory()->count(5)->create();

    //  act
    $url = route("api.students.list");
    $response = getJson($url);

    //  assert
    $response->assertOk()
        ->assertJsonCount(5, "data");
});
