<?php
namespace SchoolApi\Subject\Commands\DeleteSubject;

use SchoolApi\Subject\Interfaces\ISubjectRepository;

class DeleteSubjectHandler
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
     * Elimina una asignatura
     * @param \SchoolApi\Subject\Commands\DeleteSubject\DeleteSubjectCommand $command
     * @return void
     */
    public function __invoke(DeleteSubjectCommand $command)
    {
        //  TODO: Para eliminar una asignatura, previamente se dbe verificar que no se haya asignado a alguna seccion
        $this->subjectRepository->delete($command->getID());
    }
}
