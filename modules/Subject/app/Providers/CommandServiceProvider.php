<?php

namespace SchoolApi\Subject\Providers;

use SchoolApi\Subject\Commands\ChangeActiveSubject;
use SchoolApi\Subject\Commands\DeleteSubject;
use SchoolApi\Subject\Commands\EditSubject;
use SchoolApi\Subject\Commands\ListSubject;
use SchoolApi\Subject\Commands\ShowSubject;
use SchoolApi\Subject\Commands\CreateSubject;
use App\Providers\CommandServiceProvider as ServiceProvider;

class CommandServiceProvider extends ServiceProvider
{
    protected $commandHandlers = [
        ListSubject\ListSubjectCommand::class => ListSubject\ListSubjectHandler::class,
        ShowSubject\ShowSubjectCommand::class => ShowSubject\ShowSubjectHandler::class,
        CreateSubject\CreateSubjectCommand::class => CreateSubject\CreateSubjectHandler::class,
        EditSubject\EditSubjectCommand::class => EditSubject\EditSubjectHandler::class,
        DeleteSubject\DeleteSubjectCommand::class => DeleteSubject\DeleteSubjectHandler::class,
        ChangeActiveSubject\ChangeActiveSubjectCommand::class => ChangeActiveSubject\ChangeActiveSubjectHandler::class
    ];
}
