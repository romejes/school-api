<?php
namespace SchoolApi\Student\Commands\CreateStudent;

use SchoolApi\Student\Interfaces\IStudentRepository;

class CreateStudentHandler
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
     * @param \SchoolApi\Student\Commands\CreateStudent\CreateStudentCommand $command
     * @return \SchoolApi\Student\Models\Student
     */
    public function __invoke(CreateStudentCommand $command)
    {
        return $this->studentRepoitory
            ->create([
                "code" => $this->generateCode(),
                "first_name" => $command->getFirstName(),
                "last_name" => $command->getLastName(),
                "email" => $command->getEmail(),
                "address" => $command->getAddress(),
                "phone" => $command->getPhone(),
                "birthday" => $command->getBirthday()
            ]);
    }

    /**
     * Genera el código del estudiante
     * @return string
     */
    private function generateCode()
    {
        $currentDate = now();
        $currentYear = $currentDate->year;
        $currentDateToString = $currentDate->format("Ymd");

        $countStudentsByYear = $this->studentRepoitory->countStudentsByYear($currentYear);
        $correlativeNumber = $countStudentsByYear + 1;
        $correlativeNumberToString = str_pad($correlativeNumber, 5, "0", STR_PAD_LEFT);

        return sprintf("%s%s", $currentDateToString, $correlativeNumberToString);
    }
}
