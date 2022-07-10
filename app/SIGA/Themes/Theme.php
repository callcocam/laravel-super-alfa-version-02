<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace SIGA\Themes;

use Illuminate\Support\Facades\Facade;
use SIGA\Themes\Components\{FilterDatePicker};

/**
 * @method static FilterDatePicker filterDatePicker()
 * @see \SIGA\Themes\ThemeManager
 */
class Theme extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'theme';
    }
}
