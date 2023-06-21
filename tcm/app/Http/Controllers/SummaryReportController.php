<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class SummaryReportController extends Controller
{
    public function index()
    {
        $data_user = Auth::user();
        if($data_user->IDKantor == 1)
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->get();
        }
        else
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->where('id',$data_user->IDKantor)->get();
        }
        return view('summaryreport',['kantor' => $kantor]);
    }
    public function summaryreportsearch(request $request)
    {
        //define
        $data_user = Auth::user();
        $fkantor = $request->search_kantor;
        $fperiode = $request->search_periode;
        $resultkpi = DB::table('datakpi_result')->leftjoin('users','users.id','datakpi_result.IDUser')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->first();
        $resultkpicount = DB::table('datakpi_result')->leftjoin('users','users.id','datakpi_result.IDUser')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->count();
        $resultcheck = DB::table('datachecksheet_result')->leftjoin('users','users.id','datachecksheet_result.IDUser')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->first();
        $resultcheckcount = DB::table('datachecksheet_result')->leftjoin('users','users.id','datachecksheet_result.IDUser')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->count();
        if($data_user->IDKantor == 1)
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->get();
        }
        else
        {
            $kantor = DB::table('kantors')->orderBy('nama','asc')->where('id',$data_user->IDKantor)->get();
        }
        if($fkantor == "")
        {
            return redirect()->back()->withInput(array('fperiode' => $fperiode, 'success' => 'Nama kantor belum diisi'));
        }
        elseif($fperiode == "")
        {
            return redirect()->back()->withInput(array('fkantor' => $fkantor, 'success' => 'Periode belum diisi'));
        }
        elseif($resultkpicount == 0)
        {
            return redirect()->back()->withInput(array('fperiode' => $fperiode,'fkantor' => $fkantor, 'success' => 'Anda belum mengerjakan KPI periode tersebut'));
        }
        elseif($resultcheckcount == 0)
        {
            return redirect()->back()->withInput(array('fperiode' => $fperiode,'fkantor' => $fkantor, 'success' => 'Anda belum mengerjakan Cheksheet periode tersebut'));
        }
        else
        {
            // $resultkpi = DB::table('datakpi_result')
            return view('summaryreportsearch',['kantor' => $kantor,'fperiode' => $fperiode,'fkantor' => $fkantor,'resultkpi' => $resultkpi,'resultcheck' => $resultcheck]);
        }

    }
}
