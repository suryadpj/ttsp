@extends('adminlte::page')

@section('title', 'Form KPI')

@section('content_header')
    <h1>Checksheet Monthly</h1>
@stop

@section('content')
{{-- <div class="preloader flex-column justify-content-center align-items-center">


    <img src="../pictures/sales_tcm-removebg-preview.png"
         class="animation__shake"
         alt="Preloader Image"
         width="400"
         height="400">

</div> --}}
<form action="checksheetdetaildata" method="get">
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General Data</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Periode</label>
                            <input type="month" class="form-control" value="{{$periode}}" name="periode" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Catatan</label>
                            <input type="text" class="form-control" value="{{$catatan}}" name="catatan" placeholder="Catatan dari KPI">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Proses Periode Checksheet</button>
            </div>
        </div>
    </div>
</div>
</form>
<form role="form" id="formdt" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="kategori" value="month">
<input type="hidden" name="versi" value="new">
<input type="hidden" name="kategorikantor" value="{{$kantor->kategori}}">
<input type="hidden" name="periode" value="{{$periode}}">
<input type="hidden" name="act" value="submit">
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">A.1. Sales Person Offering Process (16 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data_a as $a)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {{ $a->nama }}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">A.2. Advance Demand & Supply Management (4 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_b as $b)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {{ $b->nama }}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">B.1. Pre-DEC (4 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_c as $c)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {{ $c->nama }}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">B.2. Delivery Explaination (DEC) (12 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_d as $d)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $d->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">B.3. Post Delivery Follow Up (PDFU) by CRC (4 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_e as $e)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $e->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($kantor->kategori == 2 || $kantor->kategori == 3)
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">C.1. Reminder Activity (8 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_f as $f)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $f->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">C.2. Reception [R] And Delivery [D] Process (21 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_g as $g)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $g->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">C.3. Production Process (7 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_h as $h)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $h->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">C.4. Post Service Follow Up (PSFU) (6 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_i as $i)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $i->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@else
    @php
        $numbernew = count($data_f);
        $no = $no + $numbernew;
        $numbernew = count($data_g);
        $no = $no + $numbernew;
        $numbernew = count($data_h);
        $no = $no + $numbernew;
        $numbernew = count($data_i);
        $no = $no + $numbernew;
    @endphp
@endif
@if($kantor->kategori == 3)
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">D.1. Reminder Process (3 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_j as $j)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $j->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">D.2. Reception [R] And Delivery [D] After Service Process (11 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_k as $k)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $k->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">D.3. Post Service Follow Up (PSFU) (5 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_l as $l)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $l->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@else
    @php
        $numbernew = count($data_j);
        $no = $no + $numbernew;
        $numbernew = count($data_k);
        $no = $no + $numbernew;
        $numbernew = count($data_l);
        $no = $no + $numbernew;
    @endphp
@endif
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">E.1. Cleansing, Validitas, & Struktur Data (3 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_m as $m)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $m->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">E.2. Penggunaan Database (5 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_n as $n)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $n->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">F.1. Trade In Capability (2 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_o as $o)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $o->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">F.2. Trade In Operation (3 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_p as $p)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $p->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">G.1. Manpower Productivity (3 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_q as $q)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $q->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">G.2. Training Manpower Activity (3 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_r as $r)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $r->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
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
                <h3 class="card-title">H.1. PDCA Activity (3 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @foreach ($data_s as $s)
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-9 col-form-label">{{ $no }}. {!! $s->nama !!}</label>
                                <div class="col-sm-3">
                                    <div class="form-group clearfix">
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}a" name="checksheet[{{ $no }}]" value="1">
                                            <label for="radioPrimary{{ $no }}a">
                                                O:Sudah Dilakukan
                                            </label>
                                        </div>
                                        &nbsp;
                                        <div class="icheck-primary d-inline">
                                            <input type="radio" id="radioPrimary{{ $no }}b" name="checksheet[{{ $no }}]" value="2">
                                            <label for="radioPrimary{{ $no }}b">
                                                X:Tidak Dilakukan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            @php $no = $no+1; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Total Checksheet : {{$no}} &nbsp; <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Sales Person Offering Process (16 Checksheet)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>3.1 Memastikan semua sales person meng-install & register M-Quote Apps di handphone masing masing</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r1">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r1">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.2 Memastikan Sales Person menggunakan M-Quote untuk menjelaskan mengenai informasi produk</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r2">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r2">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.3 Memastikan Sales Person menggunakan M-Quote untuk menjelaskan informasi total produk & Value Chain seperti TCO, Insurance, Financial Package, dan Trade In Price</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r3">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r3">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.4 Memastikan salesperson menggunakan M-Quote dalam menghitung perkiraan harga penawaran untuk pelanggan</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r4">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r4">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.5 Memastikan Salesperson menjelaskan fitur produk & keunggulannya / nilai jual utama dengan produk presentasi dari 6 posisi dengan unit display</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r5">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r5">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.6 Memastikan salesperson menjelaskan tentang fitur & informasi dengan menggunakan Test Drive</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r6">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r6">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.7 Memastikan salesperson menjelaskan mengenai informasi Telematics & manfaatnya</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r7">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r7">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.8 Memastikan salesperson menjelaskan dan menawarkan produk beserta paket aksesoris dan harga aksesoris</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r8">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r8">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.9 Memastikan salesperson menjelaskan & menawarkan satu per satu item aksesoris dan harganya</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r9">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r9">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>3.10 Memastikan Cabang memiliki pojok aksesoris untuk membantu salesperson dalam memberikan penjelasan kepada pelanggan</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r10">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r10">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.11 Memastikan salesperson menjelaskan & menawarkan mengenai tipe asuransi, benefit, & harga asuransi kepada pelanggan dengan semua jenis metode pembayaran (cash & credit)</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r11">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r11">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.12 Memastikan cabang dapat membuat mapping untuk komposisi asuransi yang telah dijual</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r12">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r12">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.13 Memastikan cabang dapat menghitung & memetakan data pelanggan yang membeli asuransi dengan metode pembayaran Cash</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r13">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r13">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.14 Memastikan salesperson menawarkan opsi pembayaran terbaik, tidak hanya satu jenis opsi tapi disesuaikan dengan kondisi pelanggan (regular, spekta, Ezd etc) juga di ditawarkan dan dijelaskan dengan baik.</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r14">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r14">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.15 Memastikan salesperson dapat dengan flexible memodifikasi penawaran dengan cepat untuk DP, pembayaran bulanan sesuai dengan kebutuhan pelanggan</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r15">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r15">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><u>1.16 Memastikan salesperson menawarkan appraisal terhadap mobil pelanggan, terutama untuk pelanggan tipe replacement buyer (ingin mengganti mobil lama dengan yang baru)</u></label>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="r16">
                                    <label for="radioPrimary1">
                                        O:Sudah Dilakukan
                                    </label>
                                </div>
                                &nbsp;
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="r16">
                                    <label for="radioPrimary2">
                                        X:Tidak Dilakukan
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style type="text/css" media="screen">
        .act-btn{
            background:green;
            display: block;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom:30px;
            }
        .act-btn:hover{background: blue}
    </style>
@stop

@section('js')
<script src="https://adminlte.io/themes/v3/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <script>

$("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
        $('#formdt').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"{{ route('checksheet.store') }}",
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
                            width: '50em',
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
    </script>
@stop
