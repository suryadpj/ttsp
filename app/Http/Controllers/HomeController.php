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
            $cek = DB::table('log')->where('created_at','like',$now.'%')->where('menu','dashboard')->count();
            if($cek == 0)
            {
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
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'salestool',
            ]);
        }
        return view('salestool');
    }
    public function addmquote()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'mquote',
            ]);
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
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'digimar',
            ]);
        }
        return view('digimar');
    }
    public function promo()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'promo',
            ]);
        }
        return view('promo');
    }
    public function tcare()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'tcare',
            ]);
        }
        return view('tcare');
    }
    public function sosialmedia()
    {
        $data_user = Auth::user();
        if($data_user->id > 3)
        {
            DB::table('log')->insert([
            'IDUser' => Auth::id(),
            'menu' => 'sosialmedia',
            ]);
        }
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
        $cek2 = DB::table('spv')->where('IDSpv',auth::id())->where('level',1)->count();
        if($cek2 > 0)
        {
            $belum_login = DB::table('log')->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->count();
            $dikunjungi=DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
        }
        elseif($cek > 0)
        {
            $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',Auth::id())->count();
            $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',Auth::id())->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
        }
        else
        {
            $belum_login = DB::table('log')->where('log.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->where('id',Auth::id())->count();
            $dikunjungi =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
        }
        return view('dashboardadmin',['blmlog' => $belum_login,'totuser' => $totuser,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor]);
    }
    public function dashboardfilter1($periode)
    {
        // if(request()->ajax())
        // {
            $belum_login = DB::table('log')->where('created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->count();
            $belum_loginnya = $totuser-$belum_login;
            $dikunjungi=DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_mquote =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','mquote')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_salestool =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','salestool')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_promo =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','promo')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_digimar =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','digimar')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_sosialmedia =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','sosialmedia')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            return response()->json(['blmlog' => $belum_login,'totuser' => $belum_loginnya,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor,'mquote' => $visitor_mquote,'salestool' => $visitor_salestool,'promo' => $visitor_promo,'digimar' => $visitor_digimar,'sosialmedia' => $visitor_sosialmedia]);
        // }
    }
    public function dashboardfilter5()
    {
        // if(request()->ajax())
        // {
            $belum_login = DB::table('log')->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->count();
            $belum_loginnya = $totuser-$belum_login;
            $dikunjungi=DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_mquote =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','mquote')->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_salestool =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','salestool')->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_promo =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','promo')->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_digimar =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','digimar')->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_sosialmedia =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','sosialmedia')->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            return response()->json(['blmlog' => $belum_login,'totuser' => $belum_loginnya,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor,'mquote' => $visitor_mquote,'salestool' => $visitor_salestool,'promo' => $visitor_promo,'digimar' => $visitor_digimar,'sosialmedia' => $visitor_sosialmedia]);
        // }
    }
    public function dashboardfilter3($periode)
    {
        // if(request()->ajax())
        // {
            $visitor_mquote =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','mquote')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc');
            $label = $visitor_mquote->pluck('name');
            $data = $visitor_mquote->pluck('hitung');
            return response()->json(compact('label','data'));
        // }
    }
    public function dashboardfilter6()
    {
        // if(request()->ajax())
        // {
            $visitor_mquote =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.menu','mquote')->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc');
            $label = $visitor_mquote->pluck('name');
            $data = $visitor_mquote->pluck('hitung');
            return response()->json(compact('label','data'));
        // }
    }
    public function dashboardfilter2($periode,$spv)
    {

            $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',$spv)->where('created_at','like','%'.$periode.'%')->distinct()->count('log.IDUser');
            $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',$spv)->count();
            $belum_loginnya = $totuser-$belum_login;
            $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',$spv)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->first();
            $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',$spv)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','desc')->get();
            $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',$spv)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.$periode.'%')->groupBy('menu')->orderBy('hitung','asc')->first();
            $visitor =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_mquote =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.menu','mquote')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_salestool =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.menu','salestool')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_promo =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.menu','promo')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_digimar =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.menu','digimar')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();
            $visitor_sosialmedia =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.menu','sosialmedia')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();

        // if(request()->ajax())
        // {
            return response()->json(['blmlog' => $belum_login,'totuser' => $belum_loginnya,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor,'mquote' => $visitor_mquote,'salestool' => $visitor_salestool,'promo' => $visitor_promo,'digimar' => $visitor_digimar,'sosialmedia' => $visitor_sosialmedia]);
        // }
    }
    public function dashboardfilter4($periode,$spv)
    {

            $visitor_mquote =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',$spv)->where('log.menu','mquote')->where('log.created_at','like','%'.$periode.'%')->groupBy('name')->orderBy('hitung','desc')->get();

        // if(request()->ajax())
        // {
            $label = $visitor_mquote->pluck('name');
            $data = $visitor_mquote->pluck('hitung');
            return response()->json(compact('label','data'));
        // }
    }
    public function dashboardadmin1()
    {
        if(auth::id() == 1 ||auth::id() == 3)
        {
            $cek = DB::table('spv')->where('IDSpv',51)->count();
            if($cek > 0)
            {
                $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',51)->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',51)->count();
                $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',51)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',51)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',51)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->leftjoin('spv','spv.IDUser','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',51)->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            else
            {
                $belum_login = DB::table('log')->where('log.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->where('id',Auth::id())->count();
                $dikunjungi =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            return view('dashboardadmin',['blmlog' => $belum_login,'totuser' => $totuser,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor]);
        }
        else
        {
            return response()->json(['errors' => 'tidak diizinkan akses menu ini']);
        }
    }
    public function dashboardadmin2()
    {
        if(auth::id() == 1 ||auth::id() == 3)
        {
            $cek = DB::table('spv')->where('IDSpv',52)->count();
            if($cek > 0)
            {
                $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',52)->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',52)->count();
                $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',52)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',52)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',52)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->leftjoin('spv','spv.IDUser','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',52)->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            else
            {
                $belum_login = DB::table('log')->where('log.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->where('id',Auth::id())->count();
                $dikunjungi =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            return view('dashboardadmin',['blmlog' => $belum_login,'totuser' => $totuser,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor]);
        }
        else
        {
            return response()->json(['errors' => 'tidak diizinkan akses menu ini']);
        }
    }
    public function dashboardadmin3()
    {
        if(auth::id() == 1 ||auth::id() == 3)
        {
            $cek = DB::table('spv')->where('IDSpv',53)->count();
            if($cek > 0)
            {
                $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',53)->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',53)->count();
                $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',53)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',53)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',53)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->leftjoin('spv','spv.IDUser','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',53)->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            else
            {
                $belum_login = DB::table('log')->where('log.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->where('id',Auth::id())->count();
                $dikunjungi =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            return view('dashboardadmin',['blmlog' => $belum_login,'totuser' => $totuser,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor]);
        }
        else
        {
            return response()->json(['errors' => 'tidak diizinkan akses menu ini']);
        }
    }
    public function dashboardadmin4()
    {
        if(auth::id() == 1 ||auth::id() == 3)
        {
            $cek = DB::table('spv')->where('IDSpv',54)->count();
            if($cek > 0)
            {
                $belum_login = DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',54)->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->leftjoin('spv','spv.IDUser','users.id')->where('spv.IDSpv',54)->count();
                $dikunjungi =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',54)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',54)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->leftjoin('spv','spv.IDUser','log.IDUser')->where('spv.IDSpv',54)->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->leftjoin('spv','spv.IDUser','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('spv.IDSpv',54)->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            else
            {
                $belum_login = DB::table('log')->where('log.IDUser',Auth::id())->where('created_at','like','%'.date('Y-m').'%')->distinct()->count('log.IDUser');
                $totuser = DB::table('users')->where('id',Auth::id())->count();
                $dikunjungi =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->first();
                $visit =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','desc')->get();
                $jarang =DB::table('log')->where('log.IDUser',Auth::id())->select('menu',DB::raw("count(log.id) as hitung"))->where('created_at','like','%'.date('Y-m').'%')->groupBy('menu')->orderBy('hitung','asc')->first();
                $visitor =DB::table('log')->leftjoin('users','users.id','log.IDUser')->select('name',DB::raw("count(log.id) as hitung"))->where('log.created_at','like','%'.date('Y-m').'%')->groupBy('name')->orderBy('hitung','desc')->get();
            }
            return view('dashboardadmin',['blmlog' => $belum_login,'totuser' => $totuser,'dikunjungi'=> $dikunjungi,'jarang' => $jarang,'visit' => $visit,'visitor' => $visitor]);
        }
        else
        {
            return response()->json(['errors' => 'tidak diizinkan akses menu ini']);
        }
    }
    public function password($pass)
    {
        return Hash::make($pass);
    }
}
