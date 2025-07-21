<?php

namespace SchoolApi\Student\Enums;

use App\Interfaces\IErrorCode;

enum StudentErrorCodes: string implements IErrorCode
{
    case STUDENT_NOT_FOUND = "STUD_001";

    public function message(): string
    {
        return match ($this) {
            self::STUDENT_NOT_FOUND => "Estudiante no encontrado"
        };
    }

    public function value(): string
    {
        return $this->value;
    }
}
