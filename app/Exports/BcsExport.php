<?php


namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BcsExport implements FromView
{

    public function view(): View
    {
        return view('report.exports.bc', [
            'bcs' => \App\Models\Bc::where('status', 'published')->get()
        ]);
    }
}
