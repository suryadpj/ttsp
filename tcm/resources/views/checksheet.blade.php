@extends('adminlte::page')

@section('title', 'Form KPI')

@section('content_header')
    <h1>Checksheet</h1>
@stop

@section('content')
<div class="preloader flex-column justify-content-center align-items-center">


    <img src="../pictures/sales_tcm-removebg-preview.png"
         class="animation__shake"
         alt="Preloader Image"
         width="400"
         height="400">

</div>
<form role="form" id="formdt" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="kategori" value="1-1">
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
                            <input type="month" class="form-control" name="periode" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
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
                <h3 class="card-title">Advanced Demand & Supply Management (4 KPI)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>AO Report Establishment</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Monthly SPK Achievement (vs Target)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Stok Matching Ratio</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Monthly Sales Target Achievement</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
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
                <h3 class="card-title">PSP Sales (9 KPI)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Net Promoter Score (NPS) Sales</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Gross Profit/Unit(Vehicle, TCO, F&J Commission)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>TCO Installation Ratio</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Cash With Insurance</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Toyota Insurance Share</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Credit Ratio</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>MSCP</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>M Quote Utilization Rate</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Insurance Renewal</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
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
                <h3 class="card-title">People Development (2 KPI)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Staff Productivity</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Salesperson Turn over Ratio</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
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
                <h3 class="card-title">Trade In (3 KPI)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Trade In Ratio</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Appraisal Ratio to Prospect</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Deal Ratio to price Offer</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
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
    <script>

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
