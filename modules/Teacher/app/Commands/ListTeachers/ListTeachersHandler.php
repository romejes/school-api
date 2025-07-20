<?php

namespace SchoolApi\Teacher\Commands\ListTeachers;

use SchoolApi\Teacher\Interfaces\ITeacherRepository;

class ListTeachersHandler
{
    /**
     * Instancia de repositorio
     * @var \SchoolApi\Teacher\Interfaces\ITeacherRepository
     */
    private $teacherRepository;

    /**
     * Constructor
     * @param \SchoolApi\Teacher\Interfaces\ITeacherRepository $teacherRepository
     */
    public function __construct(ITeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }

    /**
     * Ejecutar comando
     * @param \SchoolApi\Teacher\Commands\ListTeachers\ListTeachersCommand $command
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(ListTeachersCommand $command)
    {
        return $this->teacherRepository
            ->getAndPaginate($command->getPerPage());
    }
}
