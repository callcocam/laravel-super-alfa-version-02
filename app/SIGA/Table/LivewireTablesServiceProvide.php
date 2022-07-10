<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Table;


use Illuminate\Support\ServiceProvider;

class LivewireTablesServiceProvide  extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->mergeConfigFrom(sprintf("%s/config/laravel-livewire-tables.php", __DIR__), 'laravel-livewire-tables');

        $this->loadTranslationsFrom(sprintf('%s/resources/lang', __DIR__), 'laravel-livewire-tables');

        $this->loadViewsFrom(sprintf('%s/resources/views',__DIR__), 'laravel-livewire-tables');

        include __DIR__.'/helpers.php';
    }

    /**
     * Register the application services.
     */
    public function register()
    {

    }
}
