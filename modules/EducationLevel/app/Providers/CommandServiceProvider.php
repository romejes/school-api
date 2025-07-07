<?php

namespace SchoolApi\EducationLevel\Providers;

use App\Providers\CommandServiceProvider as ServiceProvider;
use SchoolApi\EducationLevel\Commands\ListLevel;
use SchoolApi\EducationLevel\Commands\ListSublevel;

class CommandServiceProvider extends ServiceProvider
{
    protected $commandHandlers = [
        ListLevel\ListLevelCommand::class => ListLevel\ListLevelHandler::class,
        ListSublevel\ListSublevelCommand::class => ListSublevel\ListSublevelHandler::class
    ];
}
