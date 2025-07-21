<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\Student\Http\Controllers\StudentController;

Route::prefix('v1')->group(function () {
    Route::get("students", [StudentController::class, "list"])
        ->name("students.list");

    Route::get("students/{id}", [StudentController::class, "show"])
        ->name("students.show");

    Route::post("students", [StudentController::class, "create"])
        ->name("students.create");

    Route::put("students/{id}", [StudentController::class, "edit"])
        ->name("students.edit");

    Route::delete("students/{id}", [StudentController::class, "delete"])
        ->name("students.delete");
});
