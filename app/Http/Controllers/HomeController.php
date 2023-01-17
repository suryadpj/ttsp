<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $data_user = Auth::user();
        $now = date("Y-m-d");
        $cek = DB::table('log')->where('created_at','like',$now.'%')->where('menu','dashboard')->count();
        if($cek == 0)
        {
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'dashboard',
            ]);
        }
        return view('dashboard');
    }
    public function salestool()
    {
        DB::table('log')->insert([
        'IDUser' => Auth::id(),
        'menu' => 'salestool',
        ]);
        return view('salestool');
    }
    public function digitalcontent()
    {
        DB::table('log')->insert([
        'IDUser' => Auth::id(),
        'menu' => 'digimar',
        ]);
        return view('digimar');
    }
    public function promo()
    {
        DB::table('log')->insert([
        'IDUser' => Auth::id(),
        'menu' => 'promo',
        ]);
        return view('promo');
    }
    public function tcare()
    {
        DB::table('log')->insert([
        'IDUser' => Auth::id(),
        'menu' => 'tcare',
        ]);
        return view('tcare');
    }
    public function sosialmedia()
    {
        DB::table('log')->insert([
        'IDUser' => Auth::id(),
        'menu' => 'sosialmedia',
        ]);
        return view('sosialmedia');
    }
    public function dashboardadmin()
    {
        // DB::table('log')->insert([
        // 'IDUser' => Auth::id(),
        // 'menu' => 'dashboardadmin',
        // ]);
        //cek spv
        $cek = DB::table('spv')->where('IDSpv',auth::id())->count();
        if($cek > 0)
        {
            $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m-d').'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDUser',Auth::id())->count();
            $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m-d').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m-d').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m-d').'%')->groupBy('menu')->orderBy('hitung','asc')->first();

        }
        else
        {
            $belum_login = DB::table('log')->where('log.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m-d').'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->where('id',Auth::id())->count();
            $dikunjungi =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m-d').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m-d').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m-d').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
        }
        return view('dashboardadmin',['blmlog' => $belum_login,'totuser' => $totuser,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit]);
    }
    public function password($pass)
    {
        return Hash::make($pass);
    }
}
