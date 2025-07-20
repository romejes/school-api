<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Commands;
use SchoolApi\Subject\Http\Requests;
use SchoolApi\Subject\Transformers\SubjectResource;

class SubjectController extends Controller
{
    /**
     * Devuelve un listado de asignaturas
     * @param \SchoolApi\Subject\Http\Requests\ListSubjectRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list(Requests\ListSubjectRequest $request)
    {
        $command = new Commands\ListSubject\ListSubjectCommand(10, null);
        $collection = $this->commandBus->dispatch($command);

        return SubjectResource::collection($collection);
    }

    /**
     * Devuelve una asignatura
     * @param int $subjectID
     * @return SubjectResource
     */
    public function show(int $subjectID)
    {
        $command = new Commands\ShowSubject\ShowSubjectCommand($subjectID);
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }

    /**
     * Registra una nueva asignatura
     * @param \SchoolApi\Subject\Http\Requests\CreateSubjectRequest $request
     * @return SubjectResource
     */
    public function create(Requests\CreateSubjectRequest $request)
    {
        $command = new Commands\CreateSubject\CreateSubjectCommand($request->all());
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }

    /**
     * Edita una asignatura
     * @param int $subjectID
     * @param \SchoolApi\Subject\Http\Requests\EditSubjectRequest $request
     * @return SubjectResource
     */
    public function edit(int $subjectID, Requests\EditSubjectRequest $request)
    {
        $command = new Commands\EditSubject\EditSubjectCommand($subjectID, $request->all());
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }

    /**
     * Elimina una asignatura
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $command = new Commands\DeleteSubject\DeleteSubjectCommand($id);
        $this->commandBus->dispatch($command);

        return response()->json([
            "id" => $id,
            "deleted" => true
        ]);
    }

    /**
     * Activa o desactiva una asignatura
     * @param mixed $id
     * @param \SchoolApi\Subject\Http\Requests\ChangeActiveSubjectRequest $request
     * @return SubjectResource
     */
    public function changeActive($id, Requests\ChangeActiveSubjectRequest $request)
    {
        $command = new Commands\ChangeActiveSubject\ChangeActiveSubjectCommand($id, $request->active);
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }
}
