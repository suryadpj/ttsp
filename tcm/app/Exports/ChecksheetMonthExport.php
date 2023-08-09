<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ChecksheetMonthExport implements  FromView, ShouldAutoSize, WithStyles
{
    protected $fperiode, $fweek;

    function __construct($fperiode, $fweek) {
           $this->periode = $fperiode;
           $this->week = $fweek;
           $this->data = DB::table('fields')
           ->leftjoin('datachecksheet','datachecksheet.id_uniq','fields.id_uniq')
           ->where('periode',$this->periode."-01")
           ->where('kategori',4)
           ->where('week',$this->week)
           ->where('deleted',0)
           ->select(
               'fields.nama',
               DB::raw('SUM(IF(IDKantor=14,nilai,0)) as a'),
               DB::raw('SUM(IF(IDKantor=21,nilai,0)) as b'),
               DB::raw('SUM(IF(IDKantor=6,nilai,0)) as c'),
               DB::raw('SUM(IF(IDKantor=3,nilai,0)) as d'),
               DB::raw('SUM(IF(IDKantor=24,nilai,0)) as e'),
               DB::raw('SUM(IF(IDKantor=19,nilai,0)) as f'),
               DB::raw('SUM(IF(IDKantor=5,nilai,0)) as g'),
               DB::raw('SUM(IF(IDKantor=22,nilai,0)) as h'),
               DB::raw('SUM(IF(IDKantor=2,nilai,0)) as i'),
               DB::raw('SUM(IF(IDKantor=23,nilai,0)) as j'),
               DB::raw('SUM(IF(IDKantor=7,nilai,0)) as k'),
               DB::raw('SUM(IF(IDKantor=20,nilai,0)) as l'),
               DB::raw('SUM(IF(IDKantor=11,nilai,0)) as m'),
               DB::raw('SUM(IF(IDKantor=18,nilai,0)) as n'),
               DB::raw('SUM(IF(IDKantor=13,nilai,0)) as o'),
               DB::raw('SUM(IF(IDKantor=15,nilai,0)) as p'),
               DB::raw('SUM(IF(IDKantor=17,nilai,0)) as q'),
               DB::raw('SUM(IF(IDKantor=9,nilai,0)) as r'),
               DB::raw('SUM(IF(IDKantor=8,nilai,0)) as s'),
               DB::raw('SUM(IF(IDKantor=10,nilai,0)) as t'),
               DB::raw('SUM(IF(IDKantor=12,nilai,0)) as u'),
               DB::raw('SUM(IF(IDKantor=16,nilai,0)) as v'),
               DB::raw('SUM(IF(IDKantor=4,nilai,0)) as w'),
           )
           ->groupBy('fields.nama')
           ->orderBy('iddata','asc');
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:X122')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
    }
    public function view(): View
    {
        return view('ChecksheetMonthExcel', [
            'resultdata' => $this->data->get(),
            'fperiodes' => $this->periode
        ]);
    }
}
