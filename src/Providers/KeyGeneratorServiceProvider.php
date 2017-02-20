<?php

namespace SevenShores\EncryptionCompat\Providers;

use Illuminate\Support\ServiceProvider;
use SevenShores\EncryptionCompat\Console\KeyGenerateNewCommand;

class KeyGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('command.key.generate-new', function($app) {
            return new KeyGenerateNewCommand($app['files']);
        });

        $this->commands(array('command.key.generate-new'));
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('command.key.generate-new');
    }
}
