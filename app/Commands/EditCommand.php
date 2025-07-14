<?php
namespace App\Commands;

class EditCommand
{
    /**
     * ID de registro a modificar
     * @var integer
     */
    private $id;

    /**
     * Constructor
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getID()
    {
        return $this->id;
    }
}
