<?php

namespace SchoolApi\Subject\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\Subject\Commands\ListSubject\ListSubjectCommand;
use SchoolApi\Subject\Http\Requests\ListSubjectRequest;
use SchoolApi\Subject\Transformers\SubjectResource;

class ListSubjectController extends Controller
{
    /**
     * Lista de asignaturas
     * @param \SchoolApi\Subject\Http\Requests\ListSubjectRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(ListSubjectRequest $request)
    {
        $command = new ListSubjectCommand(10, null);
        $collection = $this->commandBus->dispatch($command);

        return SubjectResource::collection($collection);
    }
}
