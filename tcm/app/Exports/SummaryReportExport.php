<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SummaryReportExport implements FromView, ShouldAutoSize
{
    protected $fperiode,$fkantor;

    function __construct($fperiode,$fkantor) {
           $this->fperiode = $fperiode;
           $this->fkantor = $fkantor;
           $this->resultkpi = DB::table('datakpi_result')->where('periode',$this->fperiode."-01")->where('IDKantor',$this->fkantor);
           $this->resultcheck = DB::table('datachecksheet_result')->where('periode',$this->fperiode."-01")->where('IDKantor',$this->fkantor);
           $this->summary = DB::table('summaryreport')->where('IDKantor',$this->fkantor)->where('periode',$this->fperiode.'-01');
    }
    public function view(): View
    {
        return view('summaryreportexcel', [
            'summary' => $this->summary->first(),
            'resultkpi' => $this->resultkpi->first(),
            'resultcheck' => $this->resultcheck->first()
        ]);
    }
}
