<?php

namespace SchoolApi\Subject\Commands\ListSubject;

use SchoolApi\Subject\Interfaces\ISubjectRepository;

class ListSubjectHandler
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
     * Summary of handle
     * @param \SchoolApi\Subject\Commands\ListSubject\ListSubjectCommand $command
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(ListSubjectCommand $command)
    {
        return $this->subjectRepository
            ->getAndPaginate($command->getPerPage());
    }
}
