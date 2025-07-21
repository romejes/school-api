<?php

namespace SchoolApi\Subject\Exceptions;

use App\Exceptions\NotFoundException;
use SchoolApi\Subject\Enums\SubjectErrorCodes;

/**
 * Excepción lanzada cuando una asignatura no se encuentra registrada en la base de datos
 * @package SchoolApi\Subject\Exceptions
 */
class SubjectNotFoundException extends NotFoundException
{
    /**
     * Constructor
     * @param integer $id   ID de la asignatura
     */
    public function __construct($id)
    {
        parent::__construct(
            SubjectErrorCodes::SUBJECT_NOT_FOUND,
            "La asignatura con el ID {$id} no fué encontrada en la base de datos"
        );
    }
}
