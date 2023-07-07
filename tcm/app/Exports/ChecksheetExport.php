<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ChecksheetExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $fid,$fper;

    function __construct($fid,$fper) {
           $this->id = $fid;
           $this->periode = $fper;
           $this->resultdata = DB::table('fields')->leftjoin('datachecksheet','datachecksheet.id_uniq','fields.id_uniq')->where('periode',$this->periode)->where('IDKantor',$this->id)->select('fields.*',DB::raw('if(datachecksheet.nilai=1,"Sudah Dilakukan",IF(datachecksheet.nilai=2,"Tidak Dilakukan","-")) as nilai'));
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:B122')->applyFromArray([
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
        return view('ChecksheetExport', [
            'resultdata' => $this->resultdata->get()
        ]);
    }
}
