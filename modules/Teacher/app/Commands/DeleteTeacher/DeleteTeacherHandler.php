<?php
namespace SchoolApi\Teacher\Commands\DeleteTeacher;

use SchoolApi\Teacher\Commands\DeleteTeacher\DeleteTeacherCommand;
use SchoolApi\Teacher\Interfaces\ITeacherRepository;

class DeleteTeacherHandler
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
     * @param \SchoolApi\Teacher\Commands\DeleteTeacher\DeleteTeacherCommand $command
     * @return void
     */
    public function __invoke(DeleteTeacherCommand $command)
    {
        //  TODO: Para eliminar un docente, no debe haber sido asignado a ninguna asignatura o seccion
        $this->teacherRepository->delete($command->getID());
    }
}
