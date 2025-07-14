<?php
namespace SchoolApi\Subject\Commands\ChangeActiveSubject;

class ChangeActiveSubjectCommand
{
    /**
     * ID de asignatura
     * @var integer
     */
    private $subjectID;

    /**
     * Indica si estará activo o no
     * @var boolean
     */
    private $active;

    /**
     * Constructor
     * @param int $subjectID
     * @param bool $active
     */
    public function __construct(int $subjectID, bool $active)
    {
        $this->subjectID = $subjectID;
        $this->active = $active;
    }

    public function getSubjectID()
    {
        return $this->subjectID;
    }

    public function getActive()
    {
        return $this->active;
    }
}
