<?php

namespace SIGA\Charts\Charts;

use SIGA\Charts\Models\AreaChartModel;
use Livewire\Component;

/**
 * Class LivewireAreaChart
 * @package Asantibanez\LivewireCharts\Charts
 */
class LivewireAreaChart extends Component
{
    public $areaChartModel;

    public function mount(AreaChartModel $areaChartModel)
    {
        $this->areaChartModel = $areaChartModel->toArray();
    }

    public function onPointClick($point)
    {
        $onPointClickEventName = data_get($this->areaChartModel, 'onPointClickEventName', null);

        if ($onPointClickEventName === null) {
            return;
        }

        $this->emit($onPointClickEventName, $point);
    }

    public function render()
    {
        return view('livewire-charts::livewire-area-chart');
    }
}
