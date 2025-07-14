<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Commands\ChangeActiveSubject\ChangeActiveSubjectCommand;
use SchoolApi\Subject\Http\Requests\ChangeActiveSubjectRequest;
use SchoolApi\Subject\Transformers\SubjectResource;

class ChangeActiveSubjectController extends Controller
{
    /**
     * Activar o desactivar asignatura
     * @param int $subjectID
     * @param \SchoolApi\Subject\Http\Requests\ChangeActiveSubjectRequest $request
     * @return \SchoolApi\Subject\Transformers\SubjectResource
     */
    public function __invoke(int $subjectID, ChangeActiveSubjectRequest $request)
    {
        $command = new ChangeActiveSubjectCommand($subjectID, $request->active);
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }
}
