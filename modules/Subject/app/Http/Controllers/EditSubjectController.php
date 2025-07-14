<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Http\Requests\EditSubjectRequest;
use SchoolApi\Subject\Transformers\SubjectResource;
use SchoolApi\Subject\Commands\EditSubject\EditSubjectCommand;

class EditSubjectController extends Controller
{
    /**
     * Edicion de asignatura
     * @param int $subjetcID
     * @param \SchoolApi\Subject\Http\Requests\EditSubjectRequest $request
     * @return SubjectResource
     */
    public function __invoke(int $subjetcID, EditSubjectRequest $request)
    {
        $command = new EditSubjectCommand($subjetcID, $request->all());
        $subject = $this->commandBus->dispatch($command);

        return new SubjectResource($subject);
    }
}
