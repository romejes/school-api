<?php

namespace SchoolApi\Subject\Enums;

use App\Interfaces\IErrorCode;

enum SubjectErrorCodes: string implements IErrorCode
{
    case SUBJECT_NOT_FOUND = "SUBJ_001";

    public function message(): string
    {
        return match ($this) {
            self::SUBJECT_NOT_FOUND => "Asignatura no encontrada"
        };
    }

    public function value(): string
    {
        return $this->value;
    }
}
