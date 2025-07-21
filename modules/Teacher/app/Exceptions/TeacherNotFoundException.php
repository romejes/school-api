<?php

namespace SchoolApi\Teacher\Exceptions;

use App\Exceptions\NotFoundException;
use SchoolApi\Teacher\Enums\TeacherErrorCodes;

/**
 * Excepción lanzada cuando un docente no se encuentra registrado en la base de datos
 * @package SchoolApi\Teacher\Exceptions
 */
class TeacherNotFoundException extends NotFoundException
{
    /**
     * Constructor
     * @param integer $id   ID de profesor a buscar
     */
    public function __construct($id)
    {
        parent::__construct(
            TeacherErrorCodes::TEACHER_NOT_FOUND,
            "El docente con el ID {$id} no fué encontrado en la base de datos"
        );
    }
}
