<?php

namespace App\Interfaces;

/**
 * Interfaz para usar con enums que declaren codigos de error
 * @package App\Interfaces\Enums
 */
interface IErrorCode
{
    /**
     * Obtiene el valor del codigo
     * @return string
     */
    public function value(): string;

    /**
     * Obtiene el mensaje de error para el codigo
     * @return string
     */
    public function message(): string;
}
