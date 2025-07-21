<?php

namespace SchoolApi\Student\Interfaces;

use App\Interfaces\Repositories;

interface IStudentRepository extends
    Repositories\IGetAndPaginate,
    Repositories\IDelete,
    Repositories\IShowById,
    Repositories\ICreate,
    Repositories\IFindAndUpdate
{
    /**
     * Devuelve la cantidad de estudiantes registrados en el año
     * @param integer $year
     * @return integer
     */
    public function countStudentsByYear(int $year): int;
}
