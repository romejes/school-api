<?php

namespace SchoolApi\EducationLevel\Http\Controllers;

use App\Http\Controllers\Controller;
use SchoolApi\EducationLevel\Commands\ListLevel\ListLevelCommand;
use SchoolApi\EducationLevel\Transformers\LevelResource;

class ListLevelController extends Controller
{
    /**
     * Endpoint que devuelve un listado de niveles educativos
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $dto = new ListLevelCommand();
        $collection = $this->commandBus->dispatch($dto);

        return LevelResource::collection($collection);
    }
}
