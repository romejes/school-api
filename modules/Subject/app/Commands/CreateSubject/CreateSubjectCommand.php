<?php
namespace SchoolApi\Subject\Commands\CreateSubject;

use Illuminate\Support\Arr;

class CreateSubjectCommand
{
    /**
     * Nombre de la asignatura
     * @var string
     */
    private $name;

    /**
     * Codigo de la asignatura
     * @var string
     */
    private $code;

    /**
     * Constructor
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->name = Arr::get($values, "name");
        $this->code = Arr::get($values, "code");
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }
}
