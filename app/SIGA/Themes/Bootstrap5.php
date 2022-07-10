<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace SIGA\Themes;


use SIGA\Themes\Components\{FilterDatePicker};

class Bootstrap5 extends ThemeBase
{
    public string $name = 'bootstrap5';

    public static function paginationTheme(): string
    {
        return 'bootstrap';
    }

    public static function styles(): string
    {
        return 'bootstrap';
    }


    public function filterDatePicker(): FilterDatePicker
    {
        return Theme::filterDatePicker()
            ->input('form-control')
            ->divNotInline('')
            ->divInline('');
    }

}
