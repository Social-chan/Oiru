<?php

namespace Socialchan\Oiru\Providers;

use Illuminate\Support\ServiceProvider;

class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $generators = [
            'command.make.module'            => \Socialchan\Oiru\Console\Generators\MakeModuleCommand::class,
            'command.make.module.controller' => \Socialchan\Oiru\Console\Generators\MakeControllerCommand::class,
            'command.make.module.middleware' => \Socialchan\Oiru\Console\Generators\MakeMiddlewareCommand::class,
            'command.make.module.migration'  => \Socialchan\Oiru\Console\Generators\MakeMigrationCommand::class,
            'command.make.module.model'      => \Socialchan\Oiru\Console\Generators\MakeModelCommand::class,
            'command.make.module.policy'     => \Socialchan\Oiru\Console\Generators\MakePolicyCommand::class,
            'command.make.module.provider'   => \Socialchan\Oiru\Console\Generators\MakeProviderCommand::class,
            'command.make.module.request'    => \Socialchan\Oiru\Console\Generators\MakeRequestCommand::class,
            'command.make.module.seeder'     => \Socialchan\Oiru\Console\Generators\MakeSeederCommand::class,
            'command.make.module.test'       => \Socialchan\Oiru\Console\Generators\MakeTestCommand::class,
        ];

        foreach ($generators as $slug => $class) {
            $this->app->singleton($slug, function ($app) use ($slug, $class) {
                return $app[$class];
            });

            $this->commands($slug);
        }
    }
}
