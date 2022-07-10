<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace SIGA\Themes;

use SIGA\Themes\Components\{FilterDatePicker};

abstract class AbstractTheme
{
    public static string $scripts = '';

    public static string $styles = '';

 
    public FilterDatePicker $filterDatePicker;

    public static string $paginationTheme;

    public static function paginationTheme(): string
    {
        return self::$paginationTheme;
    }

    public function filterDatePicker(): FilterDatePicker
    {
        return Theme::filterDatePicker();
    }

}
