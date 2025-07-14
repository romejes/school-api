<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Http\Requests\CreateSubjectRequest;
use SchoolApi\Subject\Transformers\SubjectResource;
use SchoolApi\Subject\Commands\CreateSubject\CreateSubjectCommand;

class CreateSubjectController extends Controller
{
    /**
     * Creacion de asignatura
     * @param \SchoolApi\Subject\Http\Requests\CreateSubjectRequest $request
     * @return SubjectResource
     */
    public function __invoke(CreateSubjectRequest $request)
    {
        $command = new CreateSubjectCommand($request->all());
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }
}
