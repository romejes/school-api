<?php

namespace SchoolApi\EducationLevel\Commands\ListLevel;

use SchoolApi\EducationLevel\Interfaces\ILevelRepository;
use SchoolApi\EducationLevel\Commands\ListLevel\ListLevelCommand;

class ListLevelHandler
{
    /**
     * Instancia de repositorio
     * @var \SchoolApi\EducationLevel\Interfaces\ILevelRepository
     */
    private $levelRepository;

    /**
     * Constructor
     * @param \SchoolApi\EducationLevel\Interfaces\ILevelRepository $levelRepository
     */
    public function __construct(ILevelRepository $levelRepository)
    {
        $this->levelRepository = $levelRepository;
    }

    /**
     * Devuelve una lista de niveles educativos
     * @param \SchoolApi\EducationLevel\Commands\ListLevel\ListLevelCommand $command
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(ListLevelCommand $command)
    {
        return $this->levelRepository
            ->getAndPaginate($command->getPerPage());
    }
}
