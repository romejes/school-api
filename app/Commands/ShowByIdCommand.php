<?php
namespace App\Commands;

class ShowByIdCommand
{
    /**
     * ID a buscar
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
