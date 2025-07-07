<?php

namespace SchoolApi\EducationLevel\Repositories;

use SchoolApi\EducationLevel\Models\Level;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use SchoolApi\EducationLevel\Interfaces\ILevelRepository;

class LevelRepository implements ILevelRepository
{
    /**
     * Instancia de modelo
     * @var \SchoolApi\EducationLevel\Models\Level
     */
    private $model;

    /**
     * Constructor
     * @param \SchoolApi\EducationLevel\Models\Level $level
     */
    public function __construct(Level $level)
    {
        $this->model = $level;
    }

    public function getAndPaginate(int $perPage = 10): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }
}
