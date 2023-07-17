@extends('adminlte::page')

@section('title', 'Form KPI')

@section('content_header')
    <h1>Checksheet Mingguan</h1>
@stop

@section('content')
{{-- <div class="preloader flex-column justify-content-center align-items-center">


    <img src="../pictures/sales_tcm-removebg-preview.png"
         class="animation__shake"
         alt="Preloader Image"
         width="400"
         height="400">

</div> --}}
<form role="form" id="formdt" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="kategori" value="week">
<input type="hidden" name="act" value="submit">
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">General Data</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Bulan</label>
                            <input type="month" class="form-control" name="periode" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Minggu ke </label>
                            <select class="form-control select2" name="week" style="width: 100%;">
                            <option value="" selected="selected">Pilih salah satu</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Catatan</label>
                            <input type="text" class="form-control" name="catatan" placeholder="Catatan dari KPI">
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
                <h3 class="card-title">Delivery Explaination (DEC) by Salesperson (14 Checksheet)</h3>
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
                <h3 class="card-title">Advance Demand & Supply Management (4 Checksheet)</h3>
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
                <h3 class="card-title">Sales Person Offering Process (16 Checksheet)</h3>
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
                <h3 class="card-title">Post Delivery Follow Up (PDFU) by CRC (3 Checksheet)</h3>
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
                <h3 class="card-title">Reminder Activity by MRA (6 Checksheet)</h3>
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Reception [R] And Delivery [D] Process (26 Checksheet)</h3>
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
                <h3 class="card-title">Production Process (7 Checksheet)</h3>
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
                <h3 class="card-title">Post Service Follow Up (PSFU) (6 Checksheet)</h3>
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
                <h3 class="card-title">Reminder Process (3 Checksheet)</h3>
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Reception [R] And Delivery [D] After Service Process (11 Checksheet)</h3>
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
                <h3 class="card-title">Post Service Follow Up (PSFU) (4 Checksheet)</h3>
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
                <h3 class="card-title">Cleansing, Validitas, & Struktur Data (3 Checksheet)</h3>
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
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Penggunaan Database (5 Checksheet)</h3>
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
                <h3 class="card-title">Trade In Capability (2 Checksheet)</h3>
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
                <h3 class="card-title">Trade In Operation (3 Checksheet)</h3>
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
                <h3 class="card-title">Trade In Facility (2 Checksheet)</h3>
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
                <h3 class="card-title">Manpower Productivity (3 Checksheet)</h3>
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
                <h3 class="card-title">Training Manpower Activity (3 Checksheet)</h3>
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
            <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
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
            console.log('submitkpimanual')
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
