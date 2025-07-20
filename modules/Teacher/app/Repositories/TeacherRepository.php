<?php

namespace SchoolApi\Teacher\Repositories;

use SchoolApi\Teacher\Exceptions\TeacherNotFoundException;
use SchoolApi\Teacher\Models\Teacher;
use SchoolApi\Teacher\Interfaces\ITeacherRepository;

class TeacherRepository implements ITeacherRepository
{
    /**
     * Instancia de modelo
     * @var \SchoolApi\Teacher\Models\Teacher
     */
    private $model;

    /**
     * Constructor
     * @param \SchoolApi\Teacher\Models\Teacher $teacher
     */
    public function __construct(Teacher $teacher)
    {
        $this->model = $teacher;
    }

    public function getAndPaginate(int $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function showById(int $id, array $relations = [], $fail = true)
    {
        $teacher = $this->model
            ->with($relations)
            ->find($id);

        if (!$teacher && $fail) {
            throw new TeacherNotFoundException("Docente no encontrado");
        }

        return $teacher;
    }

    public function create(array $values)
    {
        return $this->model->create($values);
    }

    public function update(int $id, array $values)
    {
        $teacher = $this->showById($id);
        $teacher->update($values);
        return $teacher->refresh();
    }

    public function delete(int $id)
    {
        $subject = $this->showById($id);
        $subject->delete();
        return true;
    }
}
