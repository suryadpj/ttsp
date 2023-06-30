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

        $kantor_data = DB::table('kantors')->leftjoin('users','users.IDKantor','kantors.id')->leftjoin('datachecksheet_result','datachecksheet_result.IDUser','users.id')->leftjoin('datakpi_result','datakpi_result.IDUser','users.id')->where('datachecksheet_result.periode',$date)->where('datachecksheet_result.week',0)->where('datakpi_result.periode',$date)->select('nama','datachecksheet_result.result as hasilnya','datakpi_result.*')->orderBy('nama','asc')->get();
        return view('home',['kantor' => $kantor,'datakantor' => $kantor_data,'hitunginput' => $hitunginput]);
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
