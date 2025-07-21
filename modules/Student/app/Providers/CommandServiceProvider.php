<?php

namespace SchoolApi\Student\Providers;

use App\Providers\CommandServiceProvider as ServiceProvider;
use SchoolApi\Student\Commands\EditStudent\EditStudentCommand;
use SchoolApi\Student\Commands\EditStudent\EditStudentHandler;
use SchoolApi\Student\Commands\ShowStudent\ShowStudentCommand;
use SchoolApi\Student\Commands\ShowStudent\ShowStudentHandler;
use SchoolApi\Student\Commands\ListStudents\ListStudentsCommand;
use SchoolApi\Student\Commands\ListStudents\ListStudentsHandler;
use SchoolApi\Student\Commands\CreateStudent\CreateStudentCommand;
use SchoolApi\Student\Commands\CreateStudent\CreateStudentHandler;
use SchoolApi\Student\Commands\DeleteStudent\DeleteStudentCommand;
use SchoolApi\Student\Commands\DeleteStudent\DeleteStudentHandler;

class CommandServiceProvider extends ServiceProvider
{
    protected $commandHandlers = [
        ListStudentsCommand::class => ListStudentsHandler::class,
        ShowStudentCommand::class => ShowStudentHandler::class,
        CreateStudentCommand::class => CreateStudentHandler::class,
        EditStudentCommand::class => EditStudentHandler::class,
        DeleteStudentCommand::class => DeleteStudentHandler::class
    ];
}
