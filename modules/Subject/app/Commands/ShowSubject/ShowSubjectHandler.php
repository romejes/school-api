<?php
namespace SchoolApi\Subject\Commands\ShowSubject;

use SchoolApi\Subject\Interfaces\ISubjectRepository;

class ShowSubjectHandler
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
     * @param ShowSubjectCommand $command
     * @return \SchoolApi\Subject\Models\Subject
     */
    public function __invoke(ShowSubjectCommand $command)
    {
        return $this->subjectRepository->find($command->getID());
    }
}
