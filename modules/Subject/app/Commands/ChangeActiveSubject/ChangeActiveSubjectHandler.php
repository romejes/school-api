<?php
namespace SchoolApi\Subject\Commands\ChangeActiveSubject;

use SchoolApi\Subject\Interfaces\ISubjectRepository;

class ChangeActiveSubjectHandler
{
    /**
     * Instancia de repositorio
     * @var \SchoolApi\Subject\Interfaces\ISubjectRepository
     */
    private $subjectRepository;

    /**
     * Constructor
     * @param \SchoolApi\Subject\Interfaces\ISubjectRepository $subjectRepository
     */
    public function __construct(ISubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Activa o desactiva una asignatura
     * @param \SchoolApi\Subject\Commands\ChangeActiveSubject\ChangeActiveSubjectCommand $command
     * @return \SchoolApi\Subject\Models\Subject
     */
    public function __invoke(ChangeActiveSubjectCommand $command)
    {
        $subject = $this->subjectRepository
            ->update($command->getSubjectId(), ["active" => $command->getActive()]);

        return $subject;
    }
}
