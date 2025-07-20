<?php
namespace SchoolApi\Teacher\Commands\EditTeacher;

use Illuminate\Support\Arr;
use App\Commands\EditCommand;

class EditTeacherCommand extends EditCommand
{
    /**
     * Nombres del docente
     * @var string
     */
    private $firstName;

    /**
     * Apellidos del docente
     * @var string
     */
    private $lastName;

    /**
     * Correo electrónico del docente
     * @var string
     */
    private $email;

    /**
     * Dirección física del docente
     * @var string
     */
    private $address;

    /**
     * Número telefónico del docente
     * @var string
     */
    private $phone;

    /**
     * Constructor
     * @param array $values
     */
    public function __construct(int $id, array $values)
    {
        parent::__construct($id);
        $this->firstName = Arr::get($values, "first_name");
        $this->lastName = Arr::get($values, "last_name");
        $this->email = Arr::get($values, "email");
        $this->phone = Arr::get($values, "phone");
        $this->address = Arr::get($values, "address");
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
