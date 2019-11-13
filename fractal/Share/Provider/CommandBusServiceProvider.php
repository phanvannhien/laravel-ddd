<?php

namespace Fractal\Share\Provider;

use Illuminate\Support\ServiceProvider;
use Fractal\Share\Application\CommandBus;
use Fractal\Share\Application\SimpleCommandBus;

class CommandBusServiceProvider extends ServiceProvider
{
    private function mappings(): array
    {
        return [
            // User
            \Fractal\User\Application\Command\User\RegisterUserCommand::class => \Fractal\User\Application\Command\User\RegisterUserHandler::class,
        
        ];
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /** @var CommandBus $commandBus */
        $commandBus = $this->app->make(CommandBus::class);

        foreach ($this->mappings() as $command => $handler) {
            if (!is_array($handler)) {
                $commandBus->subscribe($command, $handler);
            } else {
                foreach ($handler as $h) {
                    $commandBus->subscribe($command, $h);
                }
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CommandBus::class, SimpleCommandBus::class);
    }
}
