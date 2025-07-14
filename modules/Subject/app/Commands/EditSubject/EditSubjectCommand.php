<?php
namespace SchoolApi\Subject\Commands\EditSubject;

use Illuminate\Support\Arr;
use App\Commands\EditCommand;

class EditSubjectCommand extends EditCommand
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
     * @param int $subjectID
     * @param array $values
     */
    public function __construct(int $subjectID, array $values)
    {
        parent::__construct($subjectID);
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
