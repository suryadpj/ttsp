<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Validator;
use DataTables;
use App\User;
use Excel;
use App\Exports\KPIExport;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(request $request)
    {
        $data_user = Auth::user();
        if (request()->ajax()) {
            if ($data_user->IDKantor == 1) {
                return datatables()->of(DB::table('datakpi_result')
                    ->leftjoin('kantors', 'kantors.id', '=', 'datakpi_result.IDKantor')
                    ->select('kantors.nama', 'datakpi_result.IDKantor', 'datakpi_result.*', DB::raw('DATE_FORMAT(datakpi_result.periode,"%M %Y") as periodik'))
                    ->where('datakpi_result.deleted', '0'))
                    ->filter(function ($data) use ($request) {
                        if (!empty ($request->judul)) {
                            $data->where('periode', $request->judul . "-01");
                        }

                        if (!empty ($request->lokasi)) {
                            $data->where('datakpi_result.IDKantor', $request->lokasi);
                        }
                    })
                    ->editColumn('grade1', function ($data) {
                        $evaluation1 = $data->result1;
                        if ($data->result3 + $data->result5 + $data->result7 >= 2) {
                            $evaluation2 = "O";
                            $evaluationshow2 = 1;
                        } else {
                            $evaluation2 = "X";
                            $evaluationshow2 = 0;
                        }
                        $cat1 = ($evaluation1 + $evaluationshow2 + $data->result11 + $data->result12 + $data->result13 + $data->result14 + $data->result15 + $data->result16 + $data->result17 + $data->result19 + $data->result49) / 12;
                        if ($cat1 * 100 >= 85) {
                            return "High - " . ROUND($cat1 * 100) . "%";
                        } elseif ($cat1 * 100 >= 70) {
                            return "Medium - " . ROUND($cat1 * 100) . "%";
                        } elseif ($cat1 * 100 < 70) {
                            return "Low - " . ROUND($cat1 * 100) . "%";
                        }
                    })
                    ->editColumn('grade2', function ($data) {
                        $evaluation13 = $data->result25;
                        if ($data->result20 + $data->result21 + $data->result22 >= 2) {
                            $evaluation14 = "O";
                            $evaluationshow14 = 1;
                        } else {
                            $evaluation14 = "X";
                            $evaluationshow14 = 0;
                        }
                        $cat2 = ($evaluation13 + $evaluationshow14) / 2;
                        if ($cat2 * 100 >= 85) {
                            return "High - " . ROUND($cat2 * 100) . "%";
                        } elseif ($cat2 * 100 >= 70) {
                            return "Medium - " . ROUND($cat2 * 100) . "%";
                        } elseif ($cat2 * 100 < 70) {
                            return "Low - " . ROUND($cat2 * 100) . "%";
                        }
                    })
                    ->editColumn('grade3', function ($data) {
                        if ($data->result26 + $data->result27 >= 2) {
                            $evaluation16 = "O";
                            $evaluationshow16 = 1;
                        } else {
                            $evaluation16 = "X";
                            $evaluationshow16 = 0;
                        }
                        if ($data->result33 + $data->result35 + $data->result37 + $data->result39 >= 3) {
                            $evaluation17 = "O";
                            $evaluationshow17 = 1;
                        } else {
                            $evaluation17 = "X";
                            $evaluationshow17 = 0;
                        }
                        if ($data->result28 + $data->result29 + $data->result31 >= 2) {
                            $evaluation18 = "O";
                            $evaluationshow18 = 1;
                        } else {
                            $evaluation18 = "X";
                            $evaluationshow18 = 0;
                        }
                        if ($data->result44 + $data->result45 + $data->result46 >= 2) {
                            $evaluation19 = "O";
                            $evaluationshow19 = 1;
                        } else {
                            $evaluation19 = "X";
                            $evaluationshow19 = 0;
                        }
                        $cat3 = ($evaluationshow16 + $evaluationshow17 + $evaluationshow18 + $data->result42 + $data->result43 + $evaluationshow19) / 6;
                        if ($cat3 * 100 >= 85) {
                            return "High - " . ROUND($cat3 * 100) . "%";
                        } elseif ($cat3 * 100 >= 70) {
                            return "Medium - " . ROUND($cat3 * 100) . "%";
                        } elseif ($cat3 * 100 < 70) {
                            return "Low - " . ROUND($cat3 * 100) . "%";
                        }
                    })
                    ->editColumn('grade4', function ($data) {
                        $cat4 = ($data->result47 + $data->result48) / 2;
                        if ($cat4 * 100 >= 85) {
                            return "High - " . ROUND($cat4 * 100) . "%";
                        } elseif ($cat4 * 100 >= 70) {
                            return "Medium - " . ROUND($cat4 * 100) . "%";
                        } elseif ($cat4 * 100 < 70) {
                            return "Low - " . ROUND($cat4 * 100) . "%";
                        }
                    })
                    ->editColumn('grade5', function ($data) {
                        return '-';
                    })
                    ->editColumn('grade6', function ($data) {
                        if ($data->result49 == 1) {
                            return "High - " . ROUND($data->kpi49) . "%";
                        } else {
                            return "Low - " . ROUND($data->kpi49) . "%";
                        }
                    })
                    ->editColumn('grade7', function ($data) {
                        if ($data->result50 + $data->result51 >= 2) {
                            $evaluation25 = "O";
                            $evaluationshow25 = 1;
                        } else {
                            $evaluation25 = "X";
                            $evaluationshow25 = 0;
                        }
                        $cat7 = ($evaluationshow25 + $data->result52) / 3;
                        if ($cat7 * 100 >= 85) {
                            return "High - " . ROUND($cat7 * 100) . "%";
                        } elseif ($cat7 * 100 >= 70) {
                            return "Medium - " . ROUND($cat7 * 100) . "%";
                        } elseif ($cat7 * 100 < 70) {
                            return "Low - " . ROUND($cat7 * 100) . "%";
                        }
                    })
                    ->addColumn('finalgrade', function ($data) use ($data_user) {
                        $evaluation1 = $data->result1;
                        if ($data->result3 + $data->result5 + $data->result7 >= 2) {
                            $evaluation2 = "O";
                            $evaluationshow2 = 1;
                        } else {
                            $evaluation2 = "X";
                            $evaluationshow2 = 0;
                        }
                        $evaluation13 = $data->result25;
                        if ($data->result20 + $data->result21 + $data->result22 >= 2) {
                            $evaluation14 = "O";
                            $evaluationshow14 = 1;
                        } else {
                            $evaluation14 = "X";
                            $evaluationshow14 = 0;
                        }
                        if ($data->result26 + $data->result27 >= 2) {
                            $evaluation16 = "O";
                            $evaluationshow16 = 1;
                        } else {
                            $evaluation16 = "X";
                            $evaluationshow16 = 0;
                        }
                        if ($data->result33 + $data->result35 + $data->result37 + $data->result39 >= 3) {
                            $evaluation17 = "O";
                            $evaluationshow17 = 1;
                        } else {
                            $evaluation17 = "X";
                            $evaluationshow17 = 0;
                        }
                        if ($data->result28 + $data->result29 + $data->result31 >= 2) {
                            $evaluation18 = "O";
                            $evaluationshow18 = 1;
                        } else {
                            $evaluation18 = "X";
                            $evaluationshow18 = 0;
                        }
                        if ($data->result44 + $data->result45 + $data->result46 >= 2) {
                            $evaluation19 = "O";
                            $evaluationshow19 = 1;
                        } else {
                            $evaluation19 = "X";
                            $evaluationshow19 = 0;
                        }
                        if ($data->result50 + $data->result51 >= 2) {
                            $evaluation25 = "O";
                            $evaluationshow25 = 1;
                        } else {
                            $evaluation25 = "X";
                            $evaluationshow25 = 0;
                        }
                        $finalcat = ($evaluation1 + $evaluationshow2 + $data->result11 + $data->result12 + $data->result13 + $data->result14 + $data->result15 + $data->result16 + $data->result17 + $data->result19 + $data->result49 + $evaluation13 + $evaluationshow14 + $evaluationshow16 + $evaluationshow17 + $evaluationshow18 + $data->result42 + $data->result43 + $evaluationshow19 + $data->result47 + $data->result48 + $data->result49 + $evaluationshow25 + $data->result52) / 24;

                        if ($finalcat * 100 >= 85) {
                            return "High - " . ROUND($finalcat * 100) . "%";
                        } elseif ($finalcat * 100 >= 70) {
                            return "Medium - " . ROUND($finalcat * 100) . "%";
                        } elseif ($finalcat * 100 < 70) {
                            return "Low - " . ROUND($finalcat * 100) . "%";
                        }
                    })
                    ->addColumn('action', function ($data) use ($data_user) {
                        $button = '<div class="btn-group">';
                        $button .= '<button type="button" name="edit" id="' . $data->id . '" class="preview btn btn-primary btn-sm"><i title="Periksa Data" class="fas fa-search"></i></button> &nbsp;';
                        if (auth()->user()->can('kpi_input')) {
                            if ($data_user->id == $data->IDUser) {
                                $button .= '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-success btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button> &nbsp;';
                            }
                            $button .= '<button type="button" name="delete" id="' . $data->id . '_' . $data->periode . '_' . $data->IDKantor . '" class="delete btn btn-danger btn-sm"><i title="Rubah Data" class="fas fa-trash"></i></button>';
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } else {
                return datatables()->of(DB::table('datakpi_result')
                    ->leftjoin('kantors', 'kantors.id', '=', 'datakpi_result.IDKantor')
                    ->select('kantors.nama', 'datakpi_result.IDKantor', 'datakpi_result.*', DB::raw('DATE_FORMAT(datakpi_result.periode,"%M %Y") as periodik'))
                    ->where('datakpi_result.deleted', '0')
                    ->where('IDKantor', $data_user->IDKantor))
                    ->filter(function ($data) use ($request) {
                        if (!empty ($request->judul)) {
                            $data->where('periode', $request->judul . "-01");
                        }

                        if (!empty ($request->lokasi)) {
                            $data->where('IDKantor', $request->lokasi);
                        }
                    })
                    ->editColumn('grade1', function ($data) {
                        $evaluation1 = $data->result1;
                        if ($data->result3 + $data->result5 + $data->result7 >= 2) {
                            $evaluation2 = "O";
                            $evaluationshow2 = 1;
                        } else {
                            $evaluation2 = "X";
                            $evaluationshow2 = 0;
                        }
                        $cat1 = ($evaluation1 + $evaluationshow2 + $data->result11 + $data->result12 + $data->result13 + $data->result14 + $data->result15 + $data->result16 + $data->result17 + $data->result19 + $data->result49) / 12;
                        if ($cat1 * 100 >= 85) {
                            return "High - " . ROUND($cat1 * 100) . "%";
                        } elseif ($cat1 * 100 >= 70) {
                            return "Medium - " . ROUND($cat1 * 100) . "%";
                        } elseif ($cat1 * 100 < 70) {
                            return "Low - " . ROUND($cat1 * 100) . "%";
                        }
                    })
                    ->editColumn('grade2', function ($data) {
                        $evaluation13 = $data->result25;
                        if ($data->result20 + $data->result21 + $data->result22 >= 2) {
                            $evaluation14 = "O";
                            $evaluationshow14 = 1;
                        } else {
                            $evaluation14 = "X";
                            $evaluationshow14 = 0;
                        }
                        $cat2 = ($evaluation13 + $evaluationshow14) / 2;
                        if ($cat2 * 100 >= 85) {
                            return "High - " . ROUND($cat2 * 100) . "%";
                        } elseif ($cat2 * 100 >= 70) {
                            return "Medium - " . ROUND($cat2 * 100) . "%";
                        } elseif ($cat2 * 100 < 70) {
                            return "Low - " . ROUND($cat2 * 100) . "%";
                        }
                    })
                    ->editColumn('grade3', function ($data) {
                        if ($data->result26 + $data->result27 >= 2) {
                            $evaluation16 = "O";
                            $evaluationshow16 = 1;
                        } else {
                            $evaluation16 = "X";
                            $evaluationshow16 = 0;
                        }
                        if ($data->result33 + $data->result35 + $data->result37 + $data->result39 >= 3) {
                            $evaluation17 = "O";
                            $evaluationshow17 = 1;
                        } else {
                            $evaluation17 = "X";
                            $evaluationshow17 = 0;
                        }
                        if ($data->result28 + $data->result29 + $data->result31 >= 2) {
                            $evaluation18 = "O";
                            $evaluationshow18 = 1;
                        } else {
                            $evaluation18 = "X";
                            $evaluationshow18 = 0;
                        }
                        if ($data->result44 + $data->result45 + $data->result46 >= 2) {
                            $evaluation19 = "O";
                            $evaluationshow19 = 1;
                        } else {
                            $evaluation19 = "X";
                            $evaluationshow19 = 0;
                        }
                        $cat3 = ($evaluationshow16 + $evaluationshow17 + $evaluationshow18 + $data->result42 + $data->result43 + $evaluationshow19) / 6;
                        if ($cat3 * 100 >= 85) {
                            return "High - " . ROUND($cat3 * 100) . "%";
                        } elseif ($cat3 * 100 >= 70) {
                            return "Medium - " . ROUND($cat3 * 100) . "%";
                        } elseif ($cat3 * 100 < 70) {
                            return "Low - " . ROUND($cat3 * 100) . "%";
                        }
                    })
                    ->editColumn('grade4', function ($data) {
                        $cat4 = ($data->result47 + $data->result48) / 2;
                        if ($cat4 * 100 >= 85) {
                            return "High - " . ROUND($cat4 * 100) . "%";
                        } elseif ($cat4 * 100 >= 70) {
                            return "Medium - " . ROUND($cat4 * 100) . "%";
                        } elseif ($cat4 * 100 < 70) {
                            return "Low - " . ROUND($cat4 * 100) . "%";
                        }
                    })
                    ->editColumn('grade5', function ($data) {
                        return '-';
                    })
                    ->editColumn('grade6', function ($data) {
                        if ($data->result49 == 1) {
                            return "High - " . ROUND($data->result49) . "%";
                        } else {
                            return "Low - " . ROUND($data->result49) . "%";
                        }
                    })
                    ->editColumn('grade7', function ($data) {
                        if ($data->result50 + $data->result51 >= 2) {
                            $evaluation25 = "O";
                            $evaluationshow25 = 1;
                        } else {
                            $evaluation25 = "X";
                            $evaluationshow25 = 0;
                        }
                        $cat7 = ($evaluationshow25 + $data->result52) / 3;
                        if ($cat7 * 100 >= 85) {
                            return "High - " . ROUND($cat7 * 100) . "%";
                        } elseif ($cat7 * 100 >= 70) {
                            return "Medium - " . ROUND($cat7 * 100) . "%";
                        } elseif ($cat7 * 100 < 70) {
                            return "Low - " . ROUND($cat7 * 100) . "%";
                        }
                    })
                    ->addColumn('finalgrade', function ($data) use ($data_user) {
                        $evaluation1 = $data->result1;
                        if ($data->result3 + $data->result5 + $data->result7 >= 2) {
                            $evaluation2 = "O";
                            $evaluationshow2 = 1;
                        } else {
                            $evaluation2 = "X";
                            $evaluationshow2 = 0;
                        }
                        $evaluation13 = $data->result25;
                        if ($data->result20 + $data->result21 + $data->result22 >= 2) {
                            $evaluation14 = "O";
                            $evaluationshow14 = 1;
                        } else {
                            $evaluation14 = "X";
                            $evaluationshow14 = 0;
                        }
                        if ($data->result26 + $data->result27 >= 2) {
                            $evaluation16 = "O";
                            $evaluationshow16 = 1;
                        } else {
                            $evaluation16 = "X";
                            $evaluationshow16 = 0;
                        }
                        if ($data->result33 + $data->result35 + $data->result37 + $data->result39 >= 3) {
                            $evaluation17 = "O";
                            $evaluationshow17 = 1;
                        } else {
                            $evaluation17 = "X";
                            $evaluationshow17 = 0;
                        }
                        if ($data->result28 + $data->result29 + $data->result31 >= 2) {
                            $evaluation18 = "O";
                            $evaluationshow18 = 1;
                        } else {
                            $evaluation18 = "X";
                            $evaluationshow18 = 0;
                        }
                        if ($data->result44 + $data->result45 + $data->result46 >= 2) {
                            $evaluation19 = "O";
                            $evaluationshow19 = 1;
                        } else {
                            $evaluation19 = "X";
                            $evaluationshow19 = 0;
                        }
                        if ($data->result50 + $data->result51 >= 2) {
                            $evaluation25 = "O";
                            $evaluationshow25 = 1;
                        } else {
                            $evaluation25 = "X";
                            $evaluationshow25 = 0;
                        }
                        $finalcat = ($evaluation1 + $evaluationshow2 + $data->result11 + $data->result12 + $data->result13 + $data->result14 + $data->result15 + $data->result16 + $data->result17 + $data->result19 + $data->result49 + $evaluation13 + $evaluationshow14 + $evaluationshow16 + $evaluationshow17 + $evaluationshow18 + $data->result42 + $data->result43 + $evaluationshow19 + $data->result47 + $data->result48 + $data->result49 + $evaluationshow25 + $data->result52) / 24;

                        if ($finalcat * 100 >= 85) {
                            return "High - " . ROUND($finalcat * 100) . "%";
                        } elseif ($finalcat * 100 >= 70) {
                            return "Medium - " . ROUND($finalcat * 100) . "%";
                        } elseif ($finalcat * 100 < 70) {
                            return "Low - " . ROUND($finalcat * 100) . "%";
                        }
                    })
                    ->addColumn('action', function ($data) use ($data_user) {
                        $button = '<div class="btn-group">';
                        $button .= '<button type="button" name="preivew" id="' . $data->id . '" class="preview btn btn-primary btn-sm"><i title="Periksa Data" class="fas fa-search"></i></button> &nbsp;';
                        if (auth()->user()->can('kpi_input')) {
                            if ($data_user->id == $data->IDUser) {
                                $button .= '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-success btn-sm"><i title="Rubah Data" class="fas fa-edit"></i></button> &nbsp;';
                            }
                            $button .= '<button type="button" name="delete" id="' . $data->id . '_' . $data->periode . '_' . $data->IDKantor . '" class="delete btn btn-danger btn-sm"><i title="Hapus Data" class="fas fa-trash"></i></button>';
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
        }
        if ($data_user->IDKantor == 1) {
            $kantor = DB::table('kantors')->orderBy('nama', 'asc')->get();
        } else {
            $kantor = DB::table('kantors')->orderBy('nama', 'asc')->where('id', $data_user->IDKantor)->get();
        }
        return view('datakpi', ['kantor' => $kantor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formkpi');
    }
    public function createaftersales()
    {
        return view('formkpiaftersales');
    }
    public function createvehdev()
    {
        return view('formkpitradein');
    }
    public function createsalesv2()
    {
        $daftarkpi1 = DB::table('fields')->where('version', 2)->get();
        $daftarkpi = json_encode($daftarkpi1);
        return view('formkpiv2', ['daftarkpi' => $daftarkpi]);
    }
    public function createaftersalesv2()
    {
        return view('formkpiaftersalesv2');
    }
    public function createtradeinv2()
    {
        return view('formkpitradeinv2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $rules = array(
                'kategori' => 'required',
                'periode' => 'required',
                'formkpi.*' => 'required',
            );
            if ($request->kategori == "1-1") {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                    'formkpi.0.required' => 'KPI Adv Demand & Supply mg - AO Report Establishment belum diisi',
                    'formkpi.1.required' => 'KPI Adv Demand & Supply mg - Monthly SPK Achievement (vs Target) belum diisi',
                    'formkpi.2.required' => 'KPI Adv Demand & Supply mg - Stok Matching Ratio belum diisi',
                    'formkpi.3.required' => 'KPI Adv Demand & Supply mg - Monthly Sales Target Achievement belum diisi',
                    'formkpi.4.required' => 'KPI PSP Sales - Net Promoter Score (NPS) Sales belum diisi',
                    'formkpi.5.required' => 'KPI PSP Sales - Gross Profit/Unit(Vehicle, TCO, F&J Commission) belum diisi',
                    'formkpi.6.required' => 'KPI PSP Sales - TCO Installation Ratio belum diisi',
                    'formkpi.7.required' => 'KPI PSP Sales - Cash With Insurance belum diisi',
                    'formkpi.8.required' => 'KPI PSP Sales - Toyota Insurance Share belum diisi',
                    'formkpi.9.required' => 'KPI PSP Sales - Credit Ratio Sales belum diisi',
                    'formkpi.10.required' => 'KPI PSP Sales - MSCP belum diisi',
                    'formkpi.11.required' => 'KPI PSP Sales - M Quote Utilization Rate belum diisi',
                    'formkpi.12.required' => 'KPI PSP Sales - Insurance Renewal belum diisi',
                    'formkpi.13.required' => 'KPI People Development - Staff Productivity belum diisi',
                    'formkpi.14.required' => 'KPI People Development - Salesperson Turn over Ratio belum diisi',
                    'formkpi.15.required' => 'KPI Trade In - Trade In Ratio belum diisi',
                    'formkpi.16.required' => 'KPI Trade In - Appraisal Ratio to Prospect belum diisi',
                    'formkpi.17.required' => 'KPI Trade In - Deal Ratio to price Offer belum diisi',
                ];
            } elseif ($request->kategori == "1-2") {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                    'formkpi.0.required' => 'KPI Vehicle Deliver - 1st Service Booking Rate belum diisi',
                    'formkpi.1.required' => 'KPI Vehicle Deliver - Awareness Rate:T-care, T-intouch, insurance belum diisi',
                    'formkpi.2.required' => 'KPI Vehicle Deliver - Survey Customer Interest:T-Care, T-intouch belum diisi',
                    'formkpi.3.required' => 'KPI Vehicle Deliver - T-Intouch Activation Rate belum diisi',
                ];
            } elseif ($request->kategori == "1-3") {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                    'formkpi.0.required' => 'KPI Customer Database - Single ID (No. of Customer Valid) belum diisi',
                    'formkpi.1.required' => 'KPI Customer Database - Database Completeness belum diisi',
                    'formkpi.2.required' => 'KPI Customer Database - Database Contact Ratio (as Cust. Journey) belum diisi',
                    'formkpi.3.required' => 'KPI Retention - Net Promoter Score (NPS) After Sales belum diisi',
                    'formkpi.4.required' => 'KPI Retention - Revenue per Service (Service, parts) belum diisi',
                    'formkpi.5.required' => 'KPI Retention - Service Ratio(1st - 7th service) belum diisi',
                    'formkpi.6.required' => 'KPI General Repair (GR) - Next Service Booking Ratio belum diisi',
                    'formkpi.7.required' => 'KPI General Repair (GR) - Up Selling Ratio (TMO) belum diisi',
                    'formkpi.8.required' => 'KPI General Repair (GR) - Cross Selling Ratio belum diisi',
                    'formkpi.9.required' => 'KPI General Repair (GR) - Realitation of Appraisal belum diisi',
                    'formkpi.10.required' => 'KPI General Repair (GR) - Service Lead Time belum diisi',
                    'formkpi.11.required' => 'KPI Body & Paint (BP) - Ontime Delivery Ratio (OTD) belum diisi',
                    'formkpi.12.required' => 'KPI Body & Paint (BP) - Return Job (RTJ) belum diisi',
                ];
            } elseif ($request->kategori == "2-1") {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                    'formkpi.0.required' => 'Net Promoter Score (NPS) Sales belum diisi',
                    'formkpi.1.required' => 'GP Total Sales (per unit) (mio) belum diisi',
                    'formkpi.2.required' => 'GP Total Sales Rasio belum diisi',
                    'formkpi.3.required' => 'GP Vehicle (per unit) (mio) belum diisi',
                    'formkpi.4.required' => 'GP Vehicle Rasio belum diisi',
                    'formkpi.5.required' => 'GP TCO (per unit) (mio) belum diisi',
                    'formkpi.6.required' => 'GP TCO Rasio belum diisi',
                    'formkpi.7.required' => 'F&I Commision (per unit) (mio) belum diisi',
                    'formkpi.8.required' => 'Total Revenue per Unit (Vehicle + TCO) (mio) belum diisi',
                    'formkpi.9.required' => 'Total Revenue Amount (Vehicle + TCO) (mio) belum diisi',
                    'formkpi.10.required' => 'TCO Installation Rasio belum diisi',
                    'formkpi.11.required' => 'Toyota Insurance Share belum diisi',
                    'formkpi.12.required' => 'Credit Rasio belum diisi',
                    'formkpi.13.required' => 'Market Share Credit Portion (MSCP) belum diisi',
                    'formkpi.14.required' => 'M-Quote utilization rasio belum diisi',
                    'formkpi.15.required' => 'Monthly SPK Achievement (vs Target Rundown) belum diisi',
                    'formkpi.16.required' => 'AO Report Establishment belum diisi',
                    'formkpi.17.required' => 'Outstanding Matching to target Ratio (on AO25 Achievement) belum diisi',
                    'formkpi.18.required' => 'Monthly Sales Target Achievement (Target Operation) belum diisi',
                    'formkpi.19.required' => 'Awareness Rate - T-Care belum diisi',
                    'formkpi.20.required' => 'Awareness Rate - T-intouch belum diisi',
                    'formkpi.21.required' => 'Awareness Rate - Insurance belum diisi',
                    'formkpi.22.required' => 'Survey Customer Interest - T-Care belum diisi',
                    'formkpi.23.required' => 'Survey Customer Interest - T-Intouch belum diisi',
                    'formkpi.24.required' => 'T-Intouch Activation Rate belum diisi',
                ];
            } elseif ($request->kategori == "2-2") {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                    'formkpi.0.required' => 'Net Promoter Score (NPS) Aftersales GR belum diisi',
                    'formkpi.1.required' => 'Net Promoter Score (NPS) Aftersales BP belum diisi',
                    'formkpi.2.required' => 'Service Ratio (1st - 7th Service) - 1st Service T-care Lite Rate (LCGC) belum diisi',
                    'formkpi.3.required' => 'Service Ratio (1st - 7th Service) - 1st Service T-care Rate (non LCGC) belum diisi',
                    'formkpi.4.required' => 'Service Ratio (1st - 7th Service) - PM Rate T-Care Lite 2nd Service (LCGC) belum diisi',
                    'formkpi.5.required' => 'Service Ratio (1st - 7th Service) - PM Rate T-Care 2nd-3rd Service (Non LCGC) belum diisi',
                    'formkpi.6.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Service per unit (mio) belum diisi',
                    'formkpi.7.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Service Ratio belum diisi',
                    'formkpi.8.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Parts per unit (mio) belum diisi',
                    'formkpi.9.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP GR Parts Ratio belum diisi',
                    'formkpi.10.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP Service per Unit (mio) belum diisi',
                    'formkpi.11.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP Service Ratio belum diisi',
                    'formkpi.12.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP parts per Unit (mio) belum diisi',
                    'formkpi.13.required' => 'Gross Profit/Unit/Ratio (service, parts) - GP BP parts Ratio belum diisi',
                    'formkpi.14.required' => 'Total Revenue per Unit (Parts + Service) (mio) belum diisi',
                    'formkpi.15.required' => 'Total Revenue Amount (Parts + Service) (mio) belum diisi',
                    'formkpi.16.required' => 'Service Lead Time belum diisi',
                    'formkpi.17.required' => 'Up Selling ratio (TMO) belum diisi',
                    'formkpi.18.required' => 'Cross Selling ratio (include BP) - Battery belum diisi',
                    'formkpi.19.required' => 'Cross Selling ratio (include BP) - Car Care belum diisi',
                    'formkpi.20.required' => 'Cross Selling ratio (include BP) - Tire belum diisi',
                    'formkpi.21.required' => 'Ontime Delivery Ratio (OTD) belum diisi',
                    'formkpi.22.required' => 'Return Job (RTJ) belum diisi',
                ];
            } elseif ($request->kategori == "2-3") {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                    'formkpi.0.required' => 'Trade In Ratio belum diisi',
                    'formkpi.1.required' => 'Staff Productivity - Sales (Unit/salesperson) belum diisi',
                    'formkpi.2.required' => 'Staff Productivity - Aftersales (Overall productivity) belum diisi',
                    'formkpi.3.required' => 'Salesperson Turn Over Ratio belum diisi',
                ];
            } else {
                $messages = [
                    'required' => ':attribute harus diisi',
                    'min' => ':attribute harus diisi minimal :min karakter',
                    'max' => ':attribute harus diisi maksimal :max karakter',
                    'numeric' => ':attribute harus diisi angka',
                    'area.required' => 'area / tujuan disposisi wajib diisi',
                    'periode.required' => 'Preiode KPI harap diisi',
                ];
            }

            $error = Validator::make($request->all(), $rules, $messages);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $data_user = auth::user();
            $datakpi = $request->formkpi;
            $periode = $request->periode;
            $catatan = $request->catatan;
            $tanggal = date('Y-m-d');
            $format_tanggal = date('F Y', strtotime($periode));
            if ($request->kategori != "all") {
                $periodeset = $periode . '-01'; //set tanggal periode
                $kategori = explode("-", $request->kategori);
                //cek KPI
                $cek = DB::table('datakpi')->where('IDUser', $data_user->id)->where('periode', $periodeset)->where('deleted', 0)->where('version', $kategori['0'])->where('kategori', $kategori['1'])->count();
                if ($cek > 0) {
                    return response()->json(['duplicate' => 'Anda sudah mengisi KPI periode ' . $format_tanggal . ' ini, silahkan cek di data KPI. Terima kasih']);
                }
                //cek result
                $cek2 = DB::table('datakpi_result')->where('IDUser', $data_user->id)->where('periode', $periodeset)->where('deleted', 0)->count();
                if ($cek2 == 0) {
                    $create_result = array(
                        'IDUser' => $data_user->id,
                        'IDKantor' => $data_user->IDKantor,
                        'periode' => $periodeset,
                    );

                    DB::table('datakpi_result')->insert($create_result);
                }
            } else {
                $periodeset = $periode;
                DB::table('datakpi')->where('periode', $request->periode)->where('IDKantor', $data_user->IDKantor)->update(['deleted' => 1]);
                DB::table('datakpi_result')->where('periode', $request->periode)->where('IDKantor', $data_user->IDKantor)->update(['deleted' => 1]);
                $create_result = array(
                    'IDUser' => $data_user->id,
                    'IDKantor' => $data_user->IDKantor,
                    'periode' => $periodeset,
                );

                DB::table('datakpi_result')->insert($create_result);
                $iduniq = 86;
            }

            for ($count = 0; $count < count($datakpi); $count++) {
                if ($request->kategori != "all") {
                    $tanggal_sekarang = $periode . "-01";
                    $tanggal_sebelumnya = date('Y-m-d', strtotime('-1 month', strtotime($tanggal_sekarang)));
                    if ($kategori['1'] == 1) {
                        $nomorresult = $count + 1;
                    } elseif ($kategori['1'] == 2) {
                        $nomorresult = $count + 26;
                    } elseif ($kategori['1'] == 3) {
                        $nomorresult = $count + 49;
                    }
                    $nomorkpi = $count + 1;
                    $cek_kpi = DB::table('fields')->where('version', 2)->where('id_uniq', $kategori['1'] . "-" . $nomorkpi)->select('target')->first();
                    if ($kategori['1'] . "-" . $nomorkpi == "2-17") {
                        $isi = explode(":", $datakpi[$count]);
                        $target = $cek_kpi->target;
                        $isinya = $isi[0];
                        if ($cek_kpi->target > $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 1;
                        } elseif ($cek_kpi->target <= $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 0;
                        }
                    } else {
                        $isinya = $datakpi[$count];
                        if ($cek_kpi->target == 0) {
                            $target = 0;
                            $evaluation = 1;
                        } elseif ($cek_kpi->target > $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 0;
                        } elseif ($cek_kpi->target <= $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 1;
                        } else {
                            $target = $cek_kpi->target;
                            $evaluation = 0;
                        }
                    }
                    $cek_kpi_sebelumnya = DB::table('datakpi')->where('version', 2)->where('id_uniq', $kategori['1'] . "-" . $nomorkpi)->where('periode', $tanggal_sebelumnya)->select('nilai')->first();
                    $cek_kpi_sebelumnya_hitung = DB::table('datakpi')->where('version', 2)->where('id_uniq', $kategori['1'] . "-" . $nomorkpi)->where('periode', $tanggal_sebelumnya)->select('nilai')->count();
                    $version = $kategori['0'];
                    $kategoriset = $kategori['1'];
                    $id_uniq = $kategori['1'] . "-" . $nomorkpi;
                } elseif ($request->kategori >= 1) {
                    $tanggal_sekarang = $request->periode;
                    $tanggal_sebelumnya = date('Y-m-d', strtotime('-1 month', strtotime($tanggal_sekarang)));
                    $nomorresult = $count + 1;
                    $nomorkpi = $count + 1;
                    $iduniq = $iduniq + 1;
                    $cek_kpi = DB::table('fields')->where('version', 2)->where('id', $iduniq)->select('target', 'id_uniq', 'version', 'kategori')->first();
                    if ($iduniq == 128) {
                        $isi = explode(":", $datakpi[$count]);
                        $target = $cek_kpi->target;
                        $isinya = $isi[0];
                        if ($cek_kpi->target > $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 1;
                        } elseif ($cek_kpi->target <= $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 0;
                        }
                    } else {
                        $isinya = $datakpi[$count];
                        if ($cek_kpi->target == 0) {
                            $target = 0;
                            $evaluation = 1;
                        } elseif ($cek_kpi->target > $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 0;
                        } elseif ($cek_kpi->target <= $isinya) {
                            $target = $cek_kpi->target;
                            $evaluation = 1;
                        } else {
                            $target = $cek_kpi->target;
                            $evaluation = 0;
                        }
                    }
                    $cek_kpi_sebelumnya = DB::table('datakpi')->where('version', 2)->where('id_uniq', $cek_kpi->id_uniq)->where('periode', $tanggal_sebelumnya)->select('nilai')->first();
                    $cek_kpi_sebelumnya_hitung = DB::table('datakpi')->where('version', 2)->where('id_uniq', $cek_kpi->id_uniq)->where('periode', $tanggal_sebelumnya)->select('nilai')->count();
                    $version = $cek_kpi->version;
                    $kategoriset = $cek_kpi->kategori;
                    $id_uniq = $cek_kpi->id_uniq;
                }



                if ($cek_kpi_sebelumnya_hitung == 0) {
                    $growth = 0;
                } else {
                    if ($isinya > $cek_kpi_sebelumnya->nilai) {
                        $growth = 1;
                    } elseif ($isinya <= $cek_kpi_sebelumnya->nilai) {
                        $growth = 0;
                    }
                }
                $data2 = array(
                    'tanggal' => $tanggal,
                    'periode' => $periodeset,
                    'IDUser' => $data_user->id,
                    'IDField' => $nomorkpi,
                    'IDKantor' => $data_user->IDKantor,
                    'nilai' => $isinya,
                    'target' => $target,
                    'evaluation' => $evaluation,
                    'berkembang' => $growth,
                    'deleted' => 0,
                    'version' => $version,
                    'kategori' => $kategoriset,
                    'id_uniq' => $id_uniq,
                );
                $insert_data2[] = $data2;

                $form_data_result = array(
                    'kpi' . $nomorresult => $datakpi[$count],
                    'target' . $nomorresult => $target,
                    'result' . $nomorresult => $evaluation,
                );
                DB::table('datakpi_result')->where('periode', $periodeset)->where('IDUser', $data_user->id)->update($form_data_result);


            }
            DB::table('datakpi')->insert($insert_data2);

            //analisa setelah input berhasil
            $a = DB::table('datakpi_result')->where('periode', $periodeset)->where('IDUser', $data_user->id)->first();
            $evaluation1 = $a->result1;
            if ($a->result3 + $a->result5 + $a->result7 >= 2) {
                $evaluation2 = "O";
                $evaluationshow2 = 1;
            } else {
                $evaluation2 = "X";
                $evaluationshow2 = 0;
            }
            $evaluation13 = $a->result25;
            if ($a->result20 + $a->result21 + $a->result22 >= 2) {
                $evaluation14 = "O";
                $evaluationshow14 = 1;
            } else {
                $evaluation14 = "X";
                $evaluationshow14 = 0;
            }
            if ($a->result26 + $a->result27 >= 2) {
                $evaluation16 = "O";
                $evaluationshow16 = 1;
            } else {
                $evaluation16 = "X";
                $evaluationshow16 = 0;
            }
            if ($a->result33 + $a->result35 + $a->result37 + $a->result39 >= 3) {
                $evaluation17 = "O";
                $evaluationshow17 = 1;
            } else {
                $evaluation17 = "X";
                $evaluationshow17 = 0;
            }
            if ($a->result28 + $a->result29 + $a->result31 >= 2) {
                $evaluation18 = "O";
                $evaluationshow18 = 1;
            } else {
                $evaluation18 = "X";
                $evaluationshow18 = 0;
            }
            if ($a->result44 + $a->result45 + $a->result46 >= 2) {
                $evaluation19 = "O";
                $evaluationshow19 = 1;
            } else {
                $evaluation19 = "X";
                $evaluationshow19 = 0;
            }
            if ($a->result50 + $a->result51 >= 2) {
                $evaluation25 = "O";
                $evaluationshow25 = 1;
            } else {
                $evaluation25 = "X";
                $evaluationshow25 = 0;
            }
            $finalcat = ($evaluation1 + $evaluationshow2 + $a->result11 + $a->result12 + $a->result13 + $a->result14 + $a->result15 + $a->result16 + $a->result17 + $a->result19 + $a->result49 + $evaluation13 + $evaluationshow14 + $evaluationshow16 + $evaluationshow17 + $evaluationshow18 + $a->result42 + $a->result43 + $evaluationshow19 + $a->result47 + $a->result48 + $a->result49 + $evaluationshow25 + $a->result52) / 24;

            $form_data_result2 = array(
                'kpiproses' => $finalcat * 100,
            );
            DB::table('datasummary')->where('periode', $periodeset)->where('IDKantor', $data_user->IDKantor)->update($form_data_result2);
            DB::commit();
            return response()->json(['success' => 'Data KPI berhasil disimpan, silahkan periksa data anda']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error dari user id ' . Auth::id() . ' pada RequestOrderController@update : ' . $e->getMessage());
            return response()->json(['failed' => 'Message: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('datakpi_result')->where('id', $id)->first();
        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $split = explode('_', $id);
        $data = DB::table('datakpi')->where('periode', $split[0])->where('IDKantor', $split[1])->get();
        $kantor = DB::table('kantors')->orderBy('nama', 'asc')->get();
        return view('editkpi', ['kantor' => $kantor, 'data' => $data]);
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
        $split = explode('_', $id);
        DB::table('datakpi')->where('periode', $split[1])->where('IDKantor', $split[2])->update(['deleted' => 1]);
        DB::table('datakpi_result')->where('periode', $split[1])->where('IDKantor', $split[2])->update(['deleted' => 1]);
        return response()->json(['success' => 'Data berhasil dihapus.']);
    }
    public function exportexcel(request $request)
    {
        $data_user = Auth::user();
        $fid = $request->id;
        $fperiode = date("F Y", strtotime($request->periode));
        libxml_use_internal_errors(true);
        $nama_file = 'Data KPI Periode ' . $fperiode . '.xlsx';
        return Excel::download(new KPIExport($fid), $nama_file);
    }
}
