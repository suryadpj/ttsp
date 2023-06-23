@extends('adminlte::page')

@section('title', 'Form KPI')

@section('content_header')
    <h1>Form KPI - Sales</h1>
@stop

@section('content')
<form role="form" id="formdt" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="kategori" value="2-1">
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
                <h3 class="card-title">PSP Sales (15 KPI)</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Net Promoter Score (NPS) Sales</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GP Total Sales (per unit)  (mio)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GP Total Sales Rasio</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GP Vehicle (per unit)  (mio)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GP Vehicle Rasio</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GP TCO (per unit)  (mio)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>GP TCO Rasio</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>F&I Commision (per unit)  (mio)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Total Revenue per Unit  (Vehicle + TCO) (mio)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Total Revenue Amount (Vehicle + TCO) (mio)</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>TCO Installation Rasio</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Toyota Insurance Share</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Credit Rasio</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Market Share Credit Portion (MSCP)</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>M-Quote utilization rasio</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
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
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>AO Report Establishment</label>
                            <input type="number" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Outstanding Matching to target Ratio (on AO25 Achievement) </label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Monthly Sales Target Achievement (Target Operation)</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
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
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Awareness Rate - T-intouch</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Awareness Rate - Insurance</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Survey Customer Interest - T-Care</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Survey Customer Interest - T-Intouch</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>T-Intouch Activation Rate</label>
                            <input type="tel" size="4" maxlength="3" onchange="changeHandler(this)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="formkpi[]" placeholder="Isi skor KPI disini">
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
@stop

@section('js')
    <script>
        function changeHandler(val)
        {
            if (Number(val.value) > 100)
            {
            val.value = 100
            }
        }

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
    </script>
@stop
