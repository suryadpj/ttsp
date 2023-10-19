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
<form action="../checksheetdetaildata" method="get">
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
            <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
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
