<?php
namespace App\Exceptions;

use App\Enums\ErrorType;
use App\Enums\GeneralErrorCodes;
use Illuminate\Validation\ValidationException as LaravelValidationException;

class PayloadValidationException extends ApiException
{
    public function __construct(LaravelValidationException $e)
    {
        $extendedMessage = json_encode($e->errors(), JSON_UNESCAPED_UNICODE);

        parent::__construct(
            GeneralErrorCodes::REQUEST_VALIDATION_ERROR,
            422,
            ErrorType::VALIDATION_ERROR,
            $e->errors()
        );
    }
}
