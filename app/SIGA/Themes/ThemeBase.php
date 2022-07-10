<?php
/**
* Created by Claudio Campos.
* User: callcocam@gmail.com, contato@sigasmart.com.br
* https://www.sigasmart.com.br
*/
namespace SIGA\Themes;


class ThemeBase extends AbstractTheme
{
    public string $name = '';

    public string $base = 'siga::components.frameworks.';

    public function root(): string
    {
        return $this->base . '' . $this->name;
    }


    public function apply(): ThemeBase
    {
      
        $this->filterDatePicker  = $this->filterDatePicker();

        return $this;
    }
}