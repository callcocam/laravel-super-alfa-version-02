<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Translations;

use Illuminate\Translation\TranslationServiceProvider as IlluminateTranslationServiceProvider;

class TranslationServiceProvider extends IlluminateTranslationServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        parent::register();

        $this->mergeConfigFrom(__DIR__ . '/config/translation-loader.php', 'translation-loader');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the translation line loader. This method registers a
     * `TranslationLoaderManager` instead of a simple `FileLoader` as the
     * applications `translation.loader` instance.
     */
    protected function registerLoader()
    {
        $this->app->singleton('translation.loader', function ($app) {
            $class = config('translation-loader.translation_manager');
            return new $class($app['files'], $app['path.lang']);
        });
    }
}
