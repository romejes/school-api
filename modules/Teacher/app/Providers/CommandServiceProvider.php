<?php

namespace SchoolApi\Teacher\Providers;

use App\Providers\CommandServiceProvider as ServiceProvider;
use SchoolApi\Teacher\Commands\CreateTeacher;
use SchoolApi\Teacher\Commands\DeleteTeacher;
use SchoolApi\Teacher\Commands\EditTeacher;
use SchoolApi\Teacher\Commands\ListTeachers;
use SchoolApi\Teacher\Commands\ShowTeacher;

class CommandServiceProvider extends ServiceProvider
{
    protected $commandHandlers = [
        ListTeachers\ListTeachersCommand::class => ListTeachers\ListTeachersHandler::class,
        ShowTeacher\ShowTeacherCommand::class => ShowTeacher\ShowTeacherHandler::class,
        CreateTeacher\CreateTeacherCommand::class => CreateTeacher\CreateTeacherHandler::class,
        EditTeacher\EditTeacherCommand::class => EditTeacher\EditTeacherHandler::class,
        DeleteTeacher\DeleteTeacherCommand::class => DeleteTeacher\DeleteTeacherHandler::class
    ];
}
