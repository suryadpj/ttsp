@extends('adminlte::page')

@section('title', 'TCM - Data Checksheet')

@section('content_header')
    <h3>Data Checksheet</h3>
@stop


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <form id="sample_form">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input  type="month" class="form-control datea" name="search_periode" id="search_periode" placeholder="Periode">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <select class="form-control" name="search_minggu" id="search_minggu"  style="width: 100%;">
                            <option value=''>1 Bulan Penuh</option>
                            <option value="1">Minggu ke 1</option>
                            <option value="2">Minggu ke 2</option>
                            <option value="3">Minggu ke 3</option>
                            <option value="4">Minggu ke 4</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                        <select class="form-control" name="search_kantor" id="search_kantor"  style="width: 100%;">
                            @if(auth()->user()->IDKantor == 1)<option value=''>Semua Cabang</option> @endif
                            @foreach($kantor as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-sm-3">
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
                        {{-- <a href='formkpi/create' name="create_record" id="create_record" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Data</a> --}}
                    </div>
                    <br>
                    <table id="user_table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Area</th>
                                <th>Periode</th>
                                <th>PSP Sales</th>
                                <th>Delvr Exp</th>
                                <th>PSP Srv GR</th>
                                <th>PSP Srv BP</th>
                                <th>Cust Database</th>
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
    <div class="modal-dialog modal-xxl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Checksheet</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="datachecksheet"></div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                <a class="btn btn-success" id="exportexcel" href="#">Export as Excel</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit">
    <form role="form" id="formdt" method='post' enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="periode" id="hiddenperiode">
        <input type="hidden" name="kategori" id="hiddenkategori">
        <input type="hidden" name="week" id="hiddenweek">
        <input type="hidden" name="act" id="hiddenact">
        <div class="modal-dialog modal-xxl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Checksheet</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="datachecksheet2"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    <button type="submit" id="action_button" class="btn btn-success">Simpan Perubahan Data</button>
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
            url: "{{ route('checksheet.index') }}",
            data: function (d) {
                d.judul = $('input[name=search_periode]').val();
                d.lokasi = $("#search_kantor option:selected").val();
                d.week = $("#search_minggu option:selected").val();
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

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var idd = $(this).data('id');
        Swal.fire({
            title: "Apakah anda yakin akan menghapus Checksheet ini ?",
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
                    url: "checksheet/"+id,
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

    $(document).on('click', '.edit', function(){
        var id = $(this).attr('id');
        $('#preview').modal('show');
        console.log(id)
        $.ajax({
            url:"checksheet/"+id,
            dataType:"json",
            success:function(html)
            {
               const isilampiran = [];
               html.forEach( x => isilampiran.push('<div class="form-group row"><div class="col-sm-9">' + x.iddata + '. ' + x.nama + '</div><div class="col-sm-3">' + x.nilai + '</div></div><hr>'))
               $('#datachecksheet').html(isilampiran)
                document.getElementById("exportexcel").href="checksheetexport?id=" + id;
                $('.modal-title').text("Preview Data Checksheet");
            }
        })
    });
    $(document).on('click', '.editdata', function(){
        var id = $(this).attr('id');
        $('#edit').modal('show');
        console.log(id)
        $.ajax({
            url:"checksheet/"+id,
            dataType:"json",
            success:function(html)
            {
               const isilampiran = [];
            //    html.forEach( x => isilampiran.push('<div class="form-group row"><div class="col-sm-9">' + x.iddata + '. ' + x.nama + '</div><div class="col-sm-3">' + x.nilai + '</div></div><hr>'))
               html.forEach(function(x)
               {
                    if(x.diisi == 1)
                    {
                        isilampiran.push('<div class="form-group row"><div class="col-sm-8">' + x.iddata + '. ' + x.nama + '</div><div class="col-sm-4"><input type="radio" id="radioPrimary' + x.iddata + 'a" name="checksheet[' + x.iddata + ']" value="1" checked><label for="radioPrimary' + x.iddata + 'a">O:Sudah Dilakukan</label> &nbsp; <input type="radio" id="radioPrimary' + x.iddata + 'b" name="checksheet[' + x.iddata + ']" value="2"><label for="radioPrimary' + x.iddata + 'b">X:Tidak Dilakukan</label></div></div><hr>');
                    }
                    else if(x.diisi == 2)
                    {
                        isilampiran.push('<div class="form-group row"><div class="col-sm-8">' + x.iddata + '. ' + x.nama + '</div><div class="col-sm-4"><input type="radio" id="radioPrimary' + x.iddata + 'a" name="checksheet[' + x.iddata + ']" value="1"><label for="radioPrimary' + x.iddata + 'a">O:Sudah Dilakukan</label> &nbsp; <input type="radio" id="radioPrimary' + x.iddata + 'b" name="checksheet[' + x.iddata + ']" value="2" checked><label for="radioPrimary' + x.iddata + 'b">X:Tidak Dilakukan</label></div></div><hr>');
                    }
                    $('#hiddenperiode').val(x.periode);
                    $('#hiddenweek').val(x.week);
                    if(x.week == 0)
                    {
                        $('#hiddenkategori').val('month');
                    }
                    else
                    {
                        $('#hiddenkategori').val('week');
                    }
               })
               $('#datachecksheet2').html(isilampiran);
               $('#hiddenact').val('edit');
                document.getElementById("exportexcel").href="checksheetexport?id=" + id;
                $('.modal-title').text("Edit Data Checksheet");
            }
        })
    });

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
