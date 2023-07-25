<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date('Y-m-')."01";
        $kantor = DB::table('kantors')->orderBy('nama','asc')->count();
        $hitunginput = DB::table('datakpi_result')->select('IDKantor',DB::raw('count(IDKantor) as input'))->GroupBy('IDKantor')->get();

        $kantor_data = DB::table('datasummary')->leftjoin('kantors','kantors.id','datasummary.IDKantor')->orderBy('nama','asc')->orderby('periode','asc')->select('*',DB::raw('DATE_FORMAT(periode,"%M %Y") as bulan'))->get();
        // $kantor_data = DB::table('kantors')->leftjoin('users','users.IDKantor','kantors.id')->leftjoin('datachecksheet_result','datachecksheet_result.IDUser','users.id')->leftjoin('datakpi_result','datakpi_result.IDUser','users.id')->where('datachecksheet_result.week',0)->select('nama','datachecksheet_result.result as hasilnya','datakpi_result.*')->orderBy('nama','asc')-->get();
        $chart_input = DB::table('datakpi_result as a')->whereyear('periode',date('Y'))->where('deleted',0)->select(DB::raw('ROUND((SUM(IF(a.periode="2023-01-01",1,0))/23)*100) AS jan'),DB::raw('ROUND((SUM(IF(a.periode="2023-02-01",1,0))/23)*100) AS feb'),DB::raw('ROUND((SUM(IF(a.periode="2023-03-01",1,0))/23)*100) AS mar'),DB::raw('ROUND((SUM(IF(a.periode="2023-04-01",1,0))/23)*100) AS apr'),DB::raw('ROUND((SUM(IF(a.periode="2023-05-01",1,0))/23)*100) AS mei'),DB::raw('ROUND((SUM(IF(a.periode="2023-06-01",1,0))/23)*100) AS jun'),DB::raw('ROUND((SUM(IF(a.periode="2023-07-01",1,0))/23)*100) AS jul'),DB::raw('ROUND((SUM(IF(a.periode="2023-08-01",1,0))/23)*100) AS aug'),DB::raw('ROUND((SUM(IF(a.periode="2023-09-01",1,0))/23)*100) AS sep'),DB::raw('ROUND((SUM(IF(a.periode="2023-10-01",1,0))/23)*100) AS okt'),DB::raw('ROUND((SUM(IF(a.periode="2023-11-01",1,0))/23)*100) AS nov'),DB::raw('ROUND((SUM(IF(a.periode="2023-12-01",1,0))/23)*100) AS des'))->first();
        // $kantor_data = DB::table('kantors')->leftjoin('users','users.IDKantor','kantors.id')->leftjoin('datachecksheet_result','datachecksheet_result.IDUser','users.id')->leftjoin('datakpi_result','datakpi_result.IDUser','users.id')->where('datachecksheet_result.periode',$date)->where('datachecksheet_result.week',0)->where('datakpi_result.periode',$date)->select('nama','datachecksheet_result.result as hasilnya','datakpi_result.*')->orderBy('nama','asc')->get();
        return view('home',['kantor' => $kantor,'datakantor' => $kantor_data,'hitunginput' => $hitunginput,'chartinput' => $chart_input]);
    }
    public function homesales()
    {
        return view('homesales');
    }
    public function homegr()
    {
        return view('homegr');
    }
    public function homebp()
    {
        return view('homebp');
    }

    public function formkpi()
    {
        return view('formkpi');
    }
    public function formkpiupload()
    {
        return view('formkpiupload');
    }
    public function kpireport()
    {
        return view('kpireport');
    }

    public function settlesummary($idcabang,$periode)
    {
        $data_user = auth::user();
        //get data KPI
        $ha = DB::table('datakpi_result')->where('periode',$periode)->where('IDKantor',$idcabang)->count();
        if($ha == 0)
        {
            $error = 1;
            $kpiproses = 0;
        }
        else
        {
            $error = 1;
            $a = DB::table('datakpi_result')->where('periode',$periode)->where('IDKantor',$idcabang)->first();
            $evaluation1 = $a->result1;
            if($a->result3+$a->result5+$a->result7 >= 2)
            {
                $evaluation2 = "O";
                $evaluationshow2 = 1;
            }
            else {
                $evaluation2 = "X";
                $evaluationshow2 = 0;
            }
            $evaluation13 = $a->result25;
            if($a->result20+$a->result21+$a->result22 >= 2)
            {
                $evaluation14 = "O";
                $evaluationshow14 = 1;
            }
            else {
                $evaluation14 = "X";
                $evaluationshow14 = 0;
            }
            if($a->result26+$a->result27 >= 2)
            {
                $evaluation16 = "O";
                $evaluationshow16 = 1;
            }
            else {
                $evaluation16 = "X";
                $evaluationshow16 = 0;
            }
            if($a->result33+$a->result35+$a->result37+$a->result39 >= 3)
            {
                $evaluation17 = "O";
                $evaluationshow17 = 1;
            }
            else {
                $evaluation17 = "X";
                $evaluationshow17 = 0;
            }
            if($a->result28+$a->result29+$a->result31 >= 2)
            {
                $evaluation18 = "O";
                $evaluationshow18 = 1;
            }
            else {
                $evaluation18 = "X";
                $evaluationshow18 = 0;
            }
            if($a->result44+$a->result45+$a->result46 >= 2)
            {
                $evaluation19 = "O";
                $evaluationshow19 = 1;
            }
            else {
                $evaluation19 = "X";
                $evaluationshow19 = 0;
            }
            if($a->result50+$a->result51 >= 2)
            {
                $evaluation25 = "O";
                $evaluationshow25 = 1;
            }
            else {
                $evaluation25 = "X";
                $evaluationshow25 = 0;
            }
            $finalcat = ($evaluation1+$evaluationshow2+$a->result11+$a->result12+$a->result13+$a->result14+$a->result15+$a->result16+$a->result17+$a->result19+$a->result49+$evaluation13+$evaluationshow14+$evaluationshow16+$evaluationshow17+$evaluationshow18+$a->result42+$a->result43+$evaluationshow19+$a->result47+$a->result48+$a->result49+$evaluationshow25+$a->result52)/24;

            $kpiproses = $finalcat*100;
        }

        //get data checksheet
        $hall = DB::table('datachecksheet')->where('IDKantor',$idcabang)->where('week',0)->where('periode',$periode)->where('deleted',0)->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/121)*100,0) AS skor'))->count();
        if($hall == 0)
        {
            $error2 = 1;
            $kpiresource = 0;
        }
        else
        {
            $error2 = 0;
            $all = DB::table('datachecksheet')->where('IDKantor',$idcabang)->where('week',0)->where('periode',$periode)->where('deleted',0)->select(DB::raw('ROUND((SUM(IF(nilai=1,1,0))/121)*100,0) AS skor'))->first();
            $kpiresource = $all->skor;
        }
        $form_data_result2 = array(
            'kpiproses'        =>  $kpiproses,
            'kpiresource'        =>  $kpiresource,
        );
        DB::table('datasummary')->where('periode',$periode)->where('IDKantor',$idcabang)->update($form_data_result2);
        if($error == 1)
        {
            if($error2 == 1)
            {
                return response()->json(['Informasi' => 'Data kosong, tidak ada summary yang di update']);
            }
            else
            {
                return response()->json(['Informasi' => 'Data Summary KPI berhasil di update. Data Summary Checksheet kosong.']);
            }
        }
        elseif($error2 == 1)
        {
            return response()->json(['Informasi' => 'Data Summary Checksheet berhasil di update. Data Summary KPI kosong.']);
        }
        else
        {
            return response()->json(['Informasi' => 'Data Summary berhasil di update.']);
        }

    }
}
