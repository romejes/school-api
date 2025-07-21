<?php

namespace App\Exceptions;

use Exception;
use App\Enums\ErrorType;
use App\Interfaces\IErrorCode;

/**
 * Excepcion generica para las respuestas de la API
 * @package Core.Exceptions
 */
class ApiException extends Exception
{
    /**
     * Tipo general de error
     * @var string
     */
    protected $type;

    /**
     * Codigo del error
     * @var string
     */
    protected $errorCode;

    /**
     * Mensaje de error mas detallado
     * @var string|array
     */
    protected $extendedMessage;

    /**
     * Constructor
     * @param \App\Interfaces\IErrorCode $errorCode
     * @param int $statusCode
     * @param \App\Enums\ErrorType $type
     * @param string $extendedMessage
     */
    public function __construct(IErrorCode $errorCode, int $statusCode, ErrorType $type, string|array $extendedMessage)
    {
        parent::__construct($errorCode->message(), $statusCode);
        $this->extendedMessage = $extendedMessage;
        $this->errorCode = $errorCode->value();
        $this->type = $type->value;
    }

    /**
     * Devuelve un arreglo con los datos de la excecpion
     * @return array[]|array{code: string, extended_message: string, message: string, type: string}
     */
    public function toArray()
    {
        $response = [
            "code" => $this->errorCode,
            "type" => $this->type,
            "message" => $this->getMessage(),
            "extended_message" => $this->extendedMessage,
        ];

        if (config("app.debug")) {
            $response["debug"] = [
                'file' => $this->getFile(),
                'line' => $this->getLine(),
            ];
        }

        return $response;
    }
}
