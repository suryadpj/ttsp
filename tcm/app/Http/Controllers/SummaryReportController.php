<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class SummaryReportController extends Controller
{
    public function index()
    {
        $data_user = Auth::user();
        if(request()->ajax())
        {
            if($data_user->IDKantor == 1)
            {
                return datatables()->of(DB::table('datakpi')
                ->leftjoin('kantors','kantors.id','=','datakpi.IDKantor')
                ->leftjoin('fields','fields.id_uniq','=','datakpi.id_uniq')
                ->select('kantors.nama','datakpi.IDKantor','datakpi.periode',DB::raw('DATE_FORMAT(datakpi.periode,"%M %Y") as periodik'),DB::raw('SUM(IF(fields.IDSegmen=1,datakpi.nilai,0)) as nilai_a'),DB::raw('SUM(IF(fields.IDSegmen=2,datakpi.nilai,0)) as nilai_b'),DB::raw('SUM(IF(fields.IDSegmen=3,datakpi.nilai,0)) as nilai_c'),DB::raw('SUM(IF(fields.IDSegmen=4,datakpi.nilai,0)) as nilai_d'),DB::raw('SUM(IF(fields.IDSegmen=5,datakpi.nilai,0)) as nilai_e'),DB::raw('SUM(IF(fields.IDSegmen=6,datakpi.nilai,0)) as nilai_f'),DB::raw('SUM(datakpi.nilai) as total'))
                ->where('datakpi.deleted','0')
                ->groupby('kantors.nama','datakpi.IDKantor','periodik','periode'))
                // ->filter(function ($data) use ($request) {
                //     if (!empty($request->has('judul'))) {
                //         $data->where('perihal', 'like', "%{$request->get('judul')}%");
                //     }

                //     if (!empty($request->has('nomor'))) {
                //         $data->where('nota_dinas', 'like', "%{$request->get('nomor')}%");
                //     }
                //     if (!empty($request->has('nilainya'))) {
                //         $data->where('nilai', 'like', "%{$request->get('nilainya')}%");
                //     }
                //     if (!empty($request->has('periode'))) {
                //         $data->where('periode_penggunaan', 'like', "{$request->get('periode')}%");
                //     }
                //     if (!empty($request->has('kategori'))) {
                //         $data->where('kategori', 'like', "{$request->get('kategori')}%");
                //     }
                //     if (!empty($request->lokasi)) {
                //         $data->where('data_cost_control.IDArea', 'like', "{$request->get('lokasi')}");
                //     }

                //     // if (!empty($request->area)) {
                //     //     $data->where('IDArea', 'like', "%{$request->area}%");
                //     // }

                //     if(!empty($request->tanggal_a))
                //     {
                //         if($request->tanggal_a === $request->tanggal_b || empty($request->tanggal_b)){
                //             $data->whereDate('tanggal_pengajuan','=', $request->tanggal_a)->get();
                //         }else{
                //             //kita filter dari tanggal awal ke akhir
                //             $data->whereBetween('tanggal_pengajuan', array($request->tanggal_a, $request->tanggal_b))->get();
                //         }
                //     }
                // })
                ->addColumn('action', function($data) use($data_user){
                    $button = '<div class="btn-group">';
                        $button .= '<button type="button" name="edit" id="'.$data->periode.'_'.$data->IDKantor.'" class="edit btn btn-primary btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button>';
                        $button .= '<button type="button" name="delete" id="'.$data->periode.'_'.$data->IDKantor.'" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                    return $button;})
                ->rawColumns(['action'])
                ->make(true);
            }
            else
            {
                return datatables()->of(DB::table('datakpi')
                ->leftjoin('kantors','kantors.id','=','datakpi.IDKantor')
                ->leftjoin('fields','fields.id','=','datakpi.IDField')
                ->select('kantors.nama','datakpi.IDKantor','datakpi.periode',DB::raw('DATE_FORMAT(datakpi.periode,"%M %Y") as periodik'),DB::raw('SUM(IF(fields.IDSegmen=1,datakpi.nilai,0)) as nilai_a'),DB::raw('SUM(IF(fields.IDSegmen=2,datakpi.nilai,0)) as nilai_b'),DB::raw('SUM(IF(fields.IDSegmen=3,datakpi.nilai,0)) as nilai_c'),DB::raw('SUM(IF(fields.IDSegmen=4,datakpi.nilai,0)) as nilai_d'),DB::raw('SUM(IF(fields.IDSegmen=5,datakpi.nilai,0)) as nilai_e'),DB::raw('SUM(IF(fields.IDSegmen=6,datakpi.nilai,0)) as nilai_f'),DB::raw('SUM(datakpi.nilai) as total'))
                ->where('datakpi.deleted','0')
                ->where('datakpi.IDKantor',$data_user->IDKantor)
                ->groupby('kantors.nama','datakpi.IDKantor','periodik','periode'))
                // ->filter(function ($data) use ($request) {
                //     if (!empty($request->has('judul'))) {
                //         $data->where('perihal', 'like', "%{$request->get('judul')}%");
                //     }

                //     if (!empty($request->has('nomor'))) {
                //         $data->where('nota_dinas', 'like', "%{$request->get('nomor')}%");
                //     }
                //     if (!empty($request->has('nilainya'))) {
                //         $data->where('nilai', 'like', "%{$request->get('nilainya')}%");
                //     }
                //     if (!empty($request->has('periode'))) {
                //         $data->where('periode_penggunaan', 'like', "{$request->get('periode')}%");
                //     }
                //     if (!empty($request->has('kategori'))) {
                //         $data->where('kategori', 'like', "{$request->get('kategori')}%");
                //     }
                //     if (!empty($request->lokasi)) {
                //         $data->where('data_cost_control.IDArea', 'like', "{$request->get('lokasi')}");
                //     }

                //     // if (!empty($request->area)) {
                //     //     $data->where('IDArea', 'like', "%{$request->area}%");
                //     // }

                //     if(!empty($request->tanggal_a))
                //     {
                //         if($request->tanggal_a === $request->tanggal_b || empty($request->tanggal_b)){
                //             $data->whereDate('tanggal_pengajuan','=', $request->tanggal_a)->get();
                //         }else{
                //             //kita filter dari tanggal awal ke akhir
                //             $data->whereBetween('tanggal_pengajuan', array($request->tanggal_a, $request->tanggal_b))->get();
                //         }
                //     }
                // })
                ->addColumn('action', function($data) use($data_user){
                    $button = '<div class="btn-group">';
                    $button .= '<button type="button" name="edit" id="'.$data->periode.'_'.$data->IDKantor.'" class="edit btn btn-primary btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button>';
                    $button .= '<button type="button" name="delete" id="'.$data->periode.'_'.$data->IDKantor.'" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                    return $button;})
                ->rawColumns(['action'])
                ->make(true);
            }
        }
        $kantor = DB::table('kantors')->orderBy('nama','asc')->get();
        return view('summaryreport',['kantor' => $kantor]);
    }
}
