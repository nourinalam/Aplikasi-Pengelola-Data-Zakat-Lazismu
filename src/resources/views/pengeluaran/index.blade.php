@extends('layouts.app')

@section('title', 'Pengeluaran')
@section('content')
    <div class="block-header">
        <h2>PENGELUARAN</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-11">
                            <h2>
                                DAFTAR PENGELUARAN
                            </h2>
                        </div>
                        <div class="col-xs-12 col-sm-1 align-right">
                            <a title="Data Baru" class="btn bg-indigo btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="#"  data-toggle="modal" data-target="#insertModal"><i class="material-icons">add_circle_outline</i></a>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbpengeluaran">
                        <thead>
                            <tr>
                                <th>NOMINAL</th>
                                <th>MUSTAHIQ</th>
                                <th>AMIL ZAKAT</th>
                                <th>EDIT</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="insertModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Input Pengeluaran</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('pengeluaran.store')}}" method="post" id="insertForm">
                        @csrf
                        <div class="row clearfix">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="jumlah" id="jumlah" class="form-control only-num" required="">
                                    <label class="form-label">Jumlah</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Keterangan</label>
                                            <select name="keterangan" id="keterangan" class="form-control" required">
                                                <option value="">Pilih Mustahiq</option>
                                                @foreach($jenises as $jenis)
                                                    <option value="{{ $jenis->name }}">{{ $jenis->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="button" name="insert" id="insert" value="TAMBAH" class="btn btn-primary m-t-15 waves-effect">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Edit Pengeluaran</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="updateForm">
                        @csrf
                        {{  method_field('PATCH') }}
                        <input type="hidden" name="_id" id="id">
                        <div class="row clearfix">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="jumlah" id="editjumlah" class="form-control only-num" required="">
                                    {{--  <label class="form-label">Jumlah</label>  --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label">Keterangan</label>
                                            <select name="keterangan" id="keterangan" class="form-control" required">
                                                <option value="">Pilih Mustahiq</option>
                                                @foreach($jenises as $jenis)
                                                    <option value="{{ $jenis->name }}">{{ $jenis->name }}</option>
                                                @endforeach
                                            </select>
                                    {{--  <label class="form-label">Keterangan</label>  --}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <input type="button" name="update" id="update" value="UBAH" class="btn btn-primary m-t-15 waves-effect">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#insert").click(function(){
                swal({
                    title: 'Apakah Data Sudah Benar?',
                    text: "Jika Tidak Benar Anda Bisa Mengeditnya",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Sudah Benar',
                    cancelButtonText: 'Tidak, batalkan!',
                }).then((result) => {
                    if (result.value) {
                        $('#insertForm').submit();
                    }
                })
            });
            var table = $('#tbpengeluaran').DataTable({
                dom: 'Bfrtip',
                responsive: true,
                processing: true,
                serverSide: true,
                buttons: [
                        {
                            extend: 'print',
                            footer: false,
                            exportOptions: {
                                columns: [0,1,2]
                            }
                        },
                        {
                            extend: 'pdf',
                            footer: false,
                            exportOptions: {
                                columns: [0,1,2]
                            }
                            
                        },
                        {
                            extend: 'excel',
                            footer: false,
                            exportOptions: {
                                columns: [0,1,2]
                            }
                        } 
                    ],
                ajax: {
                    url: '{{ url("list-pengeluaran") }}'
                },
                columns: [
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'nama', name: 'users.name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
            });
            $('#updateModal').on('show.bs.modal', function(e) {
                var $modal = $(this),
                    mustahiqId = e.relatedTarget.id;
                $.ajax({
                    type:"GET",
                    url:"{{url('edit-pengeluaran')}}/"+mustahiqId+"",
                    success: function(data) {
                        $("#id").val(data.id);
                        $("#editjumlah").val(data.jumlah);
                        $("#editketerangan").val(data.keterangan);
                        $('#updateForm').attr('action', "{{url('pengeluaran-update')}}/"+$("#id").val()+"");
                    }
                });
            });
            $("#update").on("click", function(e){
                swal({
                    title: 'Apakah Data Sudah Sesuai?',
                    text: "Data Bisa Diedit Kembali",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Saya Yakin',
                    cancelButtonText: 'Tidak, batalkan!',
                }).then((result) => {
                    if (result.value) {
                        $('#updateForm').submit();
                    }
                })
            });
            $("#tbpengeluaran").on("click", "#apus", function(e){
                var csrf_token = $('meta[name="csrf-token"]').attr("content");
                var id = $(this).data("value");
                swal({
                    title: 'Yakin Ingin Dihapus?',
                    text: "Data Tidak Bisa Dikembalikan",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Saya Yakin',
                    cancelButtonText: 'Tidak, batalkan!',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{ url('pengeluaran/delete') }}"+ '/' + id,
                            type: "POST",
                            data : {'_method' : 'DELETE', '_token' : csrf_token},
                            success : function(){
                                table.ajax.reload();
                            }
                        })
                    }
                })
            });
        });
    </script>
@endsection