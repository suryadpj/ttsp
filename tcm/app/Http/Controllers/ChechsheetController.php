<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;

class ChechsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_a = DB::table('fields')->where('IDSegmen',17)->get();
        $data_b = DB::table('fields')->where('IDSegmen',18)->get();
        $data_c = DB::table('fields')->where('IDSegmen',19)->get();
        $data_d = DB::table('fields')->where('IDSegmen',20)->get();
        $data_e = DB::table('fields')->where('IDSegmen',21)->get();
        $data_f = DB::table('fields')->where('IDSegmen',22)->get();
        $data_g = DB::table('fields')->where('IDSegmen',23)->get();
        $data_h = DB::table('fields')->where('IDSegmen',24)->get();
        $data_i = DB::table('fields')->where('IDSegmen',25)->get();
        $data_j = DB::table('fields')->where('IDSegmen',26)->get();
        $data_k = DB::table('fields')->where('IDSegmen',27)->get();
        $data_l = DB::table('fields')->where('IDSegmen',28)->get();
        $data_m = DB::table('fields')->where('IDSegmen',29)->get();
        $data_n = DB::table('fields')->where('IDSegmen',30)->get();
        $data_o = DB::table('fields')->where('IDSegmen',31)->get();
        $data_p = DB::table('fields')->where('IDSegmen',32)->get();
        $data_q = DB::table('fields')->where('IDSegmen',33)->get();
        $data_r = DB::table('fields')->where('IDSegmen',34)->get();

        return view('checksheet',[
            'data_a' => $data_a,
            'data_b' => $data_b,
            'data_c' => $data_c,
            'data_d' => $data_d,
            'data_e' => $data_e,
            'data_f' => $data_f,
            'data_g' => $data_g,
            'data_h' => $data_h,
            'data_i' => $data_i,
            'data_j' => $data_j,
            'data_k' => $data_k,
            'data_l' => $data_l,
            'data_m' => $data_m,
            'data_n' => $data_n,
            'data_o' => $data_o,
            'data_p' => $data_p,
            'data_q' => $data_q,
            'data_r' => $data_r,
        ]);
    }
    public function createmingguan()
    {
        $data_a = DB::table('fields')->where('IDSegmen',17)->get();
        $data_b = DB::table('fields')->where('IDSegmen',18)->get();
        $data_c = DB::table('fields')->where('IDSegmen',19)->get();
        $data_d = DB::table('fields')->where('IDSegmen',20)->get();
        $data_e = DB::table('fields')->where('IDSegmen',21)->get();
        $data_f = DB::table('fields')->where('IDSegmen',22)->get();
        $data_g = DB::table('fields')->where('IDSegmen',23)->get();
        $data_h = DB::table('fields')->where('IDSegmen',24)->get();
        $data_i = DB::table('fields')->where('IDSegmen',25)->get();
        $data_j = DB::table('fields')->where('IDSegmen',26)->get();
        $data_k = DB::table('fields')->where('IDSegmen',27)->get();
        $data_l = DB::table('fields')->where('IDSegmen',28)->get();
        $data_m = DB::table('fields')->where('IDSegmen',29)->get();
        $data_n = DB::table('fields')->where('IDSegmen',30)->get();
        $data_o = DB::table('fields')->where('IDSegmen',31)->get();
        $data_p = DB::table('fields')->where('IDSegmen',32)->get();
        $data_q = DB::table('fields')->where('IDSegmen',33)->get();
        $data_r = DB::table('fields')->where('IDSegmen',34)->get();

        return view('checksheetmingguan',[
            'data_a' => $data_a,
            'data_b' => $data_b,
            'data_c' => $data_c,
            'data_d' => $data_d,
            'data_e' => $data_e,
            'data_f' => $data_f,
            'data_g' => $data_g,
            'data_h' => $data_h,
            'data_i' => $data_i,
            'data_j' => $data_j,
            'data_k' => $data_k,
            'data_l' => $data_l,
            'data_m' => $data_m,
            'data_n' => $data_n,
            'data_o' => $data_o,
            'data_p' => $data_p,
            'data_q' => $data_q,
            'data_r' => $data_r,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //define kategori


        $rules = array(
            'kategori' => 'required',
            'periode' => 'required',
            'checksheet.1' => 'required',
            'checksheet.2' => 'required',
            'checksheet.3' => 'required',
            'checksheet.4' => 'required',
            'checksheet.5' => 'required',
            'checksheet.6' => 'required',
            'checksheet.7' => 'required',
            'checksheet.8' => 'required',
            'checksheet.9' => 'required',
            'checksheet.10' => 'required',
            'checksheet.11' => 'required',
            'checksheet.12' => 'required',
            'checksheet.13' => 'required',
            'checksheet.14' => 'required',
            'checksheet.15' => 'required',
            'checksheet.16' => 'required',
            'checksheet.17' => 'required',
            'checksheet.18' => 'required',
            'checksheet.19' => 'required',
            'checksheet.20' => 'required',
            'checksheet.20' => 'required',
            'checksheet.21' => 'required',
            'checksheet.22' => 'required',
            'checksheet.23' => 'required',
            'checksheet.24' => 'required',
            'checksheet.25' => 'required',
            'checksheet.26' => 'required',
            'checksheet.27' => 'required',
            'checksheet.28' => 'required',
            'checksheet.29' => 'required',
            'checksheet.30' => 'required',
            'checksheet.31' => 'required',
            'checksheet.32' => 'required',
            'checksheet.33' => 'required',
            'checksheet.34' => 'required',
            'checksheet.35' => 'required',
            'checksheet.36' => 'required',
            'checksheet.37' => 'required',
            'checksheet.38' => 'required',
            'checksheet.39' => 'required',
            'checksheet.40' => 'required',
            'checksheet.41' => 'required',
            'checksheet.42' => 'required',
            'checksheet.43' => 'required',
            'checksheet.44' => 'required',
            'checksheet.45' => 'required',
            'checksheet.46' => 'required',
            'checksheet.47' => 'required',
            'checksheet.48' => 'required',
            'checksheet.49' => 'required',
            'checksheet.50' => 'required',
            'checksheet.51' => 'required',
            'checksheet.52' => 'required',
            'checksheet.53' => 'required',
            'checksheet.54' => 'required',
            'checksheet.55' => 'required',
            'checksheet.56' => 'required',
            'checksheet.57' => 'required',
            'checksheet.58' => 'required',
            'checksheet.59' => 'required',
            'checksheet.60' => 'required',
            'checksheet.61' => 'required',
            'checksheet.62' => 'required',
            'checksheet.63' => 'required',
            'checksheet.64' => 'required',
            'checksheet.65' => 'required',
            'checksheet.66' => 'required',
            'checksheet.67' => 'required',
            'checksheet.68' => 'required',
            'checksheet.69' => 'required',
            'checksheet.70' => 'required',
            'checksheet.71' => 'required',
            'checksheet.72' => 'required',
            'checksheet.73' => 'required',
            'checksheet.74' => 'required',
            'checksheet.75' => 'required',
            'checksheet.76' => 'required',
            'checksheet.77' => 'required',
            'checksheet.78' => 'required',
            'checksheet.79' => 'required',
            'checksheet.80' => 'required',
            'checksheet.81' => 'required',
            'checksheet.82' => 'required',
            'checksheet.83' => 'required',
            'checksheet.84' => 'required',
            'checksheet.85' => 'required',
            'checksheet.86' => 'required',
            'checksheet.87' => 'required',
            'checksheet.88' => 'required',
            'checksheet.89' => 'required',
            'checksheet.90' => 'required',
            'checksheet.91' => 'required',
            'checksheet.92' => 'required',
            'checksheet.93' => 'required',
            'checksheet.94' => 'required',
            'checksheet.95' => 'required',
            'checksheet.96' => 'required',
            'checksheet.97' => 'required',
            'checksheet.98' => 'required',
            'checksheet.99' => 'required',
            'checksheet.90' => 'required',
            'checksheet.91' => 'required',
            'checksheet.92' => 'required',
            'checksheet.93' => 'required',
            'checksheet.94' => 'required',
            'checksheet.95' => 'required',
            'checksheet.96' => 'required',
            'checksheet.97' => 'required',
            'checksheet.98' => 'required',
            'checksheet.99' => 'required',
            'checksheet.100' => 'required',
            'checksheet.101' => 'required',
            'checksheet.102' => 'required',
            'checksheet.103' => 'required',
            'checksheet.104' => 'required',
            'checksheet.105' => 'required',
            'checksheet.106' => 'required',
            'checksheet.107' => 'required',
            'checksheet.108' => 'required',
            'checksheet.109' => 'required',
            'checksheet.110' => 'required',
            'checksheet.111' => 'required',
            'checksheet.112' => 'required',
            'checksheet.113' => 'required',
            'checksheet.114' => 'required',
            'checksheet.115' => 'required',
            'checksheet.116' => 'required',
            'checksheet.117' => 'required',
            'checksheet.118' => 'required',
            'checksheet.119' => 'required',
            'checksheet.120' => 'required',
            'checksheet.121' => 'required',
        );

        if($request->kategori =="week")
        {

            $rules = array_merge($rules, [
                'week' => 'required',
            ]);
        }

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
        $datakpi = $request->checksheet;
        $periode = $request->periode;
        $catatan = $request->catatan;
        $kategori = $request->kategori;
        $tanggal = date('Y-m-d');
        $format_tanggal = date('F Y', strtotime($tanggal));
        //cek KPI
        $cek = DB::table('datachecksheet')->where('IDUser',$data_user->id)->where('periode',$periode.'-01')->count();
        if($cek > 0)
        {
            return response()->json(['duplicate' => 'Anda sudah mengisi Checksheet periode '.$format_tanggal.' ini, silahkan cek di data Checksheet. Terima kasih']);
        }
        for($count = 0; $count < count($datakpi); $count++)
        {
            $nomorkpi = $count+1;
            $data2 = array(
                'tanggal'   => $tanggal,
                'periode'   => $periode."-01",
                'IDUser'    => $data_user->id,
                'IDField'   => $nomorkpi,
                'IDKantor'  => $data_user->IDKantor,
                'nilai'     => $datakpi[$nomorkpi],
                'deleted'   => 0,
                'id_uniq'   => "4-".$nomorkpi,
            );

            if($request->kategori =="week")
            {

                $data2 = array_merge($data2, [
                    'week' => $request->week,
                ]);
            }
            $insert_data2[] = $data2;
        }
        DB::table('datachecksheet')->insert($insert_data2);

        return response()->json(['success' => 'Data Checksheet berhasil disimpan, silahkan periksa data anda']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
