<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Commands\DeleteSubject\DeleteSubjectCommand;

class DeleteSubjectController extends Controller
{
    /**
     * Eliminar asignaturas
     * @param int $subjectID
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function __invoke(int $subjectID)
    {
        $command = new DeleteSubjectCommand($subjectID);
        $this->commandBus->dispatch($command);

        return response()->json([
            "id" => $subjectID,
            "deleted" => true
        ]);
    }
}
