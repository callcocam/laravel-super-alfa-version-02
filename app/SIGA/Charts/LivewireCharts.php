<?php


namespace SIGA\Charts;


use SIGA\Charts\Models\AreaChartModel;
use SIGA\Charts\Models\ColumnChartModel;
use SIGA\Charts\Models\LineChartModel;
use SIGA\Charts\Models\PieChartModel;

class LivewireCharts
{
    public function lineChartModel()
    {
        return (new LineChartModel)
            ->singleLine();
    }

    public function multiLineChartModel()
    {
        return (new LineChartModel)
            ->multiLine();
    }

    public function columnChartModel()
    {
        return (new ColumnChartModel)
            ->singleColumn();
    }

    public function multiColumnChartModel()
    {
        return (new ColumnChartModel)
            ->multiColumn();
    }

    public function areaChartModel()
    {
        return new AreaChartModel;
    }

    public function pieChartModel()
    {
        return new PieChartModel;
    }
}
