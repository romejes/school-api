<?php

namespace SchoolApi\EducationLevel\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\EducationLevel\Commands\ListSublevel\ListSublevelCommand;
use SchoolApi\EducationLevel\Transformers\SublevelResource;

class ListSublevelController extends Controller
{
    /**
     * Endpoint que devuelve un listado de niveles educativos
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $dto = new ListSublevelCommand();
        $collection = $this->commandBus->dispatch($dto);

        return SublevelResource::collection($collection);
    }
}
