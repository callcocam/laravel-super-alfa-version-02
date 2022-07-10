<?php
if(!function_exists('view_table')){

    function view_table($view){

        return sprintf('laravel-livewire-tables::%s.%s', config('laravel-livewire-tables.theme'), $view);
    }
}

if(!function_exists('view_table_include')){

    function view_table_include($view){
         return view_table(sprintf("includes.%s", $view));
    }
}
