<?php
namespace App\Commands;

class DeleteCommand
{
    /**
     * ID del registro a eliminar
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
