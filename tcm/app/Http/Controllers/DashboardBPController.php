<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class DashboardBPController extends Controller
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
    public function index(request $request)
    {
        $data_user = Auth::user();
        if($data_user->IDKantor == 1)
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->get();
        }
        else
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->where('id',$data_user->IDKantor)->get();
        }
        $fkantor = $request->search_kantor;
        $fproses = $request->proses;
        $report = 0;
        if($fproses)
        {
            if($fkantor == "")
            {
                return redirect()->back()->withInput(array('kantorempty' => '1', 'success' => 'Cabang belum dipilih'));
            }
            $report = 1;
            $kpiresult = DB::table('datakpi_result as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->first();
            if(!$kpiresult)
            {
                $kpiresult = DB::table('datakpi_result as b')->where('b.deleted',0)->first();
            }
            $summary = DB::table('datakpi as a')->where('a.IDKantor',$fkantor)->where('a.deleted',0)->whereIn('id_uniq',['2-8','2-10','2-12','2-14','2-19','2-20','2-21','2-21','2-22','2-23'])->select(DB::raw("SUM(IF(a.periode='2023-01-01',a.evaluation,0)) AS achieve1"),DB::raw("SUM(IF(a.periode='2023-01-01',a.berkembang,0)) AS growth1"),DB::raw("SUM(IF(a.periode='2023-02-01',a.evaluation,0)) AS achieve2"),DB::raw("SUM(IF(a.periode='2023-02-01',a.berkembang,0)) AS growth2"),DB::raw("SUM(IF(a.periode='2023-03-01',a.evaluation,0)) AS achieve3"),DB::raw("SUM(IF(a.periode='2023-03-01',a.berkembang,0)) AS growth3"),DB::raw("SUM(IF(a.periode='2023-04-01',a.evaluation,0)) AS achieve4"),DB::raw("SUM(IF(a.periode='2023-04-01',a.berkembang,0)) AS growth4"),DB::raw("SUM(IF(a.periode='2023-05-01',a.evaluation,0)) AS achieve5"),DB::raw("SUM(IF(a.periode='2023-05-01',a.berkembang,0)) AS growth5"),DB::raw("SUM(IF(a.periode='2023-06-01',a.evaluation,0)) AS achieve6"),DB::raw("SUM(IF(a.periode='2023-06-01',a.berkembang,0)) AS growth6"),DB::raw("SUM(IF(a.periode='2023-07-01',a.evaluation,0)) AS achieve7"),DB::raw("SUM(IF(a.periode='2023-07-01',a.berkembang,0)) AS growth7"),DB::raw("SUM(IF(a.periode='2023-08-01',a.evaluation,0)) AS achieve8"),DB::raw("SUM(IF(a.periode='2023-08-01',a.berkembang,0)) AS growth8"),DB::raw("SUM(IF(a.periode='2023-09-01',a.evaluation,0)) AS achieve9"),DB::raw("SUM(IF(a.periode='2023-09-01',a.berkembang,0)) AS growth9"),DB::raw("SUM(IF(a.periode='2023-10-01',a.evaluation,0)) AS achieve10"),DB::raw("SUM(IF(a.periode='2023-10-01',a.berkembang,0)) AS growth10"),DB::raw("SUM(IF(a.periode='2023-11-01',a.evaluation,0)) AS achieve11"),DB::raw("SUM(IF(a.periode='2023-11-01',a.berkembang,0)) AS growth11"),DB::raw("SUM(IF(a.periode='2023-12-01',a.evaluation,0)) AS achieve12"),DB::raw("SUM(IF(a.periode='2023-12-01',a.berkembang,0)) AS growth12"))->first();
            $chartnps = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps1'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps2'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps3'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps4'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps5'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps6'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps7'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps8'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps9'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps10'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps11'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-2",b.nilai,0),0)) AS nps12'))->first();
            $chartbisnis1a = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a1'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a2'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a3'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a4'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a5'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a6'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a7'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a8'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a9'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a10'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a11'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-15",b.nilai,0),0)) AS c2a12'))->first();
            $chartbisnis1b = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b1'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b2'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b3'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b4'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b5'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b6'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b7'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b8'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b9'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b10'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b11'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-16",b.nilai,0),0)) AS c2b12'))->first();
            $chart4 = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c41'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c42'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c43'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c44'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c45'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c46'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c47'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c48'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c49'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c410'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c411'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-22",b.nilai,0),0)) AS c412'))->first();
            $chart5 = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c41'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c42'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c43'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c44'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c45'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c46'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c47'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c48'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c49'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c410'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c411'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-23",b.nilai,0),0)) AS c412'))->first();
            $chart15 = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c41'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c42'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c43'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c44'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c45'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c46'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c47'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c48'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c49'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c410'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c411'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-19",b.nilai,0),0)) AS c412'))->first();
            $chart16 = DB::table('datakpi as b')->where('b.IDKantor',$fkantor)->where('b.deleted',0)->select(DB::raw('SUM(IF(b.periode="2023-01-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c41'),DB::raw('SUM(IF(b.periode="2023-02-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c42'),DB::raw('SUM(IF(b.periode="2023-03-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c43'),DB::raw('SUM(IF(b.periode="2023-04-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c44'),DB::raw('SUM(IF(b.periode="2023-05-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c45'),DB::raw('SUM(IF(b.periode="2023-06-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c46'),DB::raw('SUM(IF(b.periode="2023-07-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c47'),DB::raw('SUM(IF(b.periode="2023-08-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c48'),DB::raw('SUM(IF(b.periode="2023-09-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c49'),DB::raw('SUM(IF(b.periode="2023-10-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c410'),DB::raw('SUM(IF(b.periode="2023-11-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c411'),DB::raw('SUM(IF(b.periode="2023-12-01",IF(b.id_uniq="2-21",b.nilai,0),0)) AS c412'))->first();
            return view('homebpfix',[
                'kantor' => $kantor,
                'fkantor' => $fkantor,
                'report' => $report,
                'data1' => $summary,
                'data2' => $chartnps,
                'data3' => $chartbisnis1a,
                'data4' => $chartbisnis1b,
                'data44' => $chart4,
                'data5' => $chart5,
                'data15' => $chart15,
                'data16' => $chart16,
                'kpires' => $kpiresult
            ]);
        }
        else
        {
            return view('homebpfix',['kantor' => $kantor, 'fkantor' => $fkantor,'report' => $report]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
