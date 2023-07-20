@extends('layouts.app')

@section('title', 'Jenis Mustahiq')
@section('content')
<div class="block-header">
            <h2>JENIS MUSTAHIQ</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    JENIS MUSTAHIQ
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>JENIS</th>
                                    <th>KETERANGAN</th>
                                    <th>JUMLAH BAGIAN</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($jenises as $jenis)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$jenis->jenis}}</td>
                                        <td>{{$jenis->keterangan}}</td>
                                        <td>{{$jenis->jumlah_bagian}}</td>
                                        <td><a href="#" id="{{$i}}" class="btn bg-indigo waves-effect modal" data-toggle="modal" data-target="#defaultModal">Edit</a></td>
                                    </tr>
                                    @php($i++)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
        		</div>
        	</div>
        </div>
        <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Edit Jenis Mustahiq</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="profil">
                            @csrf
                            <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis" name="jenis" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="keterangan" name="keterangan" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jumlah_bagian" name="jumlah_bagian" class="form-control only-num">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <input type="button" name="insert" id="insert" value="UBAH" class="btn btn-primary m-t-15 waves-effect">
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
                            text: "Periksa Data Terlebih Dahulu!",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ya, Sudah Benar',
                            cancelButtonText: 'Tidak, batalkan!',
                            }).then((result) => {
                            if (result.value) {
                                $('#profil').submit();
                            }
                        })
                    });
                    $('#defaultModal').on('show.bs.modal', function(e) {
                        var $modal = $(this),
                            esseyId = e.relatedTarget.id;
                        $.ajax({
                            type:"GET",
                            url:"{{url('jenis-mustahiq')}}/"+esseyId+"",
                            success: function(data) {
                                $("#jenis").val(data.jenis);
                                $("#keterangan").val(data.keterangan);
                                $("#jumlah_bagian").val(data.jumlah_bagian);
                                $('#profil').attr('action', "{{url('jenis-mustahiq/update')}}/"+esseyId+"");
                            }
                        });
                    });
                });
        </script>
@endsection