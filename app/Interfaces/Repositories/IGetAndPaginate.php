<?php

namespace App\Interfaces\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IGetAndPaginate
{
    /**
     * Obtiene todos los registros en formato de paginación
     * @return LengthAwarePaginator
     */
    public function getAndPaginate(int $perPage = 10): LengthAwarePaginator;
}
