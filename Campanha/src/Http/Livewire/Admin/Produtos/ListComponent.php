<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace Campanha\Http\Livewire\Admin\Produtos;

use Campanha\Models\ProdutosCampanha;
use SIGA\Table\TableComponent;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query()
    {
        return ProdutosCampanha::query();
    }

    public function prefix()
    {
        return "campanha::";
    }

    public function view()
    {
        return "admin.campanhas.produtos.list-component";
    }

    public function columns(): array
    {
        return [
            Column::make("nome")
        ];
    }


    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.campanhas.produtos";
    }

    public function name(){
        return "admin.campanhas.produtos.list-component";
    }
}
