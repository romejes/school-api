<?php
namespace App\Interfaces\Repositories;

interface IDeleteRepository
{
    /**
     * Elimina un registro
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
