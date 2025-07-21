<?php

namespace SchoolApi\Student\Providers;

use App\Providers\CommandServiceProvider as ServiceProvider;
use SchoolApi\Student\Commands\EditStudent;
use SchoolApi\Student\Commands\ShowStudent;
use SchoolApi\Student\Commands\ListStudents;
use SchoolApi\Student\Commands\CreateStudent;
use SchoolApi\Student\Commands\DeleteStudent;

class CommandServiceProvider extends ServiceProvider
{
    protected $commandHandlers = [
        ListStudents\ListStudentsCommand::class => ListStudents\ListStudentsHandler::class,
        ShowStudent\ShowStudentCommand::class => ShowStudent\ShowStudentHandler::class,
        CreateStudent\CreateStudentCommand::class => CreateStudent\CreateStudentHandler::class,
        EditStudent\EditStudentCommand::class => EditStudent\EditStudentHandler::class,
        DeleteStudent\DeleteStudentCommand::class => DeleteStudent\DeleteStudentHandler::class
    ];
}
