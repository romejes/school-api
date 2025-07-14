<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Commands\ShowSubject\ShowSubjectCommand;
use SchoolApi\Subject\Transformers\SubjectResource;

class ShowSubjectController extends Controller
{
    /**
     * Mostrar asignatura
     * @param int $subjectID
     * @return \SchoolApi\Subject\Transformers\SubjectResource
     */
    public function __invoke(int $subjectID)
    {
        $command = new ShowSubjectCommand($subjectID);
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }
}
