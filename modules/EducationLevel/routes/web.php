<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\EducationLevel\Http\Controllers\EducationLevelController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('educationlevels', EducationLevelController::class)->names('educationlevel');
});
