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
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // $cek = DB::table('log')->where('created_at','like',$now.'%')->where('menu','dashboard')->count();
            // if($cek == 0)
            // {
            //     DB::table('log')->insert([
            //     'IDUser' => Auth::id(),
            //     'menu' => 'dashboard',
            //     ]);
            // }
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','dashboard')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','dashboard')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','dashboard')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'dashboard',
                ]);
            }
        }
        return view('dashboard');
    }
    public function salestool()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'salestool',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','salestool')->were('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','salestool')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','salestool')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'salestool',
                ]);
            }
        }
        return view('salestool');
    }
    public function addmquote()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'mquote',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','mquote')->were('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','mquote')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','mquote')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'mquote',
                ]);
            }
            return response()->json(['sukses' => 'data berhasil disimpan']);
        }
        else
        {
            return response()->json(['sukses' => 'data berhasil disimpan']);
        }

    }
    public function digitalcontent()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'digimar',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','digimar')->were('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','digimar')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','digimar')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'digimar',
                ]);
            }
        }
        return view('digimar');
    }
    public function promo()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'promo',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','promo')->were('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','promo')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','promo')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'promo',
                ]);
            }
        }
        return view('promo');
    }
    public function tcare()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'tcare',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','tcare')->were('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','tcare')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','tcare')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'tcare',
                ]);
            }
        }
        return view('tcare');
    }
    public function sosialmedia()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'sosialmedia',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','sosialmedia')->were('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','sosialmedia')->were('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','sosialmedia')->were('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'sosialmedia',
                ]);
            }
        }
        return view('sosialmedia');
    }
    public function dashboardadmin()
    {
        $dataspv = DB::table('spv_data')->select('area')->whereNotNull('area')->orderby('spv_data.area','asc')->distinct()->get();
        return view('dashboardadmin',['dataspv' => $dataspv]);
    }
    public function dashboardfilter1($periode)
    {
        // if(request()->ajax())
        // {
            $cek = DB::table('spv')->where('IDSpv',auth::id())->count();
            $cek2 = DB::table('spv')->where('IDSpv',auth::id())->where('level',1)->count();
            if($cek2 > 0)
            {
                $belum_login = DB::table('log')->where('created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->count();
                $belum_loginnya = $totuser-$belum_login;
                $dikunjungi=DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_salestool =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_promo =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','promo')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_digimar =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_sosialmedia =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            elseif($cek > 0)
            {
                $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->where('created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',Auth::id())->count();
                $belum_loginnya = $totuser-$belum_login;
                $dikunjungi=DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_salestool =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_promo =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','promo')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_digimar =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_sosialmedia =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            else
            {
                $belum_login = DB::table('log')->where('created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->count();
                $belum_loginnya = $totuser-$belum_login;
                $dikunjungi=DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_salestool =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_promo =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','promo')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_digimar =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_sosialmedia =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            return response()->json(['blmlog' => $belum_login,'totuser' => $belum_loginnya,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor,'mquote' => $visitor_mquote,'salestool' => $visitor_salestool,'promo' => $visitor_promo,'digimar' => $visitor_digimar,'sosialmedia' => $visitor_sosialmedia]);
        // }
    }
    public function dashboardfilter5()
    {
        // if(request()->ajax())
        // {
            $cek = DB::table('spv')->where('IDSpv',auth::id())->count();
            $cek2 = DB::table('spv')->where('IDSpv',auth::id())->where('level',1)->count();
            if($cek2 > 0)
            {
                $belum_login = DB::table('log')->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->count();
                $belum_loginnya = $totuser-$belum_login;
                $dikunjungi=DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_salestool =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_promo =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','promo')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_digimar =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_sosialmedia =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            elseif($cek > 0)
            {
                $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',Auth::id())->count();
                $belum_loginnya = $totuser-$belum_login;
                $dikunjungi=DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_salestool =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_promo =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','promo')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_digimar =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_sosialmedia =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            else
            {
                $belum_login = DB::table('log')->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->count();
                $belum_loginnya = $totuser-$belum_login;
                $dikunjungi=DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('logver2')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_salestool =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_promo =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','promo')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_digimar =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
                $visitor_sosialmedia =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
                return response()->json(['blmlog' => $belum_login,'totuser' => $belum_loginnya,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor,'mquote' => $visitor_mquote,'salestool' => $visitor_salestool,'promo' => $visitor_promo,'digimar' => $visitor_digimar,'sosialmedia' => $visitor_sosialmedia]);
        // }
    }
    public function dashboardfilter3($periode)
    {
        // if(request()->ajax())
        // {
            $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc');
            $label = $visitor_mquote->pluck('name');
            $data = $visitor_mquote->pluck('hitung');
            return response()->json(compact('label','data'));
        // }
    }
    public function dashboardfilter6()
    {
        // if(request()->ajax())
        // {
            $visitor_mquote =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc');
            $label = $visitor_mquote->pluck('name');
            $data = $visitor_mquote->pluck('hitung');
            return response()->json(compact('label','data'));
        // }
    }
    public function dashboardfilter2($periode,$lokasi,$spv)
    {
        if($spv == "all")
        {
            $belum_login = DB::table('log')->leftjoin('users','users.id','log.IDUser')->where('users.lokasi','like','%'.$lokasi.'%')->where('log.created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('users.lokasi','LIKE','%'.$lokasi.'%')->count();
            $belum_loginnya = $totuser-$belum_login;
            $dikunjungi =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->where('users.lokasi','LIKE','%'.$lokasi.'%')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->where('users.lokasi','LIKE','%'.$lokasi.'%')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('logver2')->leftjoin('users','users.id','logver2.IDUser')->where('users.lokasi','LIKE','%'.$lokasi.'%')->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('logver2.created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_mquote =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_salestool =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_promo =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.menu','promo')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_digimar =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_sosialmedia =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
        }
        else
        {
            $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',$spv)->where('created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',$spv)->count();
            $belum_loginnya = $totuser-$belum_login;
            $dikunjungi =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',$spv)->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',$spv)->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->where('spv.IDSpv',$spv)->select('menu',DB::raw("SUM(logver2.jumlah) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_mquote =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_salestool =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.menu','salestool')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_promo =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.menu','promo')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_digimar =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.menu','digimar')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_sosialmedia =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.menu','sosialmedia')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
        }

        // if(request()->ajax())
        // {
            return response()->json(['blmlog' => $belum_login,'totuser' => $belum_loginnya,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor,'mquote' => $visitor_mquote,'salestool' => $visitor_salestool,'promo' => $visitor_promo,'digimar' => $visitor_digimar,'sosialmedia' => $visitor_sosialmedia]);
        // }
    }
    public function dashboardfilter4($periode,$lokasi,$spv)
    {
        if($spv == "all")
        {
            $visitor_mquote =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('users.lokasi','LIKE','%'.$lokasi.'%')->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
        }
        else
        {
            $visitor_mquote =DB::table('logver2')->leftjoin('spv','spv.IDUser','logver2.IDUser')->leftjoin('users','users.id','logver2.IDUser')->select('name',DB::raw("SUM(logver2.jumlah) as hitung"))->where('spv.IDSpv',$spv)->where('logver2.menu','mquote')->where('logver2.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
        }
        // if(request()->ajax())
        // {
            $label = $visitor_mquote->pluck('name');
            $data = $visitor_mquote->pluck('hitung');
            return response()->json(compact('label','data'));
        // }
    }
    public function password($pass)
    {
        return Hash::make($pass);
    }
    public function dataspvfilter($id)
    {
        $data = DB::table('spv_data')
        ->leftjoin('users','users.id','spv_data.IDUser')
        ->select('*','users.name')
        ->where('spv_data.area', $id)
        ->get();
        return response()->json($data);
    }
}
