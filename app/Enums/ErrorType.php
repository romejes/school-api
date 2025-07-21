<?php
namespace App\Enums;

enum ErrorType: string
{
    case NOT_FOUND_ERROR = "not_found_error";
    case VALIDATION_ERROR = "validation_error";
}
