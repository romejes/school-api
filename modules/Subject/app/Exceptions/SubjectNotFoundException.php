<?php

namespace SchoolApi\Subject\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SubjectNotFoundException extends NotFoundHttpException
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
