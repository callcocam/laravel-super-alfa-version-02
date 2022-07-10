<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash;


use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use SIGA\Flash\Livewire\Container;
use SIGA\Flash\Livewire\Message;
use SIGA\Flash\Livewire\Overlay;

class FlashServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->bind(
            'SIGA\Flash\SessionStore',
            'SIGA\Flash\LaravelSessionStore'
        );

        $this->app->singleton('flash', function (){
            return $this->app->make('SIGA\Flash\Notifier');
        });
    }

    public function boot(){

        include __DIR__.'/helpers.php';
        $this->mergeConfigFrom(sprintf("%s/flash.php", __DIR__), 'flash');
        $this->loadViewsFrom(sprintf("%s/views", __DIR__), 'flash');
        Livewire::component('container', Container::class);
        Livewire::component('message', Message::class);
        Livewire::component('overlay', Overlay::class);
    }

}
