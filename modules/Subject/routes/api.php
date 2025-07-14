<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\Subject\Http\Controllers;

Route::prefix('v1')
    ->group(function () {
        Route::get("subjects", Controllers\ListSubjectController::class)
            ->name("subjects.list");

        Route::get("subjects/{id}", Controllers\ShowSubjectController::class)
            ->name("subjects.show");

        Route::put("subjects/{id}", Controllers\EditSubjectController::class)
            ->name("subjects.edit");

        Route::post("subjects", Controllers\CreateSubjectController::class)
            ->name("subjects.create");

        Route::delete("subjects/{id}", Controllers\DeleteSubjectController::class)
            ->name("subjects.delete");

        Route::patch("subjects/{id}/active", Controllers\ChangeActiveSubjectController::class)
            ->name("subjects.change-active");
    });
