<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class KPIExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $fid;

    function __construct($fid) {
           $this->id = $fid;
           $this->resultkpi = DB::table('datakpi_result')->where('id',$this->id);
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:B61')->applyFromArray([
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
        return view('kpiexport', [
            'resultkpi' => $this->resultkpi->first()
        ]);
    }
}
