<?php
namespace App\Interfaces\Repositories;

interface IFindAndUpdate
{
    /**
     * Busca un registro y lo modifica
     * @param int $id
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findAndUpdate(int $id, array $data);
}
