<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\Teacher\Http\Controllers\TeacherController;

Route::prefix('v1')->group(function () {
    Route::get("teachers", [TeacherController::class, "list"])
        ->name("teachers.list");

    Route::get("teachers/{id}", [TeacherController::class, "show"])
        ->name("teachers.show");

    Route::post("teachers", [TeacherController::class, "create"])
        ->name("teachers.create");

    Route::put("teachers/{id}", [TeacherController::class, "edit"])
        ->name("teachers.edit");

    Route::delete("teachers/{id}", [TeacherController::class, "delete"])
        ->name("teachers.delete");
});
