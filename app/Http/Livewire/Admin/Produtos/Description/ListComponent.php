<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Produtos\Description;

use App\Models\Compra;
use App\Models\Marketing;
use App\Models\Produto;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class ListComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $cod_barras = '';
    public $codigo_interno = '';

    public $queryString = [
        'search' => ['except' => ''],
        'cod_barras' => ['except' => '']
    ];

    public function query(): Builder
    {
        $query = Produto::query();
        if($this->codigo_interno){
            if($res = Compra::query()->where('codigo_interno', $this->codigo_interno)->first()){
                $query->Where('id', $res->produto_id);
            }
        }else{
            if ($cod_barras = $this->cod_barras){
                $query->where('cod_barras', $cod_barras);
            }else{
                if ($search = $this->search){
                    $query->where('descricao_completa',"LIKE", "%{$search}%");
                }
                $query->WhereIn('status', ['concluido','estoque','importadoerp']);
            }
        }

      return $query;
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Lista de produtos";
    }
    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.produtos.descriptions";
    }


    public function render()
    {
       return view( 'livewire.admin.produtos.descriptions.list-component')
           ->with('models', $this->query()
               ->orderBy('created_at', 'ASC')->paginate(50))
           ->layout($this->layout());
    }
    public  function delete($id)
    {
        $produto = Produto::find($id);

//        dd($produto->grupo_produtos);
        if($produto->grupo_produtos){
            foreach ($produto->grupo_produtos as $item){
                $item->delete();
            }
        }
        if($produto->marketing){
            $produto->marketing->delete();
        }
        if($produto->compra){
            $produto->compra->delete();

        }
        if($produto->embalagem){
            $produto->embalagem->delete();
        }
        $produto->delete();
    }

}
