<?php

namespace SchoolApi\Student\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentNotFoundException extends NotFoundHttpException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
