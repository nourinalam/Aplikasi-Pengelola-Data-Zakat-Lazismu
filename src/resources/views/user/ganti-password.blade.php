@extends('layouts.app')

@section('title', 'Ganti Password')
@section('content')
<div class="block-header">
            <h2>PROFIL PENGGUNA</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    GANTI PASSWORD
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body">
                        <form action="{{route('password.update',Auth::user()->id)}}" method="post" id="profil">
                            @csrf
                            {{  method_field('PATCH') }}
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="password" name="password" class="form-control" required="">
                    				<label class="form-label">Password</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="password" name="konfirmasi" class="form-control" required="">
                    				<label class="form-label">Konfirmasi Password</label>
                    			</div>
                    		</div>
                            <div class="row clearfix">
                                <div class="">
                                <input type="button" name="insert" id="insert" value="GANTI" class="btn btn-primary m-t-15 waves-effect">
                                </div>
                            </div>
                        </form>
                    </div>
        		</div>
        	</div>
        </div>
        <script>
                $(document).ready(function(){
                    $("#insert").click(function(){
                        swal({
                            title: 'Apakah Password Sudah Benar?',
                            text: "Periksa Terlebih Dahulu Password Anda!",
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
                });
        </script>
@endsection