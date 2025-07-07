<?php

namespace SchoolApi\EducationLevel\Commands\ListSublevel;

use SchoolApi\EducationLevel\Interfaces\ISublevelRepository;

class ListSublevelHandler
{
    /**
     * Instancia de repositorio
     * @var \SchoolApi\EducationLevel\Interfaces\ISublevelRepository
     */
    private $subLevelRepository;

    /**
     * Summary of __construct
     * @param \SchoolApi\EducationLevel\Interfaces\ISublevelRepository $sublevelRepository
     */
    public function __construct(ISublevelRepository $sublevelRepository)
    {
        $this->subLevelRepository = $sublevelRepository;
    }

    /**
     * Devuelve una lista de grados
     * @param \SchoolApi\EducationLevel\Commands\ListSublevel\ListSublevelCommand $command
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function __invoke(ListSublevelCommand $command)
    {
        return $this->subLevelRepository
            ->getAndPaginate($command->getPerPage());
    }
}
