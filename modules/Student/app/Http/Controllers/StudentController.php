<?php

namespace SchoolApi\Student\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Student\Commands;
use SchoolApi\Student\Http\Requests;
use SchoolApi\Student\Transformers\StudentResource;

class StudentController extends Controller
{
    /**
     * Devuelve un listado de estudiantes
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list()
    {
        $command = new Commands\ListStudents\ListStudentsCommand(10, null);
        $students = $this->commandBus->dispatch($command);

        return StudentResource::collection($students);
    }

    /**
     * Muestra los datos de un estudiante
     * @param int $id
     * @return StudentResource
     */
    public function show(int $id)
    {
        $command = new Commands\ShowStudent\ShowStudentCommand($id);
        $student = $this->commandBus->dispatch($command);

        return new StudentResource($student);
    }

    /**
     * Registra un nuevo estudiante
     * @param \SchoolApi\Student\Http\Requests\CreateStudentRequest $request
     * @return StudentResource
     */
    public function create(Requests\CreateStudentRequest $request)
    {
        $command = new Commands\CreateStudent\CreateStudentCommand($request->all());
        $student = $this->commandBus->dispatch($command);

        return new StudentResource($student);
    }

    /**
     * Edita un estudiante
     * @param int $id
     * @param \SchoolApi\Student\Http\Requests\EditStudentRequest $request
     * @return StudentResource
     */
    public function edit(int $id, Requests\EditStudentRequest $request)
    {
        $command = new Commands\EditStudent\EditStudentCommand($id, $request->all());
        $student = $this->commandBus->dispatch($command);

        return new StudentResource($student);
    }

    /**
     * Elimina un estudiante
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id)
    {
        $command = new Commands\DeleteStudent\DeleteStudentCommand($id);
        $this->commandBus->dispatch($command);

        return response()->json([
            "id" => $id,
            "deleted" => true
        ]);
    }
}
