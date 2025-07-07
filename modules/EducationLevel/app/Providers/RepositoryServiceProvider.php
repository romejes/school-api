<?php

namespace SchoolApi\EducationLevel\Providers;

use Illuminate\Support\ServiceProvider;
use SchoolApi\EducationLevel\Interfaces;
use SchoolApi\EducationLevel\Repositories;

class RepositoryServiceProvider extends ServiceProvider
{
    public $singletons = [
        Interfaces\ILevelRepository::class => Repositories\LevelRepository::class,
        Interfaces\ISublevelRepository::class => Repositories\SublevelRepository::class,
    ];
}
