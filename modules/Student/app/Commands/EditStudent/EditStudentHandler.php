<?php
namespace SchoolApi\Student\Commands\EditStudent;

use SchoolApi\Student\Interfaces\IStudentRepository;

class EditStudentHandler
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
     * Ejecuta comando
     * @param \SchoolApi\Student\Commands\EditStudent\EditStudentCommand $command
     * @return \SchoolApi\Student\Models\Student
     */
    public function __invoke(EditStudentCommand $command)
    {
        return $this->studentRepository
            ->findAndUpdate($command->getID(), [
                "first_name" => $command->getFirstName(),
                "last_name" => $command->getLastName(),
                "email" => $command->getEmail(),
                "address" => $command->getAddress(),
                "phone" => $command->getPhone(),
                "birthday" => $command->getBirthday()
            ]);
    }
}
