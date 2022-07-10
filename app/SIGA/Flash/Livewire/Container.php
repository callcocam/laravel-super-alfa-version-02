<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Flash\Livewire;


use Livewire\Component;

class Container extends Component
{

    public $messages = [];

    protected $listeners = ['flashMessageAdded'];

    public function mount()
    {

        $this->messages = session('flash_notification', collect())->toArray();

        session()->forget('flash_notification');

    }

    public function render(){
        return view(config('flash.views.container'));
    }

    public function flashMessageAdded($message)
    {
        $this->messages[] = $message;
    }

    public function dismissMessage($key)
    {
        unset($this->messages[$key]);
    }
}
