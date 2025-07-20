<?php
namespace App\Interfaces\Repositories;

interface IShowById
{
    /**
     * Busca un registro por el ID y lo devuelve
     * @param int $id
     * @param array $relations
     * @param bool $fail
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function showById(int $id, array $relations = [], $fail = true);
}
