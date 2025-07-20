<?php

namespace SchoolApi\Teacher\Interfaces;

use App\Interfaces\Repositories\IDeleteRepository;
use App\Interfaces\Repositories\IGetAndPaginateRepository;
use App\Interfaces\Repositories\IShowById;

interface ITeacherRepository extends IGetAndPaginateRepository, IDeleteRepository, IShowById
{
    /**
     * Crea un nuevo registro
     * @param array $values
     * @return \SchoolApi\Teacher\Models\Teacher
     */
    public function create(array $values);

    /**
     * Actualiza un registro
     * @param int $id
     * @param array $values
     * @return \SchoolApi\Teacher\Models\Teacher
     */
    public function update(int $id, array $values);
}
