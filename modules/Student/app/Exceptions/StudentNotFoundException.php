<?php

namespace SchoolApi\Student\Exceptions;

use App\Exceptions\NotFoundException;
use SchoolApi\Student\Enums\StudentErrorCodes;

/**
 * Excepción lanzada cuando un estudiante no se encuentra en la base de datos
 * @package SchoolApi\Student\Exceptions;
 */
class StudentNotFoundException extends NotFoundException
{
    public function __construct(int $studentID)
    {
        parent::__construct(
            StudentErrorCodes::STUDENT_NOT_FOUND,
            "El estudiante con ID {$studentID} no fué encontrado en la base de datos"
        );
    }
}
