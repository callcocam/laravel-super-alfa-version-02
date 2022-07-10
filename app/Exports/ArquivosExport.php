<?php


namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ArquivosExport implements FromView
{

    public function view(): View
    {
        return view('report.exports.fotos', [
            'fotos' => \App\Models\Arquivo::where('type', 'fotos')->where('status', 1)->get()
        ]);
    }
}
