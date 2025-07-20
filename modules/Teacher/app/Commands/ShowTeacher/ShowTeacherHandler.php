<?php
namespace SchoolApi\Teacher\Commands\ShowTeacher;

use SchoolApi\Teacher\Interfaces\ITeacherRepository;

class ShowTeacherHandler
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
     * Ejecuta comando
     * @param \SchoolApi\Teacher\Commands\ShowTeacher\ShowTeacherCommand $command
     * @return \SchoolApi\Teacher\Models\Teacher
     */
    public function __invoke(ShowTeacherCommand $command)
    {
        return $this->teacherRepository->showById($command->getID());
    }
}
