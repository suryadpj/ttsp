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
                            <input  type="month" class="form-control datea" value="{{ old('fperiode') }}" name="search_periode" id="search_periode" placeholder="Periode">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control select2" name="search_week" style="width: 100%;">
                            <option value="0" @if(old('fweek') == 0) selected @endif>1 Bulan</option>
                            <option value="1" @if(old('fweek') == 1) selected @endif>Minggu ke 1</option>
                            <option value="2" @if(old('fweek') == 2) selected @endif>Minggu ke 2</option>
                            <option value="3" @if(old('fweek') == 3) selected @endif>Minggu ke 3</option>
                            <option value="4" @if(old('fweek') == 4) selected @endif>Minggu ke 4</option>
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
    </div>
</div>
</form>
@stop


@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    textarea {
        display: block;
        border: 1px solid #000;
        /*position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;*/
        height: 100%;
        resize: vertical;
        min-width: 100px;
        min-height: 600px;
    },table, th, td {
  border: 1px solid black;
}
</style>
@stop

@section('js')
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
    var oTable = $('#user_table').DataTable({
        processing: true,
        lengthMenu : [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"html5buttons">Brtipl',
        "order": [[ 1, "desc" ]],
        buttons : [
                    {extend: 'pdf', title:'Data KPI', },
                    {extend: 'excel', title: 'Data KPI', },
                    {extend:'print',title: 'Data KPI'},
        ],
    });


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

    //data catatan
    $('#create_record').click(function(){
        $('#sample_form2')[0].reset();
        $('.select2').val(null).trigger('change');
        $('.select2').select2();
        $('#lampiran').html('');
        // $('#cari').val(null).trigger('change');
        // $('#area').val(null).trigger('change');
        $('.modal-title').text("Data Cost Baru");
        $('#action_button').val("Add");
        $('#action').val("Add");
        $('#modal_catatan').modal('show');
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
            $('#simpan').click(function(){
                console.log('sukses')
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: 'Data berhasil disimpan',
                })
            });

});
</script>
@stop

@section('footer')
this
@stop
