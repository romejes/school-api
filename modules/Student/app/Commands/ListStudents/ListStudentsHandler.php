<?php

namespace SchoolApi\Student\Commands\ListStudents;

use SchoolApi\Student\Interfaces\IStudentRepository;

class ListStudentsHandler
{
    /**
     * Instancia de repositorio
     * @var \SchoolApi\Student\Interfaces\IStudentRepository
     */
    private $studentRepository;

    /**
     * Constructor
     * @param \SchoolApi\Student\Interfaces\IStudentRepository $studentRepository
     */
    public function __construct(IStudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Ejecutar comando
     * @param \SchoolApi\Teacher\Commands\ListTeachers\ListTeachersCommand $command
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(ListStudentsCommand $command)
    {
        return $this->studentRepository
            ->getAndPaginate($command->getPerPage());
    }
}
