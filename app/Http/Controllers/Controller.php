<?php

namespace App\Http\Controllers;

use Joselfonseca\LaravelTactician\CommandBusInterface;

abstract class Controller
{
    /**
     * Bus de comandos
     * @var \Joselfonseca\LaravelTactician\CommandBusInterface
     */
    protected $commandBus;

    /**
     * Constructor
     * @param \Joselfonseca\LaravelTactician\CommandBusInterface $commandBus
     */
    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }
}
