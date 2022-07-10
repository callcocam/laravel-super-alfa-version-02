<?php

namespace App\Http\Livewire\Admin;

use App\Models\Produto;
use App\Models\Role;
use SIGA\Charts\Facades\LivewireCharts;
use Illuminate\Support\Arr;
use Livewire\Component;
use Carbon\Carbon;

class Dashboard extends Component
{

    public $types = ['criado', 'arquivar', 'compras', 'marketing', 'cadastro', 'recusado', 'finalizado', 'concluido', 'compras-concluido'];

    public $firstRun = true;

    public $options = [];
    public $filter = [];
    public $date_picker = [
        'field'=>'created_at',
        'dataField'=>'created_at',
        'label'=>'Selecione',
    ];
    public $start = null;
    public $end = null;
    public $data_field = "created_at";
    public $colors = [
        'criado' => '#3A3CFA',
        'arquivar' => '#291D0A',
        'compras' => '#3447C6',
        'marketing' => '#CFDE62',
        'cadastro' => '#255C21',
        'recusado' => '#E20000',
        'finalizado' => '#63A646',
        'concluido' => '#63A6EC',
        'importadoerp' => '#63A6EC',
        'compras-concluido' => '#ccc',

    ];

    public $showDataLabels = true;

    protected $listeners = [
        'eventChangeDatePiker' => 'eventChangeDatePiker',
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function eventChangeDatePiker($values)
    {
        $selectedDates = data_get($values, 'selectedDates');
        $this->start = $selectedDates[0];
        $this->end = $selectedDates[0];
        $this->data_field = data_get($values, 'field');
    }

    public function handleOnPointClick($point)
    {
       // dd($point);
    }

    public function handleOnSliceClick($slice)
    {
       // dd($slice);
    }

    public function handleOnColumnClick($column)
    {
       // dd($column);
    }


    public function render()
    {


        $pieChartModel = null;
        if (!auth()->user()->hasAnyRole('lojas','lojas-campanha')){
        if (class_exists(\SIGA\Charts\LivewireCharts::class)) {
            $query = Produto::query();
            if ($this->start && $this->end){
                $query->whereBetween($this->data_field, [Carbon::parse($this->start), Carbon::parse($this->end)]);
            }
            if (auth()->user()->isAdmin()) {
                $query->whereIn('status', $this->types);

            } else {
                if (auth()->user()->hasAllRoles('estoque')) {
                    $query->user()->where('status', 'estoque');
                } elseif (auth()->user()->hasAllRoles('compras')) {

                    $coperats = auth()->user()->coperat;
                    $this->options = $coperats;
                    $ids_produtos = [];
                    foreach ($coperats as $coperat) {
                        $ids_produtos = array_merge($ids_produtos, $coperat->produtos->pluck('id')->toArray());
                    }
                    $query->whereIn('id', $ids_produtos)
                        ->where('status', 'compras');
                } elseif (auth()->user()->hasAllRoles('marketing')) {
                    $query->user()
                        ->where('status', 'marketing');
                } elseif (auth()->user()->hasAllRoles('cadastros')) {
                    $query->where('status', 'cadastros');
                }
                if (Arr::has($this->filter, 'category') && Arr::get($this->filter, 'category')){
                    $query->where("coperat_id",$this->filter['category']);
                }
            }
            $products = $query->get();
            $pieChartModel = $products->groupBy('status')
                ->reduce(function ($pieChartModel, $data) {
                    $type = $data->first()->status;
                    $value = $data->count('id');

                    return $pieChartModel->addSlice($type, $value, $this->colors[$type]);
                }, LivewireCharts::pieChartModel()
                    //->setTitle('Expenses by Type')
                    ->setAnimated($this->firstRun)
                    ->withOnSliceClickEvent('onSliceClick')
                    //->withoutLegend()
                    ->legendPositionBottom()
                    ->legendHorizontallyAlignedCenter()
                    ->setDataLabelsEnabled($this->showDataLabels)
                    ->setColors($this->colors)
                );
        }
            
    }
        $this->firstRun = false;
        return view('livewire.admin.dashboard')
            ->with([
                'theme' => \Theme::theme("bootstrap"),
                'pieChartModel' => $pieChartModel,
                //'lineChartModel' => $lineChartModel,
                //'areaChartModel' => $areaChartModel,
                //'multiLineChartModel' => $multiLineChartModel,
                // 'multiColumnChartModel' => $multiColumnChartModel,
            ])->layout('layouts.admin');
    }


    public function quantity($status)
    {
        $query = Produto::query();
        if (Arr::has($this->filter, 'date') && Arr::get($this->filter, 'date')){
            $query->whereDate("created_at",$this->filter['date']);
        }
        if (Arr::has($this->filter, 'category') && Arr::get($this->filter, 'category')){
            $query->where("coperat_id",$this->filter['category']);
        }
        if (auth()->user()->isAdmin()) {
            return  $query->whereIn('status', $status)->count();
        }
        return $query->user()->whereIn('status', $status)->count();
    }

    public function recusado($status)
    {
        $query = Produto::query();
        if (Arr::has($this->filter, 'date') && Arr::get($this->filter, 'date')){
            $query->whereDate("created_at",$this->filter['date']);
        }
        if (Arr::has($this->filter, 'category') && Arr::get($this->filter, 'category')){
            $query->where("coperat_id",$this->filter['category']);
        }
        if (auth()->user()->isAdmin()) {
            return $query->where('status', "recusado")->whereIn('recusado', $status)->count();
        }
        return $query->user()->whereIn('recusado', $status)->whereIn('status', $status)->count();
    }

    public function status()
    {
        if (auth()->user()->isAdmin()) {
            return Role::query()->pluck('slug')->toArray();
        }
        return auth()->user()->roles()->pluck("slug")->toArray();
    }
}
