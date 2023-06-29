<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class ChechsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $data_user = Auth::user();
        if(request()->ajax())
        {
            if($data_user->IDKantor == 1)
            {
                return datatables()->of(DB::table('datachecksheet_result')
                ->leftjoin('kantors','kantors.id','=','datachecksheet_result.IDKantor')
                ->select('kantors.nama','datachecksheet_result.*',DB::raw('DATE_FORMAT(datachecksheet_result.periode,"%M %Y") as periodik'))
                ->where('datachecksheet_result.deleted','0'))
                ->filter(function ($data) use ($request) {
                    if (!empty($request->judul)) {
                        $data->where('periode', $request->judul."-01");
                    }

                    if (!empty($request->lokasi)) {
                        $data->where('IDKantor',$request->lokasi);
                    }
                })
                ->addColumn('action', function($data) use($data_user){
                    $button = '<div class="btn-group">';
                        // $button .= '<button type="button" name="edit" id="'.$data->periode.'_'.$data->IDKantor.'" class="edit btn btn-primary btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button>';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                    return $button;})
                    ->editColumn('grade1', function($data)
                    {
                        $skor = $data->grade1;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('grade2', function($data)
                    {
                        $skor = $data->grade2;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('grade3', function($data)
                    {
                        $skor = $data->grade3;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('grade4', function($data)
                    {
                        $skor = $data->grade4;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('grade5', function($data)
                    {
                        $skor = $data->grade5;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('grade6', function($data)
                    {
                        $skor = $data->grade6;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('grade7', function($data)
                    {
                        $skor = $data->grade7;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                    ->editColumn('periodik', function($data)
                    {
                        $week = $data->week;
                        if($week == 0)
                        {
                            return $data->periodik;
                        }
                        else
                        {
                            return "Week ".$data->week." - ".$data->periodik;
                        }
                    })
                    ->addColumn('finalgrade', function($data) use($data_user){
                        $skor = $data->result;
                        switch(true)
                        {
                            case ($skor >= 85) : return "High"; break;
                            case ($skor >= 70) : return "Medium"; break;
                            case ($skor < 70) : return "Low"; break;
                        }
                    })
                ->rawColumns(['action'])
                ->make(true);
            }
            else
            {
                return datatables()->of(DB::table('datachecksheet_result')
                ->leftjoin('users','users.id','=','datachecksheet_result.IDUser')
                ->leftjoin('kantors','kantors.id','=','users.IDKantor')
                ->select('kantors.nama','users.IDKantor','datachecksheet_result.*',DB::raw('DATE_FORMAT(datachecksheet_result.periode,"%M %Y") as periodik'))
                ->where('datachecksheet_result.deleted','0')
                ->where('datakpi.IDKantor',$data_user->IDKantor))
                ->filter(function ($data) use ($request) {
                    if (!empty($request->has('search_periode'))) {
                        $data->where('periode', 'like', $request->get('search_periode')."%");
                    }

                    if (!empty($request->has('search_kantor'))) {
                        $data->where('IDKantor',request->get('nomor'));
                    }
                })
                ->addColumn('action', function($data) use($data_user){
                    $button = '<div class="btn-group">';
                    // $button .= '<button type="button" name="edit" id="'.$data->periode.'_'.$data->IDKantor.'" class="edit btn btn-primary btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button>';
                    $button .= '<button type="button" name="delete" id="'.$data->periode.'_'.$data->IDKantor.'" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                    return $button;})
                ->editColumn('grade1', function($data)
                {
                    $skor = $data->grade1;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->editColumn('grade2', function($data)
                {
                    $skor = $data->grade2;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->editColumn('grade3', function($data)
                {
                    $skor = $data->grade3;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->editColumn('grade4', function($data)
                {
                    $skor = $data->grade4;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->editColumn('grade5', function($data)
                {
                    $skor = $data->grade5;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->editColumn('grade6', function($data)
                {
                    $skor = $data->grade6;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->editColumn('grade7', function($data)
                {
                    $skor = $data->grade7;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->addColumn('finalgrade', function($data) use($data_user){
                    $skor = $data->result;
                    switch(true)
                    {
                        case ($skor >= 85) : return "High"; break;
                        case ($skor >= 70) : return "Medium"; break;
                        case ($skor < 70) : return "Low"; break;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
            }
        }
        if($data_user->IDKantor == 1)
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->get();
        }
        else
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->where('id',$data_user->IDKantor)->get();
        }
        return view('datachecksheet',['kantor' => $kantor]);
    }
    public function datatable(request $request)
    {
        $data_user = Auth::user();
        if($data_user->IDKantor == 1)
        {
            return datatables()->of(DB::table('datachecksheet_result')
            ->leftjoin('users','users.id','=','datachecksheet_result.IDUser')
            ->leftjoin('kantors','kantors.id','=','users.IDKantor')
            ->select('kantors.nama','datachecksheet_result.*',DB::raw('DATE_FORMAT(datachecksheet_result.periode,"%M %Y") as periodik'))
            ->where('datachecksheet_result.deleted','0'))
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
                    // $button .= '<button type="button" name="edit" id="'.$data->periode.'_'.$data->IDKantor.'" class="edit btn btn-primary btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button>';
                    $button .= '<button type="button" name="delete" id="'.$data->periode.'_'.$data->IDKantor.'" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                return $button;})
            ->rawColumns(['action'])
            ->make(true);
        }
        else
        {
            return datatables()->of(DB::table('datachecksheet_result')
            ->leftjoin('users','users.id','=','datachecksheet_result.IDUser')
            ->leftjoin('kantors','kantors.id','=','users.IDKantor')
            ->select('kantors.nama','datachecksheet_result.*',DB::raw('DATE_FORMAT(datachecksheet_result.periode,"%M %Y") as periodik'))
            ->where('datachecksheet_result.deleted','0')
            ->where('datakpi.IDKantor',$data_user->IDKantor))
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
                // $button .= '<button type="button" name="edit" id="'.$data->periode.'_'.$data->IDKantor.'" class="edit btn btn-primary btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button>';
                $button .= '<button type="button" name="delete" id="'.$data->periode.'_'.$data->IDKantor.'" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                return $button;})
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_a = DB::table('fields')->where('IDSegmen',17)->get();
        $data_b = DB::table('fields')->where('IDSegmen',18)->get();
        $data_c = DB::table('fields')->where('IDSegmen',19)->get();
        $data_d = DB::table('fields')->where('IDSegmen',20)->get();
        $data_e = DB::table('fields')->where('IDSegmen',21)->get();
        $data_f = DB::table('fields')->where('IDSegmen',22)->get();
        $data_g = DB::table('fields')->where('IDSegmen',23)->get();
        $data_h = DB::table('fields')->where('IDSegmen',24)->get();
        $data_i = DB::table('fields')->where('IDSegmen',25)->get();
        $data_j = DB::table('fields')->where('IDSegmen',26)->get();
        $data_k = DB::table('fields')->where('IDSegmen',27)->get();
        $data_l = DB::table('fields')->where('IDSegmen',28)->get();
        $data_m = DB::table('fields')->where('IDSegmen',29)->get();
        $data_n = DB::table('fields')->where('IDSegmen',30)->get();
        $data_o = DB::table('fields')->where('IDSegmen',31)->get();
        $data_p = DB::table('fields')->where('IDSegmen',32)->get();
        $data_q = DB::table('fields')->where('IDSegmen',33)->get();
        $data_r = DB::table('fields')->where('IDSegmen',34)->get();

        return view('checksheet',[
            'data_a' => $data_a,
            'data_b' => $data_b,
            'data_c' => $data_c,
            'data_d' => $data_d,
            'data_e' => $data_e,
            'data_f' => $data_f,
            'data_g' => $data_g,
            'data_h' => $data_h,
            'data_i' => $data_i,
            'data_j' => $data_j,
            'data_k' => $data_k,
            'data_l' => $data_l,
            'data_m' => $data_m,
            'data_n' => $data_n,
            'data_o' => $data_o,
            'data_p' => $data_p,
            'data_q' => $data_q,
            'data_r' => $data_r,
        ]);
    }
    public function createmingguan()
    {
        $data_a = DB::table('fields')->where('IDSegmen',17)->get();
        $data_b = DB::table('fields')->where('IDSegmen',18)->get();
        $data_c = DB::table('fields')->where('IDSegmen',19)->get();
        $data_d = DB::table('fields')->where('IDSegmen',20)->get();
        $data_e = DB::table('fields')->where('IDSegmen',21)->get();
        $data_f = DB::table('fields')->where('IDSegmen',22)->get();
        $data_g = DB::table('fields')->where('IDSegmen',23)->get();
        $data_h = DB::table('fields')->where('IDSegmen',24)->get();
        $data_i = DB::table('fields')->where('IDSegmen',25)->get();
        $data_j = DB::table('fields')->where('IDSegmen',26)->get();
        $data_k = DB::table('fields')->where('IDSegmen',27)->get();
        $data_l = DB::table('fields')->where('IDSegmen',28)->get();
        $data_m = DB::table('fields')->where('IDSegmen',29)->get();
        $data_n = DB::table('fields')->where('IDSegmen',30)->get();
        $data_o = DB::table('fields')->where('IDSegmen',31)->get();
        $data_p = DB::table('fields')->where('IDSegmen',32)->get();
        $data_q = DB::table('fields')->where('IDSegmen',33)->get();
        $data_r = DB::table('fields')->where('IDSegmen',34)->get();

        return view('checksheetmingguan',[
            'data_a' => $data_a,
            'data_b' => $data_b,
            'data_c' => $data_c,
            'data_d' => $data_d,
            'data_e' => $data_e,
            'data_f' => $data_f,
            'data_g' => $data_g,
            'data_h' => $data_h,
            'data_i' => $data_i,
            'data_j' => $data_j,
            'data_k' => $data_k,
            'data_l' => $data_l,
            'data_m' => $data_m,
            'data_n' => $data_n,
            'data_o' => $data_o,
            'data_p' => $data_p,
            'data_q' => $data_q,
            'data_r' => $data_r,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //define kategori


        $rules = array(
            'kategori' => 'required',
            'periode' => 'required',
            'checksheet.1' => 'required',
            'checksheet.2' => 'required',
            'checksheet.3' => 'required',
            'checksheet.4' => 'required',
            'checksheet.5' => 'required',
            'checksheet.6' => 'required',
            'checksheet.7' => 'required',
            'checksheet.8' => 'required',
            'checksheet.9' => 'required',
            'checksheet.10' => 'required',
            'checksheet.11' => 'required',
            'checksheet.12' => 'required',
            'checksheet.13' => 'required',
            'checksheet.14' => 'required',
            'checksheet.15' => 'required',
            'checksheet.16' => 'required',
            'checksheet.17' => 'required',
            'checksheet.18' => 'required',
            'checksheet.19' => 'required',
            'checksheet.20' => 'required',
            'checksheet.20' => 'required',
            'checksheet.21' => 'required',
            'checksheet.22' => 'required',
            'checksheet.23' => 'required',
            'checksheet.24' => 'required',
            'checksheet.25' => 'required',
            'checksheet.26' => 'required',
            'checksheet.27' => 'required',
            'checksheet.28' => 'required',
            'checksheet.29' => 'required',
            'checksheet.30' => 'required',
            'checksheet.31' => 'required',
            'checksheet.32' => 'required',
            'checksheet.33' => 'required',
            'checksheet.34' => 'required',
            'checksheet.35' => 'required',
            'checksheet.36' => 'required',
            'checksheet.37' => 'required',
            'checksheet.38' => 'required',
            'checksheet.39' => 'required',
            'checksheet.40' => 'required',
            'checksheet.41' => 'required',
            'checksheet.42' => 'required',
            'checksheet.43' => 'required',
            'checksheet.44' => 'required',
            'checksheet.45' => 'required',
            'checksheet.46' => 'required',
            'checksheet.47' => 'required',
            'checksheet.48' => 'required',
            'checksheet.49' => 'required',
            'checksheet.50' => 'required',
            'checksheet.51' => 'required',
            'checksheet.52' => 'required',
            'checksheet.53' => 'required',
            'checksheet.54' => 'required',
            'checksheet.55' => 'required',
            'checksheet.56' => 'required',
            'checksheet.57' => 'required',
            'checksheet.58' => 'required',
            'checksheet.59' => 'required',
            'checksheet.60' => 'required',
            'checksheet.61' => 'required',
            'checksheet.62' => 'required',
            'checksheet.63' => 'required',
            'checksheet.64' => 'required',
            'checksheet.65' => 'required',
            'checksheet.66' => 'required',
            'checksheet.67' => 'required',
            'checksheet.68' => 'required',
            'checksheet.69' => 'required',
            'checksheet.70' => 'required',
            'checksheet.71' => 'required',
            'checksheet.72' => 'required',
            'checksheet.73' => 'required',
            'checksheet.74' => 'required',
            'checksheet.75' => 'required',
            'checksheet.76' => 'required',
            'checksheet.77' => 'required',
            'checksheet.78' => 'required',
            'checksheet.79' => 'required',
            'checksheet.80' => 'required',
            'checksheet.81' => 'required',
            'checksheet.82' => 'required',
            'checksheet.83' => 'required',
            'checksheet.84' => 'required',
            'checksheet.85' => 'required',
            'checksheet.86' => 'required',
            'checksheet.87' => 'required',
            'checksheet.88' => 'required',
            'checksheet.89' => 'required',
            'checksheet.90' => 'required',
            'checksheet.91' => 'required',
            'checksheet.92' => 'required',
            'checksheet.93' => 'required',
            'checksheet.94' => 'required',
            'checksheet.95' => 'required',
            'checksheet.96' => 'required',
            'checksheet.97' => 'required',
            'checksheet.98' => 'required',
            'checksheet.99' => 'required',
            'checksheet.90' => 'required',
            'checksheet.91' => 'required',
            'checksheet.92' => 'required',
            'checksheet.93' => 'required',
            'checksheet.94' => 'required',
            'checksheet.95' => 'required',
            'checksheet.96' => 'required',
            'checksheet.97' => 'required',
            'checksheet.98' => 'required',
            'checksheet.99' => 'required',
            'checksheet.100' => 'required',
            'checksheet.101' => 'required',
            'checksheet.102' => 'required',
            'checksheet.103' => 'required',
            'checksheet.104' => 'required',
            'checksheet.105' => 'required',
            'checksheet.106' => 'required',
            'checksheet.107' => 'required',
            'checksheet.108' => 'required',
            'checksheet.109' => 'required',
            'checksheet.110' => 'required',
            'checksheet.111' => 'required',
            'checksheet.112' => 'required',
            'checksheet.113' => 'required',
            'checksheet.114' => 'required',
            'checksheet.115' => 'required',
            'checksheet.116' => 'required',
            'checksheet.117' => 'required',
            'checksheet.118' => 'required',
            'checksheet.119' => 'required',
            'checksheet.120' => 'required',
            'checksheet.121' => 'required',
        );

        if($request->kategori =="week")
        {

            $rules = array_merge($rules, [
                'week' => 'required',
            ]);
        }

        $messages = [
            'required' => ':attribute belum diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'area.required' => 'area / tujuan disposisi wajib diisi',
            'week.required' => 'Periode Minggu Checksheet belum anda pilih',
            'periode.required' => 'Preiode KPI harap diisi',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data_user = auth::user();
        $datakpi = $request->checksheet;
        $periode = $request->periode;
        $catatan = $request->catatan;
        $kategori = $request->kategori;
        $tanggal = date('Y-m-d');
        $format_tanggal = date('F Y', strtotime($tanggal));
        if($request->kategori =="week")
        {
            $kat = $request->week;
        }
        elseif($request->kategori =="month")
        {
            $kat = 0;
        }
        //cek KPI
        $cek = DB::table('datachecksheet')->where('IDUser',$data_user->id)->where('periode',$periode.'-01')->where('week',$kat)->count();
        if($cek > 0)
        {
            return response()->json(['duplicate' => 'Anda sudah mengisi Checksheet periode '.$format_tanggal.' ini, silahkan cek di data Checksheet. Terima kasih']);
        }
        for($count = 0; $count < count($datakpi); $count++)
        {
            $nomorkpi = $count+1;
            $data2 = array(
                'tanggal'   => $tanggal,
                'periode'   => $periode."-01",
                'IDUser'    => $data_user->id,
                'IDField'   => $nomorkpi,
                'IDKantor'  => $data_user->IDKantor,
                'nilai'     => $datakpi[$nomorkpi],
                'deleted'   => 0,
                'id_uniq'   => "4-".$nomorkpi,
            );

            if($request->kategori =="week")
            {

                $data2 = array_merge($data2, [
                    'week' => $request->week,
                ]);
            }
            $insert_data2[] = $data2;
        }
        DB::table('datachecksheet')->insert($insert_data2);

        $a1 = DB::table('datachecksheet')->wherebetween('IDField',[1,14])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/14)*100,0) AS skor'))->first();
        $a2 = DB::table('datachecksheet')->wherebetween('IDField',[15,18])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/4)*100,0) AS skor'))->first();
        $a = DB::table('datachecksheet')->wherebetween('IDField',[1,18])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/18)*100,0) AS skor'))->first();
        $b1 = DB::table('datachecksheet')->wherebetween('IDField',[19,34])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/16)*100,0) AS skor'))->first();
        $b2 = DB::table('datachecksheet')->wherebetween('IDField',[35,37])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/3)*100,0) AS skor'))->first();
        $b = DB::table('datachecksheet')->wherebetween('IDField',[19,37])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/19)*100,0) AS skor'))->first();
        $c1 = DB::table('datachecksheet')->wherebetween('IDField',[38,43])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/6)*100,0) AS skor'))->first();
        $c2 = DB::table('datachecksheet')->wherebetween('IDField',[44,69])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/26)*100,0) AS skor'))->first();
        $c3 = DB::table('datachecksheet')->wherebetween('IDField',[70,76])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/7)*100,0) AS skor'))->first();
        $c4 = DB::table('datachecksheet')->wherebetween('IDField',[77,82])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/6)*100,0) AS skor'))->first();
        $c = DB::table('datachecksheet')->wherebetween('IDField',[38,82])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/45)*100,0) AS skor'))->first();
        $d1 = DB::table('datachecksheet')->wherebetween('IDField',[83,85])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/3)*100,0) AS skor'))->first();
        $d2 = DB::table('datachecksheet')->wherebetween('IDField',[86,96])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/11)*100,0) AS skor'))->first();
        $d3 = DB::table('datachecksheet')->wherebetween('IDField',[97,100])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/4)*100,0) AS skor'))->first();
        $d = DB::table('datachecksheet')->wherebetween('IDField',[83,100])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/18)*100,0) AS skor'))->first();
        $e1 = DB::table('datachecksheet')->wherebetween('IDField',[101,103])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/3)*100,0) AS skor'))->first();
        $e2 = DB::table('datachecksheet')->wherebetween('IDField',[104,108])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/5)*100,0) AS skor'))->first();
        $e = DB::table('datachecksheet')->wherebetween('IDField',[101,108])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/8)*100,0) AS skor'))->first();
        $f1 = DB::table('datachecksheet')->wherebetween('IDField',[109,110])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/2)*100,0) AS skor'))->first();
        $f2 = DB::table('datachecksheet')->wherebetween('IDField',[111,113])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/3)*100,0) AS skor'))->first();
        $f3 = DB::table('datachecksheet')->wherebetween('IDField',[114,115])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/2)*100,0) AS skor'))->first();
        $f = DB::table('datachecksheet')->wherebetween('IDField',[109,115])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/7)*100,0) AS skor'))->first();
        $g1 = DB::table('datachecksheet')->wherebetween('IDField',[116,118])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/3)*100,0) AS skor'))->first();
        $g2 = DB::table('datachecksheet')->wherebetween('IDField',[119,121])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/3)*100,0) AS skor'))->first();
        $g = DB::table('datachecksheet')->wherebetween('IDField',[116,121])->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/6)*100,0) AS skor'))->first();
        $all = DB::table('datachecksheet')->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/121)*100,0) AS skor'))->first();

        $data_result = array(
            'periode'   => $periode."-01",
            'IDUser'    => $data_user->id,
            'IDKantor'    => $data_user->IDKantor,
            'week'    => $kat,
            'result1'   => $a1->skor,
            'result2'   => $a2->skor,
            'grade1'    => $a->skor,
            'result3'   => $b1->skor,
            'result4'   => $b2->skor,
            'grade2'    => $b->skor,
            'result5'   => $c1->skor,
            'result6'   => $c2->skor,
            'result7'   => $c3->skor,
            'result8'   => $c4->skor,
            'grade3'    => $c->skor,
            'result9'   => $d1->skor,
            'result10'   => $d2->skor,
            'result11'   => $d3->skor,
            'grade4'   => $d->skor,
            'result12'   => $e1->skor,
            'result13'   => $e2->skor,
            'grade5'   => $e->skor,
            'result14'   => $f1->skor,
            'result15'   => $f2->skor,
            'result16'   => $f3->skor,
            'grade6'   => $f->skor,
            'result17'   => $g1->skor,
            'result18'   => $g2->skor,
            'grade7'   => $g->skor,
            'result'    => $all->skor,
            'deleted'   => 0,
        );
        if($request->kategori =="week")
        {

            $data_result = array_merge($data_result, [
                'week' => $request->week,
            ]);
        }
        DB::table('datachecksheet_result')->insert($data_result);

        return response()->json(['success' => 'Data Checksheet berhasil disimpan, silahkan periksa data anda']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('datachecksheet_result')->where('id',$id)->update(['deleted' => 1]);
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
