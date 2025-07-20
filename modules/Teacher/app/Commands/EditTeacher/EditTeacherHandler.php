<?php
namespace SchoolApi\Teacher\Commands\EditTeacher;

use SchoolApi\Teacher\Interfaces\ITeacherRepository;

class EditTeacherHandler
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
     * @param \SchoolApi\Teacher\Commands\EditTeacher\EditTeacherCommand $command
     * @return \SchoolApi\Teacher\Models\Teacher
     */
    public function __invoke(EditTeacherCommand $command)
    {
        return $this->teacherRepository
            ->update($command->getID(), [
                "first_name" => $command->getFirstName(),
                "last_name" => $command->getLastName(),
                "email" => $command->getEmail(),
                "address" => $command->getAddress(),
                "phone" => $command->getPhone(),
            ]);
    }
}
