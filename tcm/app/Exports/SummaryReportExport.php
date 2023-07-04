<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SummaryReportExport implements FromView
{
    public function view(): View
    {
        return view('summaryreportexcel', [
            'datas' => Sembako::all()
        ]);
    }
}
