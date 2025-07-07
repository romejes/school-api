<?php

namespace SchoolApi\EducationLevel\Repositories;

use SchoolApi\EducationLevel\Interfaces\ISublevelRepository;
use SchoolApi\EducationLevel\Models\Sublevel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SublevelRepository implements ISublevelRepository
{
    /**
     * Instancia de modelo
     * @var \SchoolApi\EducationLevel\Models\Sublevel
     */
    private $model;

    /**
     * Constructor
     * @param \SchoolApi\EducationLevel\Models\Sublevel $sublevel
     */
    public function __construct(Sublevel $sublevel)
    {
        $this->model = $sublevel;
    }

    public function getAndPaginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }
}
