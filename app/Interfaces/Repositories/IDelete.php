<?php
namespace App\Interfaces\Repositories;

interface IDelete
{
    /**
     * Elimina un registro
     * @param int $id
     * @return bool
     */
    public function delete(int $id);
}
