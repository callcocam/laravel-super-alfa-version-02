<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Campanha;


use Illuminate\Support\ServiceProvider;

class CampanhaServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/campanha.php', 'campanha');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        if (is_dir(resource_path('views/vendor/campanha')))
            $this->loadViewsFrom(resource_path('views/vendor/campanha'), 'campanha');
        else
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'campanha');

          ComponentParser::generateLivewire(base_path("Campanha/src/Http/Livewire"), 'src', "Campanha");
    }
}
