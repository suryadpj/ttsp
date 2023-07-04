<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;

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
        $resultkpi = DB::table('datakpi_result')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->first();
        $resultkpicount = DB::table('datakpi_result')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->count();
        $resultcheck = DB::table('datachecksheet_result')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->first();
        $resultcheckcount = DB::table('datachecksheet_result')->where('periode',$fperiode."-01")->where('IDKantor',$fkantor)->count();
        $summary = DB::table('summaryreport')->where('IDKantor',$fkantor)->where('periode',$fperiode.'-01')->first();
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
            return view('summaryreportsearch',['summary' => $summary,'kantor' => $kantor,'fperiode' => $fperiode,'fkantor' => $fkantor,'resultkpi' => $resultkpi,'resultcheck' => $resultcheck]);
        }

    }

    public function store(request $request)
    {
        //define kategori


        $rules = array(
            'periode' => 'required',
            'kantor' => 'required',
        );

        $messages = [
            'required' => ':attribute belum diisi',
            'min' => ':attribute harus diisi minimal :min karakter',
            'max' => ':attribute harus diisi maksimal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'area.required' => 'area / tujuan disposisi wajib diisi',
            'week.required' => 'Periode Minggu Checksheet belum anda pilih',
            'periode.required' => 'Preiode KPI harap diisi',
        ];

        $error = Validator::make($request->all(), $rules, $messages);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $data_user = auth::user();
        $kantor = $request->kantor;
        $periode = $request->periode;
        $tanggal = date('Y-m-d');
        $format_tanggal = date('F Y', strtotime($tanggal));
        //cek KPI
        $cek = DB::table('summaryreport')->where('IDUser',$data_user->id)->where('IDKantor',$kantor)->where('periode',$periode.'-01')->count();
        if($cek > 0)
        {
            $form_data_result2 = array(
                'issue1'     => $request->issue1,
                'issue2'     => $request->issue2,
                'issue3'     => $request->issue3,
                'issue4'     => $request->issue4,
                'issue5'     => $request->issue5,
                'issue6'     => $request->issue6,
                'issue7'     => $request->issue7,
                'action1'     => $request->action1,
                'action2'     => $request->action2,
                'action3'     => $request->action3,
                'action4'     => $request->action4,
                'action5'     => $request->action5,
                'action6'     => $request->action6,
                'action7'     => $request->action7,
                'deleted'   => 0,
            );
            DB::table('summaryreport')->where('periode',$periode."-01")->where('IDKantor',$kantor)->where('IDUser',$data_user->id)->update($form_data_result2);
        }
        else
        {
            $data2 = array(
                'periode'   => $periode."-01",
                'IDUser'    => $data_user->id,
                'IDKantor'  => $data_user->IDKantor,
                'issue1'     => $request->issue1,
                'issue2'     => $request->issue2,
                'issue3'     => $request->issue3,
                'issue4'     => $request->issue4,
                'issue5'     => $request->issue5,
                'issue6'     => $request->issue6,
                'issue7'     => $request->issue7,
                'action1'     => $request->action1,
                'action2'     => $request->action2,
                'action3'     => $request->action3,
                'action4'     => $request->action4,
                'action5'     => $request->action5,
                'action6'     => $request->action6,
                'action7'     => $request->action7,
                'deleted'   => 0,
            );
            DB::table('summaryreport')->insert($data2);
        }

        return response()->json(['success' => 'Data berhasil disimpan, silahkan periksa data anda']);
    }
}
