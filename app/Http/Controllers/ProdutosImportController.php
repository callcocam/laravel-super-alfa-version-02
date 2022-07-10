<?php

namespace App\Http\Controllers;

use App\Imports\ProdutosImport;
use Illuminate\Http\Request;

class ProdutosImportController extends Controller
{
    public function show()
    {
        return view('produtosimport');
    }


    public function store(Request $request)
    {
        $file = $request->file('file')->store('import');

        $import = new ProdutosImport();
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('produtos importados com sucesso.');
    }
}
