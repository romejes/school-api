<?php

namespace SchoolApi\Student\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Student\Commands\CreateStudent\CreateStudentCommand;
use SchoolApi\Student\Commands\DeleteStudent\DeleteStudentCommand;
use SchoolApi\Student\Commands\EditStudent\EditStudentCommand;
use SchoolApi\Student\Commands\ListStudents\ListStudentsCommand;
use SchoolApi\Student\Commands\ShowStudent\ShowStudentCommand;
use SchoolApi\Student\Http\Requests\CreateStudentRequest;
use SchoolApi\Student\Http\Requests\EditStudentRequest;
use SchoolApi\Student\Transformers\StudentResource;

class StudentController extends Controller
{
    /**
     * Devuelve un listado de estudiantes
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function list()
    {
        $command = new ListStudentsCommand(10, null);
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
        $command = new ShowStudentCommand($id);
        $student = $this->commandBus->dispatch($command);

        return new StudentResource($student);
    }

    /**
     * Registra un nuevo estudiante
     * @param \SchoolApi\Student\Http\Requests\CreateStudentRequest $request
     * @return StudentResource
     */
    public function create(CreateStudentRequest $request)
    {
        $command = new CreateStudentCommand($request->all());
        $student = $this->commandBus->dispatch($command);

        return new StudentResource($student);
    }

    /**
     * Edita un estudiante
     * @param int $id
     * @param \SchoolApi\Student\Http\Requests\EditStudentRequest $request
     * @return StudentResource
     */
    public function edit(int $id, EditStudentRequest $request)
    {
        $command = new EditStudentCommand($id, $request->all());
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
        $command = new DeleteStudentCommand($id);
        $this->commandBus->dispatch($command);

        return response()->json([
            "id" => $id,
            "deleted" => true
        ]);
    }
}
