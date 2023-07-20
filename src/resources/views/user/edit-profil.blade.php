@extends('layouts.app')

@section('title', 'Data Pengguna')
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
                                    EDIT PROFIL
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body">
                        <form action="{{route('profil.update',Auth::user())}}" method="post" id="profil">
                            @csrf
                            {{  method_field('PATCH') }}
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" class="form-control" required="" value="{{Auth::user()->name}}">
                    				<label class="form-label">Nama</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="username" class="form-control" required="" value="{{Auth::user()->username}}">
                    				@if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                    @endif
                                    <label class="form-label">Username</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="email" name="email" class="form-control" required="" value="{{Auth::user()->email}}">
                    				<label class="form-label">Email</label>
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
                            title: 'Apakah Profil Anda Sudah Benar?',
                            text: "Periksa Terlebih Dahulu Data Profil Anda!",
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