<?php

namespace SchoolApi\Teacher\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Teacher\Commands\CreateTeacher\CreateTeacherCommand;
use SchoolApi\Teacher\Commands\DeleteTeacher\DeleteTeacherCommand;
use SchoolApi\Teacher\Commands\EditTeacher\EditTeacherCommand;
use SchoolApi\Teacher\Commands\ListTeachers\ListTeachersCommand;
use SchoolApi\Teacher\Commands\ShowTeacher\ShowTeacherCommand;
use SchoolApi\Teacher\Http\Requests\CreateTeacherRequest;
use SchoolApi\Teacher\Http\Requests\EditTeacherRequest;
use SchoolApi\Teacher\Http\Requests\ListTeachersRequest;
use SchoolApi\Teacher\Transformers\TeacherResource;

class TeacherController extends Controller
{
    /**
     * Mostrar listado de docentes
     * @param \SchoolApi\Teacher\Http\Requests\ListTeachersRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list(ListTeachersRequest $request)
    {
        $command = new ListTeachersCommand(10, null);
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
        $command = new ShowTeacherCommand($id);
        $teacher = $this->commandBus->dispatch($command);

        return new TeacherResource($teacher);
    }

    /**
     * Registra un docente nuevo
     * @param \SchoolApi\Teacher\Http\Requests\CreateTeacherRequest $request
     * @return TeacherResource
     */
    public function create(CreateTeacherRequest $request)
    {
        $command = new CreateTeacherCommand($request->all());
        $teacher = $this->commandBus->dispatch($command);

        return new TeacherResource($teacher);
    }

    /**
     * Edita un docente
     * @param int $id
     * @param \SchoolApi\Teacher\Http\Requests\EditTeacherRequest $request
     * @return TeacherResource
     */
    public function edit(int $id, EditTeacherRequest $request)
    {
        $command = new EditTeacherCommand($id, $request->all());
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
        $command = new DeleteTeacherCommand($id);
        $this->commandBus->dispatch($command);

        return response()->json([
            "id" => $id,
            "deleted" => true
        ]);
    }
}
