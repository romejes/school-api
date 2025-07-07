<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Joselfonseca\LaravelTactician\CommandBusInterface;

class CommandServiceProvider extends ServiceProvider
{
    /**
     * Conjunto de Commands y Handlers
     *
     * @var array
     */
    protected $commandHandlers = [];

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot(): void
    {
        $this->mapCommandHandlers();
    }

    private function mapCommandHandlers()
    {
        $bus = $this->app->make(CommandBusInterface::class);

        foreach ($this->commandHandlers as $command => $handler) {
            $bus->addHandler($command, $handler);
        }

        $this->app->instance(CommandBusInterface::class, $bus);
    }
}
