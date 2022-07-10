<?php

namespace App\Http\Controllers;

use App\Imports\BcImport;
use Illuminate\Http\Request;

class BcImportController extends Controller
{
    public function show()
    {
        return view('bcimport');
    }


    public function store(Request $request)
    {
        $file = $request->file('file')->store('import');
    
     
        $importBc = (new \App\Imports\BcImport)->toCollection($file);

        $imports = data_get($importBc->sortDesc()->toArray(),1);        
        if($imports){
            foreach($imports as $import){
                if($bc = \App\Models\Bc::find(data_get($import, 0))){
                    if(is_integer(data_get($import, 3)))
                    {
                        $bc->id_bc = data_get($import, 3);
                        $bc->save();
                    }
                }
            }
        }     

        $imports = data_get($importBc->sortDesc()->toArray(),2);        
        if($imports){
            foreach($imports as $import){
                if($bc = \App\Models\Bc::find(data_get($import, 0))){
                    if(is_integer(data_get($import, 3)))
                    {
                        $bc->id_bc = data_get($import, 3);
                        $bc->save();
                    }
                }
            }
        }     

        $imports = data_get($importBc->sortDesc()->toArray(),3);        
        if($imports){
            foreach($imports as $import){
                if($bc = \App\Models\Bc::find(data_get($import, 0))){
                    if(is_integer(data_get($import, 3)))
                    {
                        $bc->id_bc = data_get($import, 3);
                        $bc->save();
                    }
                }
            }
        }     

        $imports = data_get($importBc->sortDesc()->toArray(),4);        
        if($imports){
            foreach($imports as $import){
                if($bc = \App\Models\Bc::find(data_get($import, 0))){
                    if(is_integer(data_get($import, 3)))
                    {
                        $bc->id_bc = data_get($import, 3);
                        $bc->save();
                    }
                }
            }
        }     

        return back()->withStatus('produtos importados com sucesso.');
    }
}
