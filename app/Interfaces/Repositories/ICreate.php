<?php
namespace App\Interfaces\Repositories;

interface ICreate
{
    /**
     * Crea un nuevo registro
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data);
}
