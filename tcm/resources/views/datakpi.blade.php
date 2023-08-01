@extends('adminlte::page')

@section('title', 'TCM - Data KPI')

@section('content_header')
    <h3>Data KPI</h3>
@stop


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <form id="sample_form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input  type="month" class="form-control datea" name="search_periode" id="search_periode" placeholder="Periode">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                        <select class="select2" name="search_kantor" id="search_kantor"  style="width: 100%;">
                            @if(auth()->user()->IDKantor == 1)<option value=''>Semua Cabang</option> @endif
                            @foreach($kantor as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" id="filter_button" class="btn btn-primary percent"><i class="fas fa-search"></i></button>
                            <button type="button" id="reset_filter_button" class="btn percent"><i class="fas fa-undo"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body table-responsive p-0">
                <span id="form_result_save"></span>
                    <div align="right">
                        <!-- <button type="button" name="create_barang" id="create_barang" class="btn btn-info btn-sm">Tambah Nama Barang</button> -->
                    </div>
                    <br>
                    <table id="user_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Area</th>
                                <th>Periode</th>
                                <th>PSP Sales</th>
                                <th>Dlvr Exp</th>
                                <th>PSP Serv GR</th>
                                <th>PSP Serv BP</th>
                                <th>Cust Db</th>
                                <th>Trade In</th>
                                <th>Manpower</th>
                                <th>Final Grade</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-sm">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data ini ?</h4>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="preview">
    <form role="form" id="formdt" method='post' enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="kategori" value="all">
    <input type="hidden" name="periode" id="periode">
    <input type="hidden" name="catatan" id="catatan">
        <div class="modal-dialog modal-xxl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Preview KPI</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">PSP Sales (15 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Net Promoter Score (NPS) Sales</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi1" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>GP Total Sales (per unit)  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi2" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>GP Total Sales Rasio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi3" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>GP Vehicle (per unit)  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi4" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>GP Vehicle Rasio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi5" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>GP TCO (per unit)  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi6" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>GP TCO Rasio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi7" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>F&I Commision (per unit)  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi8" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Total Revenue per Unit  (Vehicle + TCO) (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi9" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Total Revenue Amount (Vehicle + TCO) (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi10" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>TCO Installation Rasio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi11" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Toyota Insurance Share</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi12" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Credit Rasio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi13" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Market Share Credit Portion (MSCP)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi14" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>M-Quote utilization rasio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi15" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Advanced Demand & Supply Management (4 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Monthly SPK Achievement (vs Target Rundown)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi16" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>AO Report Establishment</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi17" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Outstanding Matching to target Ratio (on AO25 Achievement) </label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi18" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Monthly Sales Target Achievement (Target Operation)</label>
                                                <input type="text" class="modalview form-control-plaintext" name="formkpi[]" id="kpi19" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Delivery Explanation (6 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Awareness Rate - T-Care</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi20" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Awareness Rate - T-intouch</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi21" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Awareness Rate - Insurance</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi22" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Survey Customer Interest - T-Care</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi23" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Survey Customer Interest - T-Intouch</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi24" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>T-Intouch Activation Rate</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi25" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">PSP Service (16 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Net Promoter Score (NPS) Aftersales GR</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi26" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Net Promoter Score (NPS) Aftersales BP</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi27" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Service Ratio (1st - 7th Service) - 1st Service T-care Lite Rate (LCGC)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi28" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Service Ratio (1st - 7th Service) - 1st Service T-care Rate (non LCGC)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi29" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Service Ratio (1st - 7th Service) - PM Rate T-Care Lite 2nd Service (LCGC)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi30" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Service Ratio (1st - 7th Service) - PM Rate T-Care 2nd-3rd Service (Non LCGC)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi31" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP GR Service per unit  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi32" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP GR Service Ratio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi33" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP GR Parts per unit  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi34" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP GR Parts Ratio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi35" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP BP Service per Unit (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi36" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP BP Service Ratio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi37" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP BP parts per Unit (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi38" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Gross Profit/Unit/Ratio (service, parts) - GP BP parts Ratio</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi39" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Total Revenue per Unit  (Parts + Service) (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi40" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Total Revenue Amount (Parts + Service)  (mio)</label>
                                                <input type="number" class="modalview form-control-plaintext" name="formkpi[]" id="kpi41" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General Repair (4 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Service Lead Time</label>
                                                <input type="time" step="2" class="modalview form-control-plaintext" name="formkpi[]" id="kpi42" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Up Selling ratio  (TMO)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi43" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cross Selling ratio (include BP) - Battery</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi44" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cross Selling ratio (include BP) - Car Care</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi45" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Cross Selling ratio (include BP) - Tire</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi46" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Body & Paint (2 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Ontime Delivery Ratio (OTD)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi47" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Return Job (RTJ)</label>
                                                <input type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi48" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Trade In (1 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Trade In Ratio</label>
                                                <input  type="tel" class="modalview form-control-plaintext" name="formkpi[]" id="kpi49" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Manpower (3 KPI)</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Staff Productivity  - Sales (Unit/salesperson)</label>
                                                <input  type="text" class="modalview form-control-plaintext" name="formkpi[]" id="kpi50" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Staff Productivity  - Aftersales (Overall productivity)  </label>
                                                <input  type="text" class="modalview form-control-plaintext" name="formkpi[]" id="kpi51" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Salesperson Turn Over Ratio</label>
                                                <input type="text" class="modalview form-control-plaintext" name="formkpi[]" id="kpi52" placeholder="Isi skor KPI disini">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <span id="buttonsub"></span>
                </div>
            </div>
        </div>
    </form>
</div>
@stop


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    @media (min-width: 768px) {
  .modal-xxl {
    width: 90%;
   max-width:1200px;
  }
}
</style>
@stop

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('.select2').select2();
    var oTable = $('#user_table').DataTable({
        processing: true,
        lengthMenu : [[10, 25, 50, -1], [10, 25, 50, "All"]],
        serverSide: true,
        dom: '<"html5buttons">Brtipl',
        "order": [[ 1, "desc" ]],
        buttons : [
                    {extend: 'pdf', title:'Data KPI', "action": newexportaction},
                    {extend: 'excel', title: 'Data KPI', "action": newexportaction},
                    {extend:'print',title: 'Data KPI'},
        ],
        ajax:{
            url: "{{ route('formkpi.index') }}",
            data: function (d) {
                d.judul = $('input[name=search_periode]').val();
                d.lokasi = $("#search_kantor option:selected").val();
            }
        },
        columns: [
            { "data": null,"sortable": false,
                render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {"data":"nama"},
            {"data":"periodik"},
            {"data":"grade1"},
            {"data":"grade2"},
            {"data":"grade3"},
            {"data":"grade4"},
            {"data":"grade5"},
            {"data":"grade6"},
            {"data":"grade7"},
            {"data":"finalgrade"},
            {"data":"action",orderable: false},
        ],
    });

    function newexportaction(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    }

    $('#sample_form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
            $.ajax({
                beforeSend:function(){
                    $('#filter_button').html('<i disable class="fa fa-spinner fa-spin"></i>').attr('disabled', true);
                },
                success:function(){
                        $('#filter_button').html('<i class="fas fa-search"></i>').attr('disabled', false);
                    }
                });
    });
    $('#reset_filter_button').click(function(){
        $('#sample_form')[0].reset();
        $('.select2').val(null).trigger('change');
        oTable.draw();
        $.ajax({
            beforeSend:function(){
                $('#reset_filter_button').html('<i class="fas fa-undo"></i>').attr('disabled', true);
            },
            success:function(){
                    $('#reset_filter_button').html('<i class="fas fa-undo"></i>').attr('disabled', false);
                }
            });
    });

    $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        console.log(id)
        $.ajax({
            url:"formkpi/"+id,
            dataType:"json",
            success:function(html)
            {
                $('#kpi1').val(html.data.kpi1);
                $('#kpi2').val(html.data.kpi2);
                $('#kpi3').val(html.data.kpi3);
                $('#kpi4').val(html.data.kpi4);
                $('#kpi5').val(html.data.kpi5);
                $('#kpi6').val(html.data.kpi6);
                $('#kpi7').val(html.data.kpi7);
                $('#kpi8').val(html.data.kpi8);
                $('#kpi9').val(html.data.kpi9);
                $('#kpi10').val(html.data.kpi10);
                $('#kpi11').val(html.data.kpi11);
                $('#kpi12').val(html.data.kpi12);
                $('#kpi13').val(html.data.kpi13);
                $('#kpi14').val(html.data.kpi14);
                $('#kpi15').val(html.data.kpi15);
                $('#kpi16').val(html.data.kpi16);
                $('#kpi17').val(html.data.kpi17);
                $('#kpi18').val(html.data.kpi18);
                $('#kpi19').val(html.data.kpi19);
                console.log(html.data.kpi19)
                $('#kpi20').val(html.data.kpi20);
                $('#kpi21').val(html.data.kpi21);
                $('#kpi22').val(html.data.kpi22);
                $('#kpi23').val(html.data.kpi23);
                $('#kpi24').val(html.data.kpi24);
                $('#kpi25').val(html.data.kpi25);
                $('#kpi26').val(html.data.kpi26);
                $('#kpi27').val(html.data.kpi27);
                $('#kpi28').val(html.data.kpi28);
                $('#kpi29').val(html.data.kpi29);
                $('#kpi30').val(html.data.kpi30);
                $('#kpi31').val(html.data.kpi31);
                $('#kpi32').val(html.data.kpi32);
                $('#kpi33').val(html.data.kpi33);
                $('#kpi34').val(html.data.kpi34);
                $('#kpi35').val(html.data.kpi35);
                $('#kpi36').val(html.data.kpi36);
                $('#kpi37').val(html.data.kpi37);
                $('#kpi38').val(html.data.kpi38);
                $('#kpi39').val(html.data.kpi39);
                $('#kpi40').val(html.data.kpi40);
                $('#kpi41').val(html.data.kpi41);
                $('#kpi42').val(html.data.kpi42);
                $('#kpi43').val(html.data.kpi43);
                $('#kpi44').val(html.data.kpi44);
                $('#kpi45').val(html.data.kpi45);
                $('#kpi46').val(html.data.kpi46);
                $('#kpi47').val(html.data.kpi47);
                $('#kpi48').val(html.data.kpi48);
                $('#kpi49').val(html.data.kpi49);
                $('#kpi50').val(html.data.kpi50);
                $('#kpi51').val(html.data.kpi51);
                $('#kpi52').val(html.data.kpi52);
                $('#periode').val(html.data.periode);
                $('#catatan').val('revisi KPI periode ' + html.data.periode);
                $('.modal-title').text("Preview Data");
                $('#action_button').val("Edit");
                $('#action').val("Edit");
                $('.modalview').addClass('form-control simpanedit').removeClass('form-control-plaintext');
                $('#buttonsub').html('<button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>');

                $('#preview').modal('show');
            }
        })
    });
    $(document).on('click', '.preview', function(){
        var id = $(this).attr('id');
        console.log(id)
        $.ajax({
            url:"formkpi/"+id,
            dataType:"json",
            success:function(html)
            {
                $('#kpi1').val(html.data.kpi1+'%');
                $('#kpi2').val(html.data.kpi2);
                $('#kpi3').val(html.data.kpi3+'%');
                $('#kpi4').val(html.data.kpi4);
                $('#kpi5').val(html.data.kpi5+'%');
                $('#kpi6').val(html.data.kpi6);
                $('#kpi7').val(html.data.kpi7+'%');
                $('#kpi8').val(html.data.kpi8);
                $('#kpi9').val(html.data.kpi9);
                $('#kpi10').val(html.data.kpi10);
                $('#kpi11').val(html.data.kpi11+'%');
                $('#kpi12').val(html.data.kpi12+'%');
                $('#kpi13').val(html.data.kpi13+'%');
                $('#kpi14').val(html.data.kpi14+'%');
                $('#kpi15').val(html.data.kpi15+'%');
                $('#kpi16').val(html.data.kpi16+'%');
                $('#kpi17').val(html.data.kpi17);
                $('#kpi18').val(html.data.kpi18+'%');
                $('#kpi19').val(html.data.kpi19+'%');
                console.log(html.data.kpi19)
                $('#kpi20').val(html.data.kpi20+'%');
                $('#kpi21').val(html.data.kpi21+'%');
                $('#kpi22').val(html.data.kpi22+'%');
                $('#kpi23').val(html.data.kpi23+'%');
                $('#kpi24').val(html.data.kpi24+'%');
                $('#kpi25').val(html.data.kpi25+'%');
                $('#kpi26').val(html.data.kpi26+'%');
                $('#kpi27').val(html.data.kpi27+'%');
                $('#kpi28').val(html.data.kpi28+'%');
                $('#kpi29').val(html.data.kpi29+'%');
                $('#kpi30').val(html.data.kpi30+'%');
                $('#kpi31').val(html.data.kpi31+'%');
                $('#kpi32').val(html.data.kpi32);
                $('#kpi33').val(html.data.kpi33+'%');
                $('#kpi34').val(html.data.kpi34);
                $('#kpi35').val(html.data.kpi35+'%');
                $('#kpi36').val(html.data.kpi36);
                $('#kpi37').val(html.data.kpi37+'%');
                $('#kpi38').val(html.data.kpi38);
                $('#kpi39').val(html.data.kpi39+'%');
                $('#kpi40').val(html.data.kpi40);
                $('#kpi41').val(html.data.kpi41);
                $('#kpi42').val(html.data.kpi42);
                $('#kpi43').val(html.data.kpi43);
                $('#kpi44').val(html.data.kpi44);
                $('#kpi45').val(html.data.kpi45);
                $('#kpi46').val(html.data.kpi46);
                $('#kpi47').val(html.data.kpi47+'%');
                $('#kpi48').val(html.data.kpi48+'%');
                $('#kpi49').val(html.data.kpi49+'%');
                $('#kpi50').val(html.data.kpi50+'%');
                $('#kpi51').val(html.data.kpi51+'%');
                $('#kpi52').val(html.data.kpi52+'%');
                $('.modal-title').text("Preview Data");
                $('#action_button').val("Edit");
                $('.modalview').addClass('form-control-plaintext').removeClass('form-control');
                $('#action').val("Edit");
                $('#buttonsub').html('<a class="btn btn-success" id="exportexcel" href="#">Export as Excel</a>');
                document.getElementById("exportexcel").href="kpiexport?id=" + html.data.id + "&periode=" + html.data.periode;
                $('#preview').modal('show');
            }
        })
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var idd = $(this).data('id');
        Swal.fire({
            title: "Apakah anda yakin akan menghapus KPI ini ?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var id = $(this).attr('id');
                $.ajax({
                    type: "DELETE",
                    url: "formkpi/"+id,
                    dataType: 'JSON',
                    data:{
                        'id': id,
                        '_token': '{{ csrf_token() }}',
                    },
                    success: function (data) {
                        oTable.draw();
                        Swal.fire('Data berhasil dihapus', '', 'success')
                        console.log(id);
                        document.getElementById("lampiran" + id).remove();
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        })
    });
        $('#formdt').on('submit', function(event){
            event.preventDefault();
            console.log('submitkpimanual')
            $.ajax({
                url:"{{ route('formkpi.store') }}",
                method:"POST",
                data: new FormData(this),
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                beforeSend:function(){
                    $('#action_button').html('<i disable class="fa fa-spinner fa-spin"></i>').attr('disabled', true);
                },
                success:function(data)
                {
                    var html = '';
                    if(data.errors)
                    {
                        html = '';
                        for(var count = 0; count < data.errors.length; count++)
                        {
                            html += data.errors[count] + '<br>';
                        }
                        swal.fire({
                            icon: 'warning',
                            title: 'Data gagal disimpan',
                            html: html
                        })
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                    }
                    if(data.ektension)
                    {
                        swal.fire({
                            icon: 'warning',
                            title: 'Data gagal disimpan',
                            text: 'Ekstensi file yang diizinkan hanya PDF, JPG, PNG, DOCX'
                        })
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                    }
                    if(data.duplicate)
                    {
                        swal.fire({
                            icon: 'warning',
                            title: 'Data gagal disimpan',
                            text: data.duplicate
                        })
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                    }
                    if(data.success)
                    {
                        // $('#formdt')[0].reset();
                        // $('.select3').val(null).trigger('change');
                        // $('.select3').select2();
                        $('#action_button').html('<i class="fa fa-paper-plane"></i> Send').attr('disabled', false);
                        swal.fire({
                            icon: 'success',
                            title: 'Data berhasil disimpan. Terima kasih',
                            text: data.success
                        })

                        $.ajax({
                            url:"badgedraft",
                            dataType:"json",
                            success:function(html)
                            {
                                $('#badgedraft').html(html.data)
                            if(html.data == 0)
                            {
                                $('#badgedrafticon').hide();
                            }
                            else
                            {
                                $('#badgedrafticon').show();
                            }
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    swal.fire({
                        icon: 'error',
                        title: 'Data gagal disimpan',
                        text: errorMessage
                    });
                    console.log(xhr);
                    $('#action_button').html('Save changes').attr('disabled', false);
                }
            })
        });

});
</script>
@stop

@section('footer')
this
@stop
