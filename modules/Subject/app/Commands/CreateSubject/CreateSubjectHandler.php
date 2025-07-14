<?php
namespace SchoolApi\Subject\Commands\CreateSubject;

use SchoolApi\Subject\Interfaces\ISubjectRepository;

class CreateSubjectHandler
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
     * Busca y devuelve una asignatura
     *
     * @param CreateSubjectCommand $command
     * @return \SchoolApi\Subject\Models\Subject
     */
    public function __invoke(CreateSubjectCommand $command)
    {
        return $this->subjectRepository
            ->create([
                "name" => $command->getName(),
                "code" => $command->getCode(),
                "active" => true
            ]);
    }
}
