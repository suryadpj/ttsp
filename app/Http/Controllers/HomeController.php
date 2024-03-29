<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;

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
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','dashboard')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','dashboard')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
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
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'salestool',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','salestool')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','salestool')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','salestool')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
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
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'mquote',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','mquote')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','mquote')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','mquote')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
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
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'digimar',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','digimar')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','digimar')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','digimar')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
                DB::table('log')->insert([
                'IDUser' => Auth::id(),
                'menu' => 'digimar',
                ]);
            }
        }
        $konten_tk = DB::table('digimar_content')->leftjoin('users','users.id','digimar_content.IDUser')->where('kategori',1)->orderby('digimar_content.id','desc')->get();
        $konten_ig = DB::table('digimar_content')->leftjoin('users','users.id','digimar_content.IDUser')->where('kategori',2)->orderby('digimar_content.id','desc')->get();
        return view('digimar',['tiktok' => $konten_tk,'instagram' => $konten_ig]);
    }
    public function storedigimar(request $request)
    {
        $messages = [
            'nama.required' => 'Judul konten belum anda isi',
            'link.required' => 'Alamat / link konten belum anda isi',
            'jenis.required' => 'Jenis / Kategori sosial media konten belum anda isi',
        ];

        $rules = array(
            'nama' => 'required',
            'link' => 'required',
            'jenis' => 'required',
        );

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data_user = auth::user();
        $nama = $request->nama;
        $link = $request->link;
        $jenis = $request->jenis;
        switch($jenis)
        {
            case 1 : $kategori = 1; $name = 'tiktok'; $imgsrc = 'images/pictures/3.png'; break;
            case 2 : $kategori = 2; $name = 'instagram'; $imgsrc = 'images/pictures/4.jpg'; break;
        }
        $tanggal = date('Y-m-d');

        $form_data = array(
            'IDUser'        =>  $data_user->id,
            'tanggal'       =>  $tanggal,
            'img_name'      =>  $name,
            'img_src'       =>  $imgsrc,
            'link'          =>  $link,
            'kategori'      =>  $kategori,
            'keterangan'    =>  $nama,
            'deleted'       =>  '0'
        );

        DB::table('digimar_content')->insert($form_data);

        return response()->json(['success' => 'Data berhasil disimpan, silahkan periksa data anda']);
    }
    public function promo()
    {
        $data_user = Auth::user();
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'promo',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','promo')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','promo')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','promo')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
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
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'tcare',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','tcare')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','tcare')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','tcare')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
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
        $now = date("Y-m");
        if($data_user->id > 3)
        {
            // DB::table('log')->insert([
            // 'IDUser' => Auth::id(),
            // 'menu' => 'sosialmedia',
            // ]);
            $cek = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','sosialmedia')->where('IDUser',$data_user->id)->count();
            if($cek > 0)
            {
                $data = DB::table('logver2')->where('periode','like',$now.'%')->where('menu','sosialmedia')->where('IDUser',$data_user->id)->select('jumlah')->first();
                $update = $data->jumlah + 1;
                DB::table('logver2')->where('periode','like',$now.'%')->where('menu','sosialmedia')->where('IDUser',$data_user->id)->update(['jumlah' => $update]);
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
