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
        $kantor = DB::table('kantors')->orderBy('nama','asc')->count();
        $kantor_data = DB::table('kantors')->orderBy('nama','asc')->get();
        return view('home',['kantor' => $kantor,'datakantor' => $kantor_data]);
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
