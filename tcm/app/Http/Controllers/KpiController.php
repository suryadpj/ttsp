<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data_user = Auth::user();
        if(request()->ajax())
        {
            if($data_user->IDKantor == 1)
            {
                return datatables()->of(DB::table('datakpi')
                ->leftjoin('kantors','kantors.id','=','datakpi.IDKantor')
                ->leftjoin('fields','fields.id','=','datakpi.IDField')
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
        return view('datakpi',['kantor' => $kantor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formkpi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'area.required' => 'area / tujuan disposisi wajib diisi',
            'periode.required' => 'Preiode KPI harap diisi',
            'formkpi.0.required' => 'KPI New Car Sales - AO Report Establishment belum diisi',
            'formkpi.1.required' => 'KPI New Car Sales - Monthly SPK Achievement (vs Target) belum diisi',
            'formkpi.2.required' => 'KPI New Car Sales - Stok Matching Ratio belum diisi',
            'formkpi.3.required' => 'KPI New Car Sales - Monthly Sales Target Achievement belum diisi',
            'formkpi.4.required' => 'KPI New Car Sales - Net Promoter Score (NPS) Sales belum diisi',
            'formkpi.5.required' => 'KPI New Car Sales - Gross Profit/Unit(Vehicle, TCO, F&J Commission) belum diisi',
            'formkpi.6.required' => 'KPI New Car Sales - TCO Installation Ratio belum diisi',
            'formkpi.7.required' => 'KPI New Car Sales - Cash With Insurance belum diisi',
            'formkpi.8.required' => 'KPI New Car Sales - Toyota Insurance Share belum diisi',
            'formkpi.9.required' => 'KPI New Car Sales - Credit Ratio Sales belum diisi',
            'formkpi.10.required' => 'KPI New Car Sales - MSCP belum diisi',
            'formkpi.11.required' => 'KPI New Car Sales - M Quote Utilization Rate belum diisi',
            'formkpi.12.required' => 'KPI New Car Sales - Insurance Renewal belum diisi',
            'formkpi.13.required' => 'KPI Vehicle Deliver - 1st Service Booking Rate belum diisi',
            'formkpi.14.required' => 'KPI Vehicle Deliver - Awareness Rate:T-care, T-intouch, insurance belum diisi',
            'formkpi.15.required' => 'KPI Vehicle Deliver - Survey Customer Interest:T-Care, T-intouch belum diisi',
            'formkpi.16.required' => 'KPI Vehicle Deliver - T-Intouch Activation Rate belum diisi',
            'formkpi.17.required' => 'KPI People Development - Staff Productivity belum diisi',
            'formkpi.18.required' => 'KPI People Development - Salesperson Turn over Ratio belum diisi',
            'formkpi.19.required' => 'KPI Retention - PSP Service - Net Promoter Score (NPS) After Sales belum diisi',
            'formkpi.20.required' => 'KPI Retention - PSP Service - Revenue per Service (Service, parts) belum diisi',
            'formkpi.21.required' => 'KPI Retention - PSP Service - Service Ratio(1st - 7th service) belum diisi',
            'formkpi.22.required' => 'KPI Retention - General Repair (GR) - Next Service Booking Ratio belum diisi',
            'formkpi.23.required' => 'KPI Retention - General Repair (GR) - Up Selling Ratio (TMO) belum diisi',
            'formkpi.24.required' => 'KPI Retention - General Repair (GR) - Cross Selling Ratio belum diisi',
            'formkpi.25.required' => 'KPI Retention - General Repair (GR) - Realitation of Appraisal belum diisi',
            'formkpi.26.required' => 'KPI Retention - General Repair (GR) - Service Lead Time belum diisi',
            'formkpi.27.required' => 'KPI Retention - Body & Paint (BP) - Ontime Delivery Ratio (OTD) belum diisi',
            'formkpi.28.required' => 'KPI Retention - Body & Paint (BP) - Return Job (RTJ) belum diisi',
            'formkpi.29.required' => 'KPI Trade In - Trade In Ratio belum diisi',
            'formkpi.30.required' => 'KPI Trade In - Appraisal Ratio to Prospect belum diisi',
            'formkpi.31.required' => 'KPI Trade In - Deal Ratio to price Offer belum diisi',
            'formkpi.32.required' => 'KPI Customer Database - Single ID (No. of Customer Valid) belum diisi',
            'formkpi.33.required' => 'KPI Customer Database - Database Completeness belum diisi',
            'formkpi.34.required' => 'KPI Customer Database - Database Contact Ratio (as Cust. Journey) belum diisi',
        ];

        $rules = array(
            'periode' => 'required',
            'formkpi.*' => 'required',
        );

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data_user = auth::user();
        $datakpi = $request->formkpi;
        $periode = $request->periode;
        $catatan = $request->catatan;
        $tanggal = date('Y-m-d');
        $format_tanggal = date('F Y', strtotime($tanggal));
        //cek KPI
        $cek = DB::table('datakpi')->where('IDUser',$data_user->id)->where('periode',$periode.'-01')->where('deleted',0)->count();
        if($cek > 0)
        {
            return response()->json(['duplicate' => 'Anda sudah mengisi KPI periode '.$format_tanggal.' sudah anda isi, silahkan cek di data KPI. Terima kasih']);
        }
        for($count = 0; $count < count($datakpi); $count++)
        {
            $nomorkpi = $count + 1;
            $data2 = array(
                'tanggal'   => $tanggal,
                'periode'   => $periode."-01",
                'IDUser'    => $data_user->id,
                'IDField'   => $nomorkpi,
                'IDKantor'  => $data_user->IDKantor,
                'nilai'     => $datakpi[$count],
                'deleted'   => 0,
            );
            $insert_data2[] = $data2;
        }
        DB::table('datakpi')->insert($insert_data2);

        return response()->json(['success' => 'Data KPI berhasil disimpan, silahkan periksa data anda']);
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
        $id = explode('_',$id);
        $data = DB::table('datakpi')->where('periode',$split[0])->where('IDKantor',$split[1])->get();
        $kantor = DB::table('kantors')->orderBy('nama','asc')->get();
        return view('editkpi',['kantor' => $kantor,'data' => $data]);
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
        $split = explode('_',$id);
        DB::table('datakpi')->where('periode',$split[0])->where('IDKantor',$split[1])->update(['deleted' => 1]);
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
}
