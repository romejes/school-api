<?php

namespace SchoolApi\EducationLevel\Commands\ListLevel;

class ListLevelCommand
{
    /**
     * Número de registros por página
     * @var integer
     */
    private $perPage;

    /**
     * Constructor
     * @param int $perPage
     */
    public function __construct(int $perPage = 10)
    {
        $this->perPage = $perPage;
    }

    /**
     * Devuelve registros por pagina
     * @return int
     */
    public function getPerPage()
    {
        return $this->perPage;
    }
}
