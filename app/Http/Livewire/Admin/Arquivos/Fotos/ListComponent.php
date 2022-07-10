<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Arquivos\Fotos;

use App\Exports\ArquivosExport;
use App\Models\Arquivo;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{
    public $status_btn = true;
    public $checkbox_side = 'left';
    public $checkbox = true;
    public $perPage = 100;
    public $status_field = "transparent";

    public $status_options = [
        "1"=>"Finalizado(SIM)",
        "0"=>"Finalizado(NÃO)"
    ];

    public function query(): Builder
    {
        return Arquivo::query()->where('type', 'fotos');
    }

    public function columns(): array
    {
        return [
            Column::make('Arquivo', 'name')->format(function ($model) {
                return view('includes.arquivos.link-name', compact('model'));
            })->searchable()->colspan(1),
//            Column::make('Link', 'archive')->format(function ($model) {
//                return view('includes.arquivos.name', compact('model'));
//            })->colspan(1),
             Column::make('Status', 'status')->format(function ($model) {
                 return $model->status == '1' ? "Habilitado" : "Desabilitado";
             })->colspan(1),
             Column::make('Finalizado', 'transparent')->format(function ($model) {
                return $model->transparent == '1' ? "Sim" : "Não";
            })->sortable()->colspan(1),
            Column::make('Vinculado', 'produto_id')->format(function ($model) {
                return !$model->produto_id ? "Não" : "Sim";
            })->sortable()->colspan(1),
            Column::make('Data', 'created_at')->format(function (Arquivo $model){
                return $model->created_at->format('d/m/Y');
            })->colspan(1),
        ];
    }



    public function layout(): string
    {
        return 'layouts.admin';
    }

    public function route()
    {
        return "admin.arquivos.fotos";
    }


    public function view()
    {
        return 'admin.arquivos.fotos.list-component';
    }

    public function deleteModel()
    {
        if (Storage::exists($this->currentDelete->archive)) {
            Storage::delete($this->currentDelete->archive);
        }
        return parent::deleteModel();
    }

    public function export($type = "csv")
    {
        return Excel::download(new ArquivosExport(), sprintf('fotos.%s', $type));
    }

//    public function disableAll()
//    {
//        //if (!$this->checkbox_values) {
//            $this->query()->get()->each(function ($model) {
//                $model->update(['status' => 0]);
//            });
//            flash('Arquivos Desabilitados :)', 'success')->dismissable()->livewire($this);
//       // }
//       // else{
//          //  parent::disableAll();
//      //  }
//    }
//
//    public function enableAll()
//    {
//      //  if (!$this->checkbox_values) {
//            $this->query()->get()->each(function ($model) {
//                $model->update(['status' => 1]);
//            });
//            flash('Arquivos Habilitados :)', 'success')->dismissable()->livewire($this);
//      //  }
//      ///  else{
//       //     parent::enableAll();
//      //  }
//    }
}
