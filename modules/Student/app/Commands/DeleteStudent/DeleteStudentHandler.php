<?php
namespace SchoolApi\Student\Commands\DeleteStudent;

use SchoolApi\Student\Interfaces\IStudentRepository;

class DeleteStudentHandler
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
     * Constructor
     * @param \SchoolApi\Student\Commands\DeleteStudent\DeleteStudentCommand $command
     * @return void
     */
    public function __invoke(DeleteStudentCommand $command)
    {
        //  TODO: Para eliminar un docente, no debe haber sido asignado a ninguna asignatura o seccion
        $this->studentRepository->delete($command->getID());
    }
}
