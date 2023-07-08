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
    protected $fperiode;

    function __construct($fperiode) {
           $this->periode = $fperiode;
           $this->data = DB::table('fields')
           ->leftjoin('datachecksheet','datachecksheet.id_uniq','fields.id_uniq')
           ->where('periode',$this->periode."-01")
           ->where('kategori',4)
           ->select(
               'fields.nama',
               DB::raw('if(datachecksheet.IDKantor=14,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as a'),
               DB::raw('if(datachecksheet.IDKantor=6,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as b'),
               DB::raw('if(datachecksheet.IDKantor=3,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as c'),
               DB::raw('if(datachecksheet.IDKantor=24,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as d'),
               DB::raw('if(datachecksheet.IDKantor=19,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as e'),
               DB::raw('if(datachecksheet.IDKantor=5,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as f'),
               DB::raw('if(datachecksheet.IDKantor=21,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as g'),
               DB::raw('if(datachecksheet.IDKantor=2,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as h'),
               DB::raw('if(datachecksheet.IDKantor=23,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as i'),
               DB::raw('if(datachecksheet.IDKantor=7,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as j'),
               DB::raw('if(datachecksheet.IDKantor=20,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as k'),
               DB::raw('if(datachecksheet.IDKantor=11,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as l'),
               DB::raw('if(datachecksheet.IDKantor=18,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as m'),
               DB::raw('if(datachecksheet.IDKantor=13,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as n'),
               DB::raw('if(datachecksheet.IDKantor=15,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as o'),
               DB::raw('if(datachecksheet.IDKantor=17,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as p'),
               DB::raw('if(datachecksheet.IDKantor=9,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as q'),
               DB::raw('if(datachecksheet.IDKantor=8,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as r'),
               DB::raw('if(datachecksheet.IDKantor=10,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as s'),
               DB::raw('if(datachecksheet.IDKantor=12,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as t'),
               DB::raw('if(datachecksheet.IDKantor=16,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as u'),
               DB::raw('if(datachecksheet.IDKantor=4,IF(datachecksheet.nilai=1,"O",IF(datachecksheet.nilai=2,"X","-")),"-") as v'),
           )
           ->groupBy('fields.nama','datachecksheet.IDKantor','datachecksheet.nilai');
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:W122')->applyFromArray([
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
