<?php
namespace SchoolApi\Student\Commands\EditStudent;

use Illuminate\Support\Arr;
use App\Commands\EditCommand;

class EditStudentCommand extends EditCommand
{
    /**
     * Nombres del estudiante
     * @var string
     */
    private $firstName;

    /**
     * Apellidos del estudiante
     * @var string
     */
    private $lastName;

    /**
     * Correo electrónico del estudiante
     * @var string
     */
    private $email;

    /**
     * Dirección física del estudiante
     * @var string
     */
    private $address;

    /**
     * Número telefónico del estudiante
     * @var string
     */
    private $phone;

    /**
     * Fecha de nacimiento del estudiante
     * @var string
     */
    private $birthday;

    /**
     * Constructor
     * @param int $id ID del estudiante
     * @param array $values Datos para modificar
     */
    public function __construct(int $id, array $values)
    {
        parent::__construct($id);
        $this->firstName = Arr::get($values, "first_name");
        $this->lastName = Arr::get($values, "last_name");
        $this->email = Arr::get($values, "email");
        $this->phone = Arr::get($values, "phone");
        $this->address = Arr::get($values, "address");
        $this->birthday = Arr::get($values, "birthday");
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

    public function getBirthday()
    {
        return $this->birthday;
    }
}
