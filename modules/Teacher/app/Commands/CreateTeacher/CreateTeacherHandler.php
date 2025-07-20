<?php
namespace SchoolApi\Teacher\Commands\CreateTeacher;

use SchoolApi\Teacher\Interfaces\ITeacherRepository;

class CreateTeacherHandler
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
     * @param \SchoolApi\Teacher\Commands\CreateTeacher\CreateTeacherCommand $command
     * @return \SchoolApi\Teacher\Models\Teacher
     */
    public function __invoke(CreateTeacherCommand $command)
    {
        return $this->teacherRepository
            ->create([
                "first_name" => $command->getFirstName(),
                "last_name" => $command->getLastName(),
                "email" => $command->getEmail(),
                "address" => $command->getAddress(),
                "phone" => $command->getPhone(),
            ]);
    }
}
