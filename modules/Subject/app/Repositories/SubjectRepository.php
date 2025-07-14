<?php

namespace SchoolApi\Subject\Repositories;

use Exception;
use SchoolApi\Subject\Exceptions\SubjectNotFoundException;
use SchoolApi\Subject\Interfaces\ISubjectRepository;
use SchoolApi\Subject\Models\Subject;

class SubjectRepository implements ISubjectRepository
{
    /**
     * Instancia de modelo
     * @var \SchoolApi\Subject\Models\Subject
     */
    private $model;

    /**
     * Constructor
     * @param \SchoolApi\Subject\Models\Subject $subject
     */
    public function __construct(Subject $subject)
    {
        $this->model = $subject;
    }

    public function getAndPaginate(int $perPage = 10): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function find(int $id, bool $fail = true)
    {
        $subject = $this->model->find($id);

        if (!$subject && $fail) {
            throw new SubjectNotFoundException("Asignatura no encontrada");
        }

        return $subject;
    }

    public function create(array $values)
    {
        return $this->model->create($values);
    }

    public function update(int $id, array $values)
    {
        $subject = $this->find($id);
        $subject->update($values);
        return $subject->refresh();
    }

    public function delete(int $id)
    {
        $subject = $this->find($id);
        $subject->delete();
        return true;
    }
}
