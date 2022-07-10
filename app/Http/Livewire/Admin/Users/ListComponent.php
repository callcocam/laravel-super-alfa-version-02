<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SIGA\Table\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use SIGA\Table\Views\Column;

class ListComponent extends TableComponent
{

    public function query(): Builder
    {
      return User::query()->where('type','admin');
    }

    public function columns(): array
    {
       return [
         Column::make('Name')->format(function ($model){
             return view(view_table_include('others.user-name'),compact('model'));
         })->sortable()->searchable(),
         Column::make('Email')->searchable()->colspan(3),

       ];
    }

protected function actions_columns()
{
    $columns = parent::actions_columns();
    if (auth()->user()->isAdmin()){
        $columns[] = Column::make('logar')->view("login")
            ->hidden_head()->width(150);
    }
    return  $columns;
}

    public function route()
    {
        return "admin.users";
    }


    public function layout(): string
    {
        return 'layouts.admin';
    }


    public function view()
    {
       return 'admin.users.list-component';
    }

    public function login($id){
        $user = User::find($id);
        Auth::login($user);
        return redirect()->to(sprintf("%s/dashboard", $user->type));
    }
}
