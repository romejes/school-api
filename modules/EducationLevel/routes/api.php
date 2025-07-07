<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\EducationLevel\Http\Controllers;

Route::prefix('v1')
    ->group(function () {
        Route::get("levels", Controllers\ListLevelController::class)
            ->name("levels.list");

        Route::get("sublevels", Controllers\ListSublevelController::class)
            ->name("sublevels.list");
    });
