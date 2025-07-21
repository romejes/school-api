<?php

namespace App\Exceptions;

use App\Enums\ErrorType;
use App\Interfaces\IErrorCode;

/**
 * Excepción generica de tipo "not_found_error". Usado para cuando no se encuentre un registro o recurso
 * @package Core.Exceptions
 */
class NotFoundException extends ApiException
{
    public function __construct(IErrorCode $errorCode, $extendedMessage)
    {
        parent::__construct(
            $errorCode,
            404,
            ErrorType::NOT_FOUND_ERROR,
            $extendedMessage
        );
    }
}
