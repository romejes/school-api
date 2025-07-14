<?php
namespace SchoolApi\Subject\Commands\EditSubject;

use SchoolApi\Subject\Interfaces\ISubjectRepository;

class EditSubjectHandler
{
    /**
     * Instancia de repositorio
     * @var ISubjectRepository
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
     * Edita los datos de una asignatura
     * @param \SchoolApi\Subject\Commands\EditSubject\EditSubjectCommand $command
     * @return \SchoolApi\Subject\Models\Subject|null
     */
    public function __invoke(EditSubjectCommand $command)
    {
        return $this->subjectRepository
            ->update($command->getID(), [
                "code" => $command->getCode(),
                "name" => $command->getName(),
            ]);
    }
}
