@extends('layouts.app')

@section('title', 'Data Mustahiq')
@section('content')
<div class="block-header">
            <h2>DAFTAR MUSTAHIQ</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    PENERIMA ZAKAT
                                </h2>  
                            </div>
                            <div class="col-xs-12 col-sm-1 align-right">
                                <a title="Data Baru" class="btn bg-indigo btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="#"  data-toggle="modal" data-target="#insertModal"><i class="material-icons">add_circle_outline</i></a>
                            </div>
                        </div>
        			</div>
                    <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbzakat">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>JENIS MUSTAHIQ</th>
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
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Mustahiq</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="editForm">
                            @csrf
                            {{  method_field('PATCH') }}
                            <input type="hidden" name="_id" id="id">
                            <div class="row clearfix">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" id="name" class="form-control" required="">
                                            {{--  <label class="form-label">Nama Mustahiq</label>  --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="area" id="area" class="form-control" required="">
                                            {{--  <label class="form-label">Area</label>  --}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <select name="jenismustahiq_id" id="jenis">
                                                <option value="">-- pilih jenis mustahiq --</option>
                                                @foreach($jenises as $jenis)
                                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input type="button" name="insert" id="editButton" value="UBAH" class="btn btn-primary m-t-15 waves-effect">
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
        <div class="modal fade" id="insertModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Mustahiq</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('mustahiq.store')}}" method="post" id="profil">
                            @csrf
                            <div class="row clearfix">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="name" id="name" class="form-control" required="">
                                            <label class="form-label">Nama Mustahiq</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="area" id="area" class="form-control" required="">
                                            <label class="form-label">Area</label>
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div>
                                            <select name="jenismustahiq_id" id="tipe" required="" class="select">
                                                <option value="">-- pilih jenis mustahiq --</option> 
                                                @foreach($jenises as $jenis)
                                                    <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
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
        <script>
            jQuery(document).ready( function () {
                var table = $('#tbzakat').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: false,
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
                        url: '{{ url("list-mustahiq") }}'
                    },
                    columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'area', name: 'area'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                });
                $('#editModal').on('show.bs.modal', function(e) {
                    var $modal = $(this),
                        mustahiqId = e.relatedTarget.name;
                    $.ajax({
                        type:"GET",
                        url:"{{url('tampilkan-mustahiq')}}/"+mustahiqId+"",
                        success: function(data) {
                            $("#id").val(data.id);
                            $("#name").val(data.name);
                            $("#area").val(data.area);
                            $("#jenis").val(data.jenismustahiq_id);
                            $('#jenis').selectpicker('refresh');
                            $('#editForm').attr('action', "{{url('mustahiq-update')}}/"+$("#id").val()+"");
                        }
                    });
                });
                $("#editButton").on("click", function(){
                    swal({
                        title: 'Apakah Data Sudah Sesuai?',
                        text: "Anda Dapat Mengedit Kembali",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Saya Yakin',
                        cancelButtonText: 'Tidak, batalkan!',
                        }).then((result) => {
                        if (result.value) {
                            $('#editForm').submit();
                        }
					})
                });
                $("#insert").on("click", function(){
                    swal({
                        title: 'Apakah Data Sudah Sesuai?',
                        text: "Anda Dapat Mengedit Kembali",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Saya Yakin',
                        cancelButtonText: 'Tidak, batalkan!',
                        }).then((result) => {
                        if (result.value) {
                            $('#profil').submit();
                        }
					})
                });
                $("#tbzakat").on("click", "#apus", function(e){
                    var csrf_token = $('meta[name="csrf-token"]').attr("content");
                    var id = $(this).data("value");
                    swal({
                        title: 'Apakah Kamu Yakin Ingin Dihapus?',
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
                                url: "{{ url('mustahiq/delete') }}"+ '/' + id,
                                type: "POST",
                                data : {'_method' : 'DELETE', '_token' : csrf_token},
                                success : function(){
                                    table.ajax.reload();
                                }
                            })
                        }
					})
                });
            } );
        </script>
@endsection