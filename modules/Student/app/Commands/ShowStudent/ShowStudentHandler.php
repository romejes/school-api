<?php
namespace SchoolApi\Student\Commands\ShowStudent;

use SchoolApi\Student\Interfaces\IStudentRepository;

class ShowStudentHandler
{
    /**
     * Instancia de repositorio
     * @var \SchoolApi\Student\Interfaces\IStudentRepository
     */
    private $studentRepoitory;

    /**
     * Constructor
     * @param \SchoolApi\Student\Interfaces\IStudentRepository $studentRepoitory
     */
    public function __construct(IStudentRepository $studentRepoitory)
    {
        $this->studentRepoitory = $studentRepoitory;
    }

    /**
     * Ejecuta comando
     * @param \SchoolApi\Student\Commands\ShowStudent\ShowStudentCommand $command
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function __invoke(ShowStudentCommand $command)
    {
        return $this->studentRepoitory->showById($command->getID());
    }
}
