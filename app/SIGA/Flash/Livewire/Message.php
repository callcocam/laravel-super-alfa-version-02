<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash\Livewire;


use Livewire\Component;

class Message extends Component
{

    protected $message;

    protected $styles = [];

    public $shown = true;
    protected $listeners = [
            'dismiss'
    ];

    public function mount($message)
    {
        if (!is_array($message)) {
            $message = (array)$message;
        }

        $this->message = $message;

        $this->styles = config(sprintf('flash.styles.%s', $this->message['level']));
    }

    public function render()
    {

        return view(config('flash.views.message'))
            ->with($this->message)->with($this->styles);
    }

    public function dismiss()
    {
        $this->shown = false;
    }

}
