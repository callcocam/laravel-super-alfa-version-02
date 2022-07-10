<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace SIGA\Form;

use App\SIGA\Form\Traits\Errors;
use App\SIGA\Form\Traits\Kill;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithFileUploads;
use SIGA\Form\Traits\FollowsRules;
use SIGA\RouteTrait;

abstract class FormComponent extends Component
{

    use FollowsRules, Kill, Errors, WithFileUploads,RouteTrait;

    public $model;
    public $form_data;
    public $files;
    public $show_menu = true;
    //public $user;

    public $search;
    public $search_checkbox;
    /**
     * @var UploadedFile
     */
    public $file;
    protected $route;
    private static $storage_disk;
    private static $storage_path;

    public $x;
    public $y;
    public $width;
    public $height;
    /**
     * @var string[]
     */
    protected $listeners = ['fileUpdate', 'input','refreshPhoto','loadProdutoApi'];

    /**
     * @var mixed
     */

    public function layout(): string
    {
        return "layouts.app";
    }

    public function refreshPhoto($data)
    {

    }

    public function loadProdutoApi($data)
    {

    }

    public function fileUpdate($data)
    {
        $this->form_data[$data['name']] = $data['cover'];
    }

    public function input($data)
    {
        $this->form_data[$data['field']] = $data['value'];
    }

    public function title()
    {
        if ($this->model->exists) {
            if (isset($this->form_data['name'])) {
                return sprintf('Editar %s', $this->form_data['name']);
            }

        }
        return "Cadastrar novo registro";
    }

    /**
     * @param null $model
     */
    public function setFormProperties($model = null)
    {
        //$this->user = $this->user();
        $this->model = $model;
        if ($model) {
            $this->form_data = $model->toArray();
        }
        foreach ($this->fields() as $field):
            if (!isset($this->form_data[$field->name])):
                $array = in_array($field->type, ['checkbox', 'file']);
                if (in_array($field->type, ['file'])) {
                    if ($this->form_data[$field->name] = $model->{$field->name}) {
                        $this->form_data[$field->name] = $model->{$field->name}->file;
                    }
                } else {
                    $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
                }
            endif;
        endforeach;
    }

    /**
     * @return mixed
     */
    public function render()
    {

        $fields = $this->elements();
        return view(sprintf('%s%s', $this->prefix(), $this->formView()))
            ->with('fields', $fields)
            ->with($fields)->layout($this->layout(),['show_menu'=>$this->show_menu]);
    }

    /**
     * @return string
     */
    abstract public function formView();

    /**
     * @return array
     */
    public function fields()
    {
        return [];
    }

    /**
     * @return string
     */
    public function prefix()
    {
        return "livewire.";
    }

    /**
     * @param $field
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        if ($this->rules())
            $this->validateOnly($field, $this->rules());
    }

    public function submit()
    {
        if ($this->rules())
            $this->validate($this->rules());

        $field_names = [];
        foreach ($this->fields() as $field) $field_names[] = $field->name;
        $this->form_data = Arr::only($this->form_data, $field_names);
        if($this->uploadPhoto()){
            return $this->success();
        }
       return false;
    }

    public function uploadPhoto()
    {
        $this->file = null;

        return true;
    }


    public function success()
    {
        if ($this->model->exists) {
            try {
                $this->model->update($this->form_data);
                if (\Route::has($this->routeEdit())){
                    flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
                }
                else{
                    $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightUpdate');
                    $this->emit('refreshUpdated', $this->model);
                    flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
                }
                return true;
            } catch (\PDOException $PDOException) {
                flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
                return false;
            }
        } else {
                try {
                    $this->model = $this->model->create($this->form_data);
                    if (\Route::has($this->routeCreate())){
                        flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
                    }
                    else{
                        $this->dispatchBrowserEvent('closeModalForm', 'openPanelRightCreate');
                        $this->emit('refreshCreate', $this->model);
                        flash('Operação realizada com sucesso :)', 'success')->dismissable()->livewire($this);
                    }
                    return true;
                } catch (\PDOException $PDOException) {
                    flash($PDOException->getMessage(), 'danger')->dismissable()->livewire($this);
                    return false;
                }

        }

    }

    public function closeModalForm($modal = 'openPanelRightUpdate')
    {

        $this->emit('refreshUpdated');

        $this->dispatchBrowserEvent('closeModalForm', $modal);

        $this->reset('form_data');

        $this->resetErrorBag();

    }

    public function errorMessage($message)
    {

        return str_replace('form data.', '', $message);
    }

    /**
     * Salvar e ir para outra view
     */
    public function saveAndStay()
    {
        $this->submit();
    }

    /**
     * Salvar e ir para outra view
     */
    public function saveAndEditStay()
    {
        if ($this->submit())
            return $this->saveAndStayResponse();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndStayResponse()
    {
        return $this->saveAndGoBackResponse();
    }

    /**
     *
     */
    public function saveAndGoBack()
    {
        if ($this->submit()) {
            return $this->saveAndGoBackResponse();
        }

    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveAndGoBackResponse()
    {

    }


    public function getRouteKeyName()
    {
        return Str::singular(Str::replaceFirst('-', '', $this->route));
    }


    public function getModalOptionsProperty()
    {
        if ($this->model->exists) {
            return [
                'title' => $this->title(),
                'modalId' => 'openPanelRightUpdate'
            ];
        }
        return [
            'title' => $this->title(),
            'modalId' => 'openPanelRightCreate'
        ];
    }

    protected function elements()
    {
        $fields = [];
        if ($this->fields()) {
            foreach ($this->fields() as $field) {
                $fields[$field->name] = $field;
            }
        }
        return $fields;
    }

    public function back($route, $params = [])
    {
        return route($route, array_merge(request()->query(), $params));
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

    protected function user()
    {
        return Auth::user();
    }

    protected function logCreated($description,$status)
    {
       
       $this->model->logs()->create([
           "name"=>"Criado",
           "user_id"=>auth()->user()->id,
           "description"=>$description,
           "status"=>$status,
           "created_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
           "updated_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
       ]);
    }

    protected function logAtualizar($description,$status)
    {
           //echo $status;
        $this->model->logs()->create([
            "name"=>"Atualizado",
            "user_id"=>auth()->user()->id,
            "description"=>$description,
            "status"=>$status,
            "created_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
            "updated_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
        ]);
        // \App\Models\NewLog::create([
        //     "name"=>"Atualizado",
        //     "user_id"=>auth()->user()->id,
        //     "description"=>$description,
        //     "status"=>$status,
        //     "parent" => $this->model->id,
        //     "created_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
        //     "updated_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
        //    ]);
    }

    protected function logDeleted($description,$status)
    {
        $this->model->logs()->create([
            "name"=>"Deletado",
            "user_id"=>auth()->user()->id,
            "description"=>$description,
            "status"=>"deletado",
            "created_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
            "updated_at" => now()->subHours(3)->format("Y-m-d H:i:s"),
        ]);
    }
//    public function __get($property)
//    {
//        if (isset($this->form_data[$property]))
//            return $this->form_data[$property];
//
//        return $property;
//    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function updateOrder($data){
        
    }
}
