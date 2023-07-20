@extends('layouts.app')

@section('title', 'Jenis Zakat')
@section('content')
<div class="block-header">
            <h2>JENIS ZAKAT</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    JENIS ZAKAT
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{--  <th>#</th>  --}}
                                    <th>JENIS</th>
                                    <th>NOMINAL</th>
                                    {{--  <th>AKSI</th>  --}}
                                </tr>
                            </thead>
                            <tbody>
                            
                            <form action="{{route('jeniszakat.store')}}" method="post" id="jenis">
                            @csrf
                                @for($i = 0; $i < 4; $i++)
                                    <tr>
                                        {{--  <td>{{$i}}</td>  --}}
                                        <td><input type="text" name="jenis[]" class="form-control only-num" placeholder="Jenis"></td>
                                        <td><input type="text" name="nominal[]" class="form-control only-num" placeholder="Nominal"></td>
                                        {{--  <td><a href="#" id="{{$i}}" class="btn bg-indigo waves-effect modal" data-toggle="modal" data-target="#defaultModal">Edit</a></td>  --}}
                                    </tr>
                                @endfor
                                {{--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  --}}
                                    <input type="button" name="insert" id="insert" value="MASUKKAN" class="btn btn-primary m-t-15 waves-effect">
                                {{--  </div>  --}}
                            </form>
                            </tbody>
                        </table>
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
                                $('#jenis').submit();
                            }
                            })
                    });
                    $('#defaultModal').on('show.bs.modal', function(e) {
                        var $modal = $(this),
                            esseyId = e.relatedTarget.id;
                        $.ajax({
                            type:"GET",
                            url:"{{url('jenis-zakat')}}/"+esseyId+"",
                            success: function(data) {
                                $("#jenis").val(data.jenis);
                                $("#nominal").val(data.nominal);
                                $('#profil').attr('action', "{{url('jenis-zakat/update')}}/"+esseyId+"");
                            }
                        });
                    });
                });
        </script>
@endsection