<?php

namespace SchoolApi\Teacher\Enums;

use App\Interfaces\IErrorCode;

enum TeacherErrorCodes: string implements IErrorCode
{
    case TEACHER_NOT_FOUND = "TEAC_001";

    public function message(): string
    {
        return match ($this) {
            self::TEACHER_NOT_FOUND => "Docente no encontrado"
        };
    }

    public function value(): string
    {
        return $this->value;
    }
}
