<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\Subject\Http\Controllers\SubjectController;

Route::prefix('v1')
    ->group(function () {
        Route::get("subjects", [SubjectController::class, "list"])
            ->name("subjects.list");

        Route::get("subjects/{id}", [SubjectController::class, "show"])
            ->name("subjects.show");

        Route::put("subjects/{id}", [SubjectController::class, "edit"])
            ->name("subjects.edit");

        Route::post("subjects", [SubjectController::class, "create"])
            ->name("subjects.create");

        Route::delete("subjects/{id}", [SubjectController::class, "delete"])
            ->name("subjects.delete");

        Route::patch("subjects/{id}/active", [SubjectController::class, "changeActive"])
            ->name("subjects.change-active");
    });
