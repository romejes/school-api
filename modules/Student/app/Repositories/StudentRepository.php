<?php

namespace SchoolApi\Student\Repositories;

use SchoolApi\Student\Interfaces\IStudentRepository;
use SchoolApi\Student\Models\Student;
use SchoolApi\Student\Exceptions\StudentNotFoundException;

class StudentRepository implements IStudentRepository
{
    /**
     * Instancia de modelo
     * @var \SchoolApi\Student\Models\Student
     */
    private $model;

    /**
     * Constructor
     * @param \SchoolApi\Student\Models\Student $student
     */
    public function __construct(Student $student)
    {
        $this->model = $student;
    }

    public function getAndPaginate(int $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function showById(int $id, array $relations = [], $fail = true)
    {
        $student = $this->model
            ->with($relations)
            ->find($id);

        if (!$student && $fail) {
            throw new StudentNotFoundException($id);
        }

        return $student;
    }

    public function create(array $values)
    {
        return $this->model->create($values);
    }

    public function findAndUpdate(int $id, array $data)
    {
        $student = $this->showById($id);
        $student->update($data);
        return $student->refresh();
    }

    public function delete(int $id)
    {
        $subject = $this->showById($id);
        $subject->delete();
        return true;
    }

    public function countStudentsByYear(int $year): int
    {
        return $this->model->whereYear("created_at", $year)->count();
    }
}
