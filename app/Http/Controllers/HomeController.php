<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('dashboard');
    }
    public function salestool()
    {
        return view('salestool');
    }
    public function digitalcontent()
    {
        return view('digimar');
    }
    public function promo()
    {
        return view('promo');
    }
    public function tcare()
    {
        return view('tcare');
    }
    public function sosialmedia()
    {
        return view('sosialmedia');
    }
}
