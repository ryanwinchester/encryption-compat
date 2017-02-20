<?php

namespace SevenShores\EncryptionCompat\Providers;

use RuntimeException;
use Illuminate\Support\ServiceProvider;
use SevenShores\EncryptionCompat\Encrypter;
use SevenShores\EncryptionCompat\McryptEncrypter;

class EncryptionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bindShared('encrypter', function ($app) {
            $key = $app['config']['app.key'];
            $cipher = $app['config']['app.cipher'];

            if (Encrypter::supported($key, $cipher)) {
                return new Encrypter($key, $cipher);
            } elseif (McryptEncrypter::supported($key, $cipher)) {
                return new McryptEncrypter($key, $cipher);
            } else {
                throw new RuntimeException('No supported encrypter found. The cipher and / or key length are invalid.');
            }
        });

        $this->app->register(KeyGeneratorServiceProvider::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        $class = $this->app->resolveProviderClass(KeyGeneratorServiceProvider::class);

        return $class->provides();
    }
}
