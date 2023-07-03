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
        $hitunginput = DB::table('datakpi_result')->leftjoin('users','users.id','datakpi_result.IDUser')->where('periode',$date)->select(DB::raw('count(users.IDKantor) as input'))->first();

        $kantor_data = DB::table('datasummary')->leftjoin('kantors','kantors.id','datasummary.IDKantor')->orderBy('nama','asc')->orderby('periode','asc')->select('*',DB::raw('DATE_FORMAT(periode,"%M %Y") as bulan'))->get();
        // $kantor_data = DB::table('kantors')->leftjoin('users','users.IDKantor','kantors.id')->leftjoin('datachecksheet_result','datachecksheet_result.IDUser','users.id')->leftjoin('datakpi_result','datakpi_result.IDUser','users.id')->where('datachecksheet_result.week',0)->select('nama','datachecksheet_result.result as hasilnya','datakpi_result.*')->orderBy('nama','asc')-->get();
        $chart_input = DB::table('datakpi_result as a')->whereyear('periode',date('Y'))->where('deleted',0)->select(DB::raw('SUM(IF(a.periode="2023-01-01",1,0)) AS jan'),DB::raw('SUM(IF(a.periode="2023-02-01",1,0)) AS feb'),DB::raw('SUM(IF(a.periode="2023-03-01",1,0)) AS mar'),DB::raw('SUM(IF(a.periode="2023-04-01",1,0)) AS apr'),DB::raw('SUM(IF(a.periode="2023-05-01",1,0)) AS mei'),DB::raw('SUM(IF(a.periode="2023-06-01",1,0)) AS jun'),DB::raw('SUM(IF(a.periode="2023-07-01",1,0)) AS jul'),DB::raw('SUM(IF(a.periode="2023-08-01",1,0)) AS aug'),DB::raw('SUM(IF(a.periode="2023-09-01",1,0)) AS sep'),DB::raw('SUM(IF(a.periode="2023-10-01",1,0)) AS okt'),DB::raw('SUM(IF(a.periode="2023-11-01",1,0)) AS nov'),DB::raw('SUM(IF(a.periode="2023-12-01",1,0)) AS des'))->first();
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
}
