<?php

namespace SIGA\Charts\Charts;

use SIGA\Charts\Models\PieChartModel;
use Livewire\Component;

/**
 * Class PieChart
 * @package SIGA\Charts\Charts
 */
class LivewirePieChart extends Component
{
    public $pieChartModel;

    public function mount(PieChartModel $pieChartModel)
    {
        $this->pieChartModel = $pieChartModel->toArray();
    }

    public function onSliceClick($slice)
    {
        $onSliceClickEventName = data_get($this->pieChartModel, 'onSliceClickEventName', null);

        if ($onSliceClickEventName === null) {
            return;
        }

        $this->emit($onSliceClickEventName, $slice);
    }

    public function render()
    {
        return view('livewire-charts::livewire-pie-chart');
    }
}
