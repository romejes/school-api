<?php

namespace SchoolApi\Teacher\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeacherNotFoundException extends NotFoundHttpException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
