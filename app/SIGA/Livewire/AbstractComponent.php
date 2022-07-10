<?php

namespace SIGA\Livewire;

use App\Services\GetAccountEntryService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

abstract class AbstractComponent extends Component
{


    abstract public function view();

    public function query()
    {
        return null;
    }

    public function data()
    {
        return $this->model;
    }
    public function layout()
    {
        return 'layouts.admin.app';
    }

    protected $mesages=[
      'true'=>'success',
      'false'=>'error'
    ];

    protected $results=[
        'true'=>true,
        'false'=>false
    ];
    protected $model;
    protected $data;

    /**
     * @param null $model
     */
    public function setFormProperties($model = null)
    {
        $this->model = $model;

    }

    public function render()
    {
        return view(sprintf('livewire.%s', $this->view()))
            ->with('model', $this->data())
            ->with('models', $this->query())
            ->with('user', auth()->user())
            ->layout($this->layout());
    }

    public function getEntryServiceProperty()
    {
        $entryService = null;
        if(auth()->check()){
            if(auth()->user()->account){
                $entryService =  GetAccountEntryService::make()->store([
                    "TaxNumber" =>  $this->user()->account->document
                ])->object();
                if(isset($entryService->Balance))
                   return $entryService->Balance;
            }
        }
        return 0;
    }
    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return $this->user();
    }

    protected function user(){
        return Auth::user();
    }



}
