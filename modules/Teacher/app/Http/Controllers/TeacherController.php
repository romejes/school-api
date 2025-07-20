<?php

namespace SchoolApi\Teacher\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Teacher\Commands;
use SchoolApi\Teacher\Http\Requests;
use SchoolApi\Teacher\Transformers\TeacherResource;

class TeacherController extends Controller
{
    /**
     * Mostrar listado de docentes
     * @param \SchoolApi\Teacher\Http\Requests\ListTeachersRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list(Requests\ListTeachersRequest $request)
    {
        $command = new Commands\ListTeachers\ListTeachersCommand(10, null);
        $teachers = $this->commandBus->dispatch($command);

        return TeacherResource::collection($teachers);
    }

    /**
     * Muestra la información de un docente
     * @param int $id
     * @return TeacherResource
     */
    public function show(int $id)
    {
        $command = new Commands\ShowTeacher\ShowTeacherCommand($id);
        $teacher = $this->commandBus->dispatch($command);

        return new TeacherResource($teacher);
    }

    /**
     * Registra un docente nuevo
     * @param \SchoolApi\Teacher\Http\Requests\CreateTeacherRequest $request
     * @return TeacherResource
     */
    public function create(Requests\CreateTeacherRequest $request)
    {
        $command = new Commands\CreateTeacher\CreateTeacherCommand($request->all());
        $teacher = $this->commandBus->dispatch($command);

        return new TeacherResource($teacher);
    }

    /**
     * Edita un docente
     * @param int $id
     * @param \SchoolApi\Teacher\Http\Requests\EditTeacherRequest $request
     * @return TeacherResource
     */
    public function edit(int $id, Requests\EditTeacherRequest $request)
    {
        $command = new Commands\EditTeacher\EditTeacherCommand($id, $request->all());
        $teacher = $this->commandBus->dispatch($command);

        return new TeacherResource($teacher);
    }

    /**
     * Elimina un docente
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $command = new Commands\DeleteTeacher\DeleteTeacherCommand($id);
        $this->commandBus->dispatch($command);

        return response()->json([
            "id" => $id,
            "deleted" => true
        ]);
    }
}
