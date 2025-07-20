<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\Teacher\Http\Controllers\TeacherController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('teachers', TeacherController::class)->names('teacher');
});
