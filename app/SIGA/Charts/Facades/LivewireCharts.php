<?php

namespace SIGA\Charts\Facades;

use SIGA\Charts\Models\AreaChartModel;
use SIGA\Charts\Models\ColumnChartModel;
use SIGA\Charts\Models\LineChartModel;
use SIGA\Charts\Models\PieChartModel;
use Illuminate\Support\Facades\Facade;

/**
 * Class LivewireCharts
 * @package SIGA\Charts\Facades
 * @method static LineChartModel lineChartModel()
 * @method static LineChartModel multiLineChartModel()
 * @method static ColumnChartModel columnChartModel()
 * @method static ColumnChartModel multiColumnChartModel()
 * @method static AreaChartModel areaChartModel()
 * @method static PieChartModel pieChartModel()
 */
class LivewireCharts extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'livewirecharts';
    }
}
