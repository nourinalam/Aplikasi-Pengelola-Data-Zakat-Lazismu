@extends('layouts.app')

@section('title', 'Data Zakat')
@section('content')
<div class="block-header">
            <h2>DAFTAR MUZAKKI</h2>
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    PENDATAAN MUZAKKI
                                </h2>  
                            </div>
                            <div class="col-xs-12 col-sm-1 align-right">
                                <a title="Data Baru" class="btn bg-indigo btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="{{route('zakat.createOther')}}"><i class="material-icons">add_circle</i></a>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <form class="form-vertical" action="">
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" id="nm" class="form-control" required="" autofocus="">
                    				<label class="form-label">Cari Muzakki</label>
                    			</div>
                    		</div>
                        </form>
                        <div class="table-responsive" id="table-hasil">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>ALAMAT</th>
                                        <th>NO HP</th>
                                        <th>PILIH</th>
                                    </tr>
                                </thead>
                                <tbody id="list-hasil">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    DATA MUZAKKI YANG SUDAH DITERIMA
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbzakat">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>JIWA</th>
                                        <th>FITRAH (BERAS)</th>
                                        <th>FITRAH (UANG)</th>
                                        <th>ZAKAT MAAL</th>
                                        <th>INFAQ</th>
                                        <th>AMIL</th>
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
        <script>
            jQuery(document).ready( function () {
                $('#table-hasil').hide();
                var table = $('#tbzakat').DataTable({
                    dom: 'Bfrtip',
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    buttons: [
                        {
                            extend: 'print',
                            footer: false,
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6]
                            }
                        },
                        {
                            extend: 'pdf',
                            footer: false,
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6]
                            }
                            
                        },
                        {
                            extend: 'excel',
                            footer: false,
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6]
                            }
                        } 
                    ],
                    ajax: {
                        url: '{{ url("list-transaksi") }}'
                    },
                    columns: [
                    {data: 'nama', name: 'muzakkis.name'},
                    {data: 'jiwa', name: 'jiwa'},
                    {data: 'beras_fitrah', name: 'beras_fitrah'},
                    {data: 'uang_zakat', name: 'uang_fitrah'},
                    {data: 'maal', name: 'zakat_maal'},
                    {data: 'infaq', name: 'infaq'},
                    {data: 'name', name: 'users.name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, exportable: false},
                ],
                });
                $( "#nm" ).keyup(function() {
                    $('#table-hasil').show();
                    var nama = $( "#nm" ).val();
                    $.ajax({
						type:"GET",
						url:"{{url('search/muzakki')}}/"+nama+"",
						success: function(data) {
                            $('#list-hasil').html(data);
						}
					});
                });
                $("#tbzakat").on("click", "#apus", function(e){
                    var csrf_token = $('meta[name="csrf-token"]').attr("content");
                    var id = $(this).data("value");
                    swal({
                        title: 'Apakah Kamu Yakin Ingin Dihapus?',
                        text: "Mohon Hubungi Webmaster Untuk Mengembalikan Data",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Saya Yakin',
                        cancelButtonText: 'Tidak, batalkan!',
                        }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: "{{ url('zakat/delete') }}"+ '/' + id,
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