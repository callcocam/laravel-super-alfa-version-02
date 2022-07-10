<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace SIGA\Themes;

use SIGA\Themes\Components\{ FilterDatePicker };

class ThemeManager
{
   
    
    /**
     * @param string $class
     * @return object|ThemeBase
     */
    public static function theme(string $class)
    {
        // if ($class === 'tailwind') {
        //     $class = Tailwind::class;
        // }
        if ($class === 'bootstrap') {
            $class = Bootstrap5::class;
        }

        return new $class();
    }

    public function filterDatePicker(): FilterDatePicker
    {
        return new FilterDatePicker();
    }

}
