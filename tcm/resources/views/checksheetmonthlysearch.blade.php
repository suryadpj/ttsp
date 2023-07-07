@extends('adminlte::page')

@section('title', 'TCM - Data Checksheet')

@section('content_header')
    <h3>Data Checksheet Monthly</h3>
@stop


@section('content')
<form action="checksheetmonthlysearch" method="get">
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                @if (old('success'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ old('success') }}</li>
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input  type="month" class="form-control datea" value="{{ $fperiode }}" name="search_periode" id="search_periode" placeholder="Periode">
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
    </div>
</div>
</form>
<form role="form" id="formdt" method='post' enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="periode" value="{{ $fperiode }}">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-body table-responsive p-0">
                    <table class="table-bordered cell-border" width="100%" id="tblData">
                        <thead style="font-weight: bold;">
                            <tr>
                                <td>{{ $fperiodes }}</td>
                                <td>Balaraja</td>
                                <td>Bekasi</td>
                                <td>Bintaro</td>
                                <td>Cakung</td>
                                <td>Cilegon</td>
                                <td>Cimindi</td>
                                <td>Cinere</td>
                                <td>Cipondoh</td>
                                <td>Ciputat</td>
                                <td>Dewi Sartika</td>
                                <td>Gatot Subroto</td>
                                <td>Hayam Wuruk</td>
                                <td>Jatinegara</td>
                                <td>Jatiwaringin</td>
                                <td>Kebayoran Lama</td>
                                <td>Latumenten</td>
                                <td>Mampang</td>
                                <td>Pasar Minggu</td>
                                <td>Pecenongan</td>
                                <td>Radin Inten</td>
                                <td>Serang</td>
                                <td>Tangerang</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $a)
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->a }}</td>
                                    <td>{{ $a->b }}</td>
                                    <td>{{ $a->c }}</td>
                                    <td>{{ $a->d }}</td>
                                    <td>{{ $a->e }}</td>
                                    <td>{{ $a->f }}</td>
                                    <td>{{ $a->g }}</td>
                                    <td>{{ $a->h }}</td>
                                    <td>{{ $a->i }}</td>
                                    <td>{{ $a->j }}</td>
                                    <td>{{ $a->k }}</td>
                                    <td>{{ $a->l }}</td>
                                    <td>{{ $a->m }}</td>
                                    <td>{{ $a->n }}</td>
                                    <td>{{ $a->o }}</td>
                                    <td>{{ $a->p }}</td>
                                    <td>{{ $a->q }}</td>
                                    <td>{{ $a->r }}</td>
                                    <td>{{ $a->s }}</td>
                                    <td>{{ $a->t }}</td>
                                    <td>{{ $a->u }}</td>
                                    <td>{{ $a->v }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
            {{-- <div class="card-footer">
                <button type="submit" id="action_button" class="btn btn-primary">Simpan Data</button>
                <a class="btn btn-success" href="summaryreportexcel?periode={{ $fperiode }}&kantor={{ $fkantor }}">Export to Excel</a>
            </div> --}}
        </div>
    </div>
</div>
</form>
@stop


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@stop

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script type="text/javascript">function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}
$(document).ready(function(){
        $('#formdt').on('submit', function(event){
            event.preventDefault();
            console.log('submitkpimanual')
            $.ajax({
                url:"{{ route('summaryreport.store') }}",
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
Tunas Toyota Head Office &copy; 2023
@stop
