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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
    public function password($pass)
    {
        return Hash::make($pass);
    }
}
