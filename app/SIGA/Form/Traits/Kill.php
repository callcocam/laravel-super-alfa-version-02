<?php


namespace App\SIGA\Form\Traits;


trait Kill
{
    public function kill($params=[]){

        $this->model->delete();

        flash("Operação realizada com sucesso :)", 'success')->dismissable();

        return redirect()->route($this->route, array_merge(request()->query(), json_decode($params, true)));
    }
}
