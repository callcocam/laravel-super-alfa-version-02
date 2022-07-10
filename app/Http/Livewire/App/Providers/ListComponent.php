<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\App\Providers;

use App\Models\Provider;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return Provider::query();
    }

    public function columns(): array
    {
       return [];
    }

    public function layout(): string
    {
        return 'layouts.app';
    }

    public function route()
    {
        return "app.providers";
    }


    public function view()
    {
       return 'app.providers.list-component';
    }
}
