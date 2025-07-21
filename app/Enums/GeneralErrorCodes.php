<?php

namespace App\Enums;

use App\Interfaces\IErrorCode;

enum GeneralErrorCodes: string implements IErrorCode
{
    case REQUEST_VALIDATION_ERROR = "RQVAL_422";

    public function message(): string
    {
        return match ($this) {
            self::REQUEST_VALIDATION_ERROR => "Error de validación en la petición"
        };
    }

    public function value(): string
    {
        return $this->value;
    }
}
