<?php

namespace SIGA\Charts\Charts;

use SIGA\Charts\Models\ColumnChartModel;
use Livewire\Component;

/**
 * Class LivewireColumnChart
 * @package SIGA\Charts\Charts
 */
class LivewireColumnChart extends Component
{
    public $columnChartModel;

    public function mount(ColumnChartModel $columnChartModel)
    {
        $this->columnChartModel = $columnChartModel->toArray();
    }

    public function onColumnClick($column)
    {
        $onColumnClickEventName = data_get($this->columnChartModel, 'onColumnClickEventName', null);

        if ($onColumnClickEventName === null) {
            return;
        }

        $this->emit($onColumnClickEventName, $column);
    }

    public function render()
    {
        if ($this->columnChartModel['isMultiColumn']) {
            return view('livewire-charts::livewire-multi-column-chart');
        }

        return view('livewire-charts::livewire-column-chart');
    }
}
