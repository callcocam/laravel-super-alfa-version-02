<?php

namespace App\Http\Livewire\App;

use App\Models\Produto;
use SIGA\Charts\Facades\LivewireCharts;
use Livewire\Component;

class Dashboard extends Component
{

    public $types = ['criado', 'recusado', 'concluido', 'compras'];

    public $firstRun = true;

    public $colors = [
        'criado' => '#3A3CFA',
        'recusado' => '#FA4B3C',
        'concluido' => '#50883B',
        'compras' => '#DE9E35',

    ];

    public $showDataLabels = true;

    protected $listeners = [
        'onPointClick' => 'handleOnPointClick',
        'onSliceClick' => 'handleOnSliceClick',
        'onColumnClick' => 'handleOnColumnClick',
    ];

    public function handleOnPointClick($point)
    {
        //  dd($point);
    }

    public function handleOnSliceClick($slice)
    {
        // dd($slice);
    }

    public function handleOnColumnClick($column)
    {
        //  dd($column);
    }

    public function render()
    {
        $products = Produto::query()->whereIn('status', $this->types)->user()->get();
        $pieChartModel = null;
        if (class_exists(\SIGA\Charts\LivewireCharts::class)) {
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
            $this->firstRun = false;
        }


        return view('dashboard')
            ->with([
                //'columnChartModel' => $columnChartModel,
                'pieChartModel' => $pieChartModel,
                //'lineChartModel' => $lineChartModel,
                //'areaChartModel' => $areaChartModel,
                //'multiLineChartModel' => $multiLineChartModel,
                // 'multiColumnChartModel' => $multiColumnChartModel,
            ]);
    }

    public function quantity($status)
    {
        return Produto::query()->whereIn('status', $status)->user()->count();
    }
}
