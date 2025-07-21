<?php

use Illuminate\Support\Facades\Route;
use SchoolApi\Student\Http\Controllers\StudentController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('students', StudentController::class)->names('student');
});
