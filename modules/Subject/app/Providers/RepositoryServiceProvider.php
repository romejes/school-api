<?php

namespace SchoolApi\Subject\Providers;

use Illuminate\Support\ServiceProvider;
use SchoolApi\Subject\Interfaces;
use SchoolApi\Subject\Repositories;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        Interfaces\ISubjectRepository::class => Repositories\SubjectRepository::class,
    ];
}
