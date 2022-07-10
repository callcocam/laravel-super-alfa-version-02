<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash\Livewire;


use Livewire\Component;

class Overlay extends Component
{

    protected $message;

    protected $styles = [];

    public $shown = true;

    public function mount($message)
    {
        if (!is_array($message)) {
            $message = (array)$message;
        }

        $this->message = $message;

        $this->styles = config('flash.styles.overlay');
    }

    public function render()
    {


        $this->dispatchBrowserEvent('clearFlash');
        return view(config('flash.views.overlay'))
            ->with($this->message)->with($this->styles);
    }

    public function dismiss()
    {
        $this->shown = false;
    }

    public function confirm()
    {
        $this->shown = false;

        $this->emit('confirm',true);
    }

}
