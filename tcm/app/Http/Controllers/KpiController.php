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
    public function createaftersales()
    {
        return view('formkpiaftersales');
    }
    public function createvehdev()
    {
        return view('formkpitradein');
    }
    public function createsalesv2()
    {
        $daftarkpi1 = DB::table('fields')->where('version',2)->get();
        $daftarkpi = json_encode($daftarkpi1);
        return view('formkpiv2',['daftarkpi' => $daftarkpi]);
    }
    public function createaftersalesv2()
    {
        return view('formkpiaftersalesv2');
    }
    public function createtradeinv2()
    {
        return view('formkpitradeinv2');
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
            'formkpi.*' => 'required',
        );
        if($request->kategori == "1-1")
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
                'formkpi.0.required' => 'KPI Adv Demand & Supply mg - AO Report Establishment belum diisi',
                'formkpi.1.required' => 'KPI Adv Demand & Supply mg - Monthly SPK Achievement (vs Target) belum diisi',
                'formkpi.2.required' => 'KPI Adv Demand & Supply mg - Stok Matching Ratio belum diisi',
                'formkpi.3.required' => 'KPI Adv Demand & Supply mg - Monthly Sales Target Achievement belum diisi',
                'formkpi.4.required' => 'KPI PSP Sales - Net Promoter Score (NPS) Sales belum diisi',
                'formkpi.5.required' => 'KPI PSP Sales - Gross Profit/Unit(Vehicle, TCO, F&J Commission) belum diisi',
                'formkpi.6.required' => 'KPI PSP Sales - TCO Installation Ratio belum diisi',
                'formkpi.7.required' => 'KPI PSP Sales - Cash With Insurance belum diisi',
                'formkpi.8.required' => 'KPI PSP Sales - Toyota Insurance Share belum diisi',
                'formkpi.9.required' => 'KPI PSP Sales - Credit Ratio Sales belum diisi',
                'formkpi.10.required' => 'KPI PSP Sales - MSCP belum diisi',
                'formkpi.11.required' => 'KPI PSP Sales - M Quote Utilization Rate belum diisi',
                'formkpi.12.required' => 'KPI PSP Sales - Insurance Renewal belum diisi',
                'formkpi.13.required' => 'KPI People Development - Staff Productivity belum diisi',
                'formkpi.14.required' => 'KPI People Development - Salesperson Turn over Ratio belum diisi',
                'formkpi.15.required' => 'KPI Trade In - Trade In Ratio belum diisi',
                'formkpi.16.required' => 'KPI Trade In - Appraisal Ratio to Prospect belum diisi',
                'formkpi.17.required' => 'KPI Trade In - Deal Ratio to price Offer belum diisi',
            ];
        }
        elseif($request->kategori == "1-2")
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
                'formkpi.0.required' => 'KPI Vehicle Deliver - 1st Service Booking Rate belum diisi',
                'formkpi.1.required' => 'KPI Vehicle Deliver - Awareness Rate:T-care, T-intouch, insurance belum diisi',
                'formkpi.2.required' => 'KPI Vehicle Deliver - Survey Customer Interest:T-Care, T-intouch belum diisi',
                'formkpi.3.required' => 'KPI Vehicle Deliver - T-Intouch Activation Rate belum diisi',
            ];
        }
        elseif($request->kategori == "1-3")
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
                'formkpi.0.required' => 'KPI Customer Database - Single ID (No. of Customer Valid) belum diisi',
                'formkpi.1.required' => 'KPI Customer Database - Database Completeness belum diisi',
                'formkpi.2.required' => 'KPI Customer Database - Database Contact Ratio (as Cust. Journey) belum diisi',
                'formkpi.3.required' => 'KPI Retention - Net Promoter Score (NPS) After Sales belum diisi',
                'formkpi.4.required' => 'KPI Retention - Revenue per Service (Service, parts) belum diisi',
                'formkpi.5.required' => 'KPI Retention - Service Ratio(1st - 7th service) belum diisi',
                'formkpi.6.required' => 'KPI General Repair (GR) - Next Service Booking Ratio belum diisi',
                'formkpi.7.required' => 'KPI General Repair (GR) - Up Selling Ratio (TMO) belum diisi',
                'formkpi.8.required' => 'KPI General Repair (GR) - Cross Selling Ratio belum diisi',
                'formkpi.9.required' => 'KPI General Repair (GR) - Realitation of Appraisal belum diisi',
                'formkpi.10.required' => 'KPI General Repair (GR) - Service Lead Time belum diisi',
                'formkpi.11.required' => 'KPI Body & Paint (BP) - Ontime Delivery Ratio (OTD) belum diisi',
                'formkpi.12.required' => 'KPI Body & Paint (BP) - Return Job (RTJ) belum diisi',
            ];
        }
        elseif($request->kategori == "2-1")
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
                'formkpi.0.required' => 'Net Promoter Score (NPS) Sales belum diisi',
                'formkpi.1.required' => 'GP Total Sales (per unit) (mio) belum diisi',
                'formkpi.2.required' => 'GP Total Sales Rasio belum diisi',
                'formkpi.3.required' => 'GP Vehicle (per unit) (mio) belum diisi',
                'formkpi.4.required' => 'GP Vehicle Rasio belum diisi',
                'formkpi.5.required' => 'GP TCO (per unit) (mio) belum diisi',
                'formkpi.6.required' => 'GP TCO Rasio belum diisi',
                'formkpi.7.required' => 'F&I Commision (per unit) (mio) belum diisi',
                'formkpi.8.required' => 'Total Revenue per Unit (Vehicle + TCO) (mio) belum diisi',
                'formkpi.9.required' => 'Total Revenue Amount (Vehicle + TCO) (mio) belum diisi',
                'formkpi.10.required' => 'TCO Installation Rasio belum diisi',
                'formkpi.11.required' => 'Toyota Insurance Share belum diisi',
                'formkpi.12.required' => 'Credit Rasio belum diisi',
                'formkpi.13.required' => 'Market Share Credit Portion (MSCP) belum diisi',
                'formkpi.14.required' => 'M-Quote utilization rasio belum diisi',
                'formkpi.15.required' => 'Monthly SPK Achievement (vs Target Rundown) belum diisi',
                'formkpi.16.required' => 'AO Report Establishment belum diisi',
                'formkpi.17.required' => 'Outstanding Matching to target Ratio (on AO25 Achievement) belum diisi',
                'formkpi.18.required' => 'Monthly Sales Target Achievement (Target Operation) belum diisi',
                'formkpi.19.required' => 'Awareness Rate - T-Care belum diisi',
                'formkpi.20.required' => 'Awareness Rate - T-intouch belum diisi',
                'formkpi.21.required' => 'Awareness Rate - Insurance belum diisi',
                'formkpi.22.required' => 'Survey Customer Interest - T-Care belum diisi',
                'formkpi.23.required' => 'Survey Customer Interest - T-Intouch belum diisi',
                'formkpi.24.required' => 'T-Intouch Activation Rate belum diisi',
            ];
        }
        elseif($request->kategori == "2-2")
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
                'formkpi.0.required' => 'Net Promoter Score (NPS) Aftersales GR belum diisi',
                'formkpi.1.required' => 'Net Promoter Score (NPS) Aftersales BP belum diisi',
                'formkpi.2.required' => 'Service Ratio (1st - 7th Service) - 1st Service T-care Lite Rate (LCGC) belum diisi',
                'formkpi.3.required' => 'Service Ratio (1st - 7th Service) - 1st Service T-care Rate (non LCGC) belum diisi',
                'formkpi.4.required' => 'Service Ratio (1st - 7th Service) - PM Rate T-Care Lite 2nd Service (LCGC) belum diisi',
                'formkpi.5.required' => 'Service Ratio (1st - 7th Service) - PM Rate T-Care 2nd-3rd Service (Non LCGC) belum diisi',
                'formkpi.6.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Service per unit (mio) belum diisi',
                'formkpi.7.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Service Ratio belum diisi',
                'formkpi.8.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Parts per unit (mio) belum diisi',
                'formkpi.9.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Parts Ratio belum diisi',
                'formkpi.10.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP Service per Unit (mio) belum diisi',
                'formkpi.11.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP Service Ratio belum diisi',
                'formkpi.12.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP parts per Unit (mio) belum diisi',
                'formkpi.13.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP parts Ratio belum diisi',
                'formkpi.14.required' => 'Total Revenue per Unit (Parts + Service) (mio) belum diisi',
                'formkpi.15.required' => 'Total Revenue Amount (Parts + Service) (mio) belum diisi',
                'formkpi.16.required' => 'Service Lead Time belum diisi',
                'formkpi.17.required' => 'Up Selling ratio (TMO) belum diisi',
                'formkpi.18.required' => 'Cross Selling ratio (include BP) - Battery belum diisi',
                'formkpi.19.required' => 'Cross Selling ratio (include BP) - Car Care belum diisi',
                'formkpi.20.required' => 'Cross Selling ratio (include BP) - Tire belum diisi',
                'formkpi.21.required' => 'Ontime Delivery Ratio (OTD) belum diisi',
                'formkpi.22.required' => 'Return Job (RTJ) belum diisi',
            ];
        }
        elseif($request->kategori == "2-3")
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
                'formkpi.0.required' => 'Trade In Ratiobelum diisi',
                'formkpi.1.required' => 'Staff Productivity - Sales (Unit/salesperson) belum diisi',
                'formkpi.2.required' => 'Staff Productivity - Aftersales (Overall productivity) belum diisi',
                'formkpi.3.required' => 'Salesperson Turn Over Ratio belum diisi',
            ];
        }
        else
        {
            $messages = [
                'required' => ':attribute harus diisi',
                'min' => ':attribute harus diisi minimal :min karakter',
                'max' => ':attribute harus diisi maksimal :max karakter',
                'numeric' => ':attribute harus diisi angka',
                'area.required' => 'area / tujuan disposisi wajib diisi',
                'periode.required' => 'Preiode KPI harap diisi',
            ];
        }

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data_user = auth::user();
        $datakpi = $request->formkpi;
        $periode = $request->periode;
        $catatan = $request->catatan;
        $kategori = explode("-",$request->kategori);
        $tanggal = date('Y-m-d');
        $format_tanggal = date('F Y', strtotime($tanggal));
        //cek KPI
        $cek = DB::table('datakpi')->where('IDUser',$data_user->id)->where('periode',$periode.'-01')->where('deleted',0)->where('version',$kategori['0'])->where('kategori',$kategori['1'])->count();
        if($cek > 0)
        {
            return response()->json(['duplicate' => 'Anda sudah mengisi KPI periode '.$format_tanggal.' ini, silahkan cek di data KPI. Terima kasih']);
        }
        //cek result
        $cek2 = DB::table('datakpi_result')->where('IDUser',$data_user->id)->where('periode',$periode.'-01')->where('deleted',0)->count();
        if($cek2 == 0)
        {
            $create_result = array(
                'IDUser'    => $data_user->id,
                'periode'   => $periode."-01",
            );

            DB::table('datakpi_result')->insert($create_result);
        }

        for($count = 0; $count < count($datakpi); $count++)
        {
            if($kategori['1'] == 1)
            {
                $nomorresult =  $count + 1;
            }
            elseif($kategori['1'] == 2)
            {
                $nomorresult =  $count + 26;
            }
            elseif($kategori['1'] == 3)
            {
                $nomorresult =  $count + 49;
            }
            $nomorkpi = $count + 1;

            $cek_kpi = DB::table('fields')->where('version',2)->where('id_uniq',$kategori['1']."-".$nomorkpi)->select('target')->first();

            if($cek_kpi->target == 0)
            {
                $target = 0;
                $evaluation = 1;
            }
            elseif($cek_kpi->target > $datakpi[$count])
            {
                $target = $cek_kpi->target;
                $evaluation = 0;
            }
            elseif($cek_kpi->target <= $datakpi[$count])
            {
                $target = $cek_kpi->target;
                $evaluation = 1;
            }
            else
            {
                $target = $cek_kpi->target;
                $evaluation = 0;
            }
            $data2 = array(
                'tanggal'   => $tanggal,
                'periode'   => $periode."-01",
                'IDUser'    => $data_user->id,
                'IDField'   => $nomorkpi,
                'IDKantor'  => $data_user->IDKantor,
                'nilai'     => $datakpi[$count],
                'target'    => $target,
                'evaluation'   => 0,
                'deleted'   => 0,
                'version'   => $kategori['0'],
                'kategori'  => $kategori['1'],
                'id_uniq'   => $kategori['1']."-".$nomorkpi,
            );
            $insert_data2[] = $data2;

            $form_data_result = array(
                'kpi'.$nomorresult  =>  $datakpi[$count],
                'target'.$nomorresult        =>  $target,
                'result'.$nomorresult     =>  $evaluation,
            );
            DB::table('datakpi_result')->where('periode',$periode."-01")->where('IDUser',$data_user->id)->update($form_data_result);


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
