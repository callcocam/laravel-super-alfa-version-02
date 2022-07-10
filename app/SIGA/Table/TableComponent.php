<?php

namespace SIGA\Table;

use App\SIGA\Form\Traits\Relationship;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use SIGA\Table\Traits\Kill;
use SIGA\Table\Traits\Pagination;
use SIGA\Table\Traits\Search;
use SIGA\Table\Traits\Sorting;
use SIGA\Table\Traits\Table;
use SIGA\Table\Views\Column;
use Carbon\Carbon;
use SIGA\RouteTrait;

abstract class TableComponent extends Component
{

    use WithPagination, Kill, Sorting, Search, Pagination, Table, Relationship,RouteTrait;

    abstract public function view();

    protected $model_conditions;

    public $paginationTheme = "bootstrap";
    public $checkbox;
    public $checkbox_side;
    public $checkbox_attribute = 'id';
    public $checkbox_all = false;
    public $show_menu = true;
    public $isSearch = true;
    public $idDate = true;
    public $start = null;
    public $end = null;
    public $data_field = "created_at";
    public $status_field = "status";
    public $status ="";
    
    public $date_picker = [
        'field'=>'created_at',
        'dataField'=>'created_at',
        'label'=>'Selecione',
    ];
    public $status_options = [];
    public $checkbox_values = [];
    public $queryString = [
        'array_filters' => ['except' => []],
        'search' => ['except' => ''],
        'status' => ['except' => ''],
        'perPage' => ['except' => 12],
        'direction' => ['except' => 'desc'],
        'field' => ['except' => 'created_at']
    ];

    protected $listeners = [
        'eventChangeDatePiker' => 'eventChangeDatePiker',
        "refreshShow",
        "refreshUpdated",
        "refreshCreate",
        "refreshLog",
    ];



    
    public $currentShow;
    public $currentUpdated;
    public $currentCreate;
    public $currentDelete;
    public $currentLog;

    /**
     * @return array
     */
    abstract public function columns(): array;

    public function prefix()
    {
        return "livewire.";
    }

    public function query()
    {
        return null;
    }

    public function refreshShow()
    {
        $this->currentShow = null;
    }

    public function refreshUpdated()
    {

        $this->currentUpdated = null;
    }

    public function refreshCreate()
    {

        $this->currentCreate = false;
    }

    public function refreshDelete()
    {

        $this->currentDelete = null;
    }

    public function refreshLog()
    {

        $this->currentLog = null;
    }

    public function openShow($model)
    {

        $this->currentShow = $this->query()->find($model);

        $this->dispatchBrowserEvent('openModalForm', 'openPanelRightShow');

    }

    public function openUpdated($model)
    {

        $this->currentUpdated = $this->query()->find($model);

        $this->dispatchBrowserEvent('openModalForm', 'openPanelRightUpdate');

    }

    public function openDelete($model)
    {

        $this->currentDelete = $this->query()->find($model);

        $this->dispatchBrowserEvent('openModalForm', 'openPanelRightDelete');

    }

    public function openCreate()
    {

        $this->currentCreate = true;
        $this->dispatchBrowserEvent('openModalForm', 'openPanelRightCreate');

    }


    public function openLog($model)
    {

        $this->currentLog = $this->query()->find($model);

        $this->dispatchBrowserEvent('openModalForm', 'openPanelRightLog');

    }

    public function closeModalForm($modal = 'openPanelRightDelete')
    {

        $this->dispatchBrowserEvent('closeModalForm', $modal);

    }

    public function eventChangeDatePiker($values)
    {
        $selectedDates = data_get($values, 'selectedDates');
        $this->start = $selectedDates[0];
        $this->end = $selectedDates[1];
        $this->data_field = data_get($values, 'field');
    }

    public function filters()
    {
        return null;
    }

    public function layout()
    {
        return 'layouts.app';
    }


    public function render()
    {
        $columns = $this->actions_columns();

        return view(sprintf('%s%s', $this->prefix(), $this->view()))
            ->with('datePickerTheme', \Theme::theme("bootstrap"))
            ->with('models', $this->models())
            ->with('columns', $columns)
            ->with('filters', $this->filters())
            ->layout($this->layout(),[
                'show_menu'=>$this->show_menu
            ]);
    }

    /**
     * @return Builder
     */
    public function models()
    {
        $builder = $this->query();
        if ($this->searchEnabled && trim($this->search) !== '') {
            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if ($column->isSearchable()) {
                        if (Str::contains($column->attribute, '.')) {
                            $relationship = $this->relationship($column->attribute);

                            $builder->orWhereHas($relationship->name, function (Builder $query) use ($relationship) {
                                $query->where($relationship->attribute, 'like', '%' . $this->search . '%');
                            });
                        } elseif (Str::endsWith($column->attribute, '_count')) {
                            // No clean way of using having() with pagination aggregation, do not search counts for now.
                            // If you read this and have a good solution, feel free to submit a PR :P
                        } else {
                            $builder->orWhere($builder->getModel()->getTable() . '.' . $column->getAttribute(), 'like', '%' . trim($this->search) . '%');
                        }


                    }
                }
            });
        }
                  
        if ($this->start && $this->end){
            $builder->whereBetween($this->data_field, [Carbon::parse($this->start)->format('Y-m-d'), Carbon::parse($this->end)->format('Y-m-d')]);                   
        }
        if ($this->status){
            $builder->whereIn($this->status_field, [$this->status]);                   
        }

        if (request()->query('perPage')) {
            $this->perPage = request()->query('perPage');
        }
        return $this->appendGuery($builder)->orderBy($this->getSortField(), $this->direction)->paginate($this->perPage);
    }

    public function appendGuery($builder)
    {
        return $builder;
    }

    public function getTotalProperty()
    {
        return $this->query()->count();
    }

    /**
     * @return string
     */
    public function getTitleProperty()
    {
        return "Listar dados";
    }

    /**
     * @return bool
     */
    public function getCreatedProperty()
    {
        return true;
    }

    /**
     * @param null $model
     * @return bool
     */
    public function isUpdated($model = null)
    {
        if ($model) {
            return true;
        }
        return true;
    }

    /**
     * @param null $model
     * @return bool
     */
    public function isDeleted($model = null)
    {
        if ($model) {
            return true;
        }
        return true;
    }

    public function requestQuery($param, $model, $params = [])
    {
        return array_merge([$param => $model], request()->query(), $params);
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

    protected function actions_columns()
    {
        $columns = $this->columns();
        $columns[] = Column::make('edit')->view($this->view_edit)
            ->hidden_head()->width(150)->hideIf(function ($model) {
                return $this->isUpdated($model);
            });
        $columns[] = Column::make('delete')->view($this->view_delete)
            ->hidden_head()->width(150)->hideIf(function ($model) {
                return $this->isDeleted($model);
            });

        return $columns;
    }

    public function updatedCheckboxAll()
    {
        $this->checkbox_values = [];

        if ($this->checkbox_all) {
            $this->models()->each(function ($model) {
                $this->checkbox_values[] = (string)$model->{$this->checkbox_attribute};
            });
        }
    }


    protected function user()
    {
        return Auth::user();
    }

    public function updatedCheckboxValues()
    {
        $this->checkbox_all = false;
    }


    public function disableSected()
    {

        if ($this->checkbox_values) {
            foreach ($this->checkbox_values as $iten) {
                $model = $this->query()->where('id', $iten)->first();
                $model->update(['status' => 0]);
            }
        }

        flash('Arquivos Desabilitados :)', 'success')->dismissable()->livewire($this);
    }

    public function enableSelected()
    {

        if ($this->checkbox_values) {
            foreach ($this->checkbox_values as $iten) {
                $model = $this->query()->where('id', $iten)->first();
                $model->update(['status' => 1]);
            }
            flash('Arquivos Habilitados :)', 'success')->dismissable()->livewire($this);
        }

    }

    public function disableAll()
    {

        $this->query()->get()->each(function ($model) {
            $model->update(['status' => 0]);
        });
        flash('Arquivos Desabilitados :)', 'success')->dismissable()->livewire($this);

    }

    public function enableAll()
    {

        $this->query()->get()->each(function ($model) {
            $model->update(['status' => 1]);
        });
        flash('Arquivos Habilitados :)', 'success')->dismissable()->livewire($this);

    }


    public function export()
    {
        //
    }

    public function exportexel()
    {
        //
    }
}
