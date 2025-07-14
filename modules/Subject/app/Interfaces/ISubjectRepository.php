<?php

namespace SchoolApi\Subject\Interfaces;

use App\Interfaces\Repositories\IDeleteRepository;
use App\Interfaces\Repositories\IGetAndPaginateRepository;

interface ISubjectRepository extends IGetAndPaginateRepository, IDeleteRepository
{
    /**
     * Busca un registro por ID y lo devuelve
     * @param int $id
     * @param bool $fail
     * @return \SchoolApi\Subject\Models\Subject|null
     */
    public function find(int $id, bool $fail = false);

    /**
     * Crea un nuevo registro
     * @param array $values
     * @return \SchoolApi\Subject\Models\Subject
     */
    public function create(array $values);

    /**
     * Actualiza un registro
     * @param int $id
     * @param array $values
     * @return \SchoolApi\Subject\Models\Subject
     */
    public function update(int $id, array $values);
}
