@extends('layouts.app')

@section('title',"Edit Transaksi Zakat")
@section('content')
<div class="block-header">
    <h2>BAYAR ZAKAT</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="card">
        	<div class="header">
                <h2>
                    MASUKKAN DATA
                </h2>
            </div>
                    <div class="body">
                    	<form class="form-vertical" id="myform" action="{{route('zakat.update', $transaksi)}}" method="POST">
                    	<h2 class="card-inside-title">DATA MUZAKKI</h2>
							@csrf
                    		{{  method_field('PATCH') }}
							<input type="hidden" name="_idm" value="{{base64_encode($transaksi->muzakki->id)}}">
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" name="nama" id="nm" class="form-control" required="" value="{{$transaksi->muzakki->name}}">
                    				<label class="form-label">Nama Muzakki</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="email" id="tp" name="email" class="form-control" value="{{$transaksi->muzakki->email}}">
                    				<label class="form-label">E-Mail</label>
                    			</div>
                    		</div>
                    		<div class="form-group form-float">
                    			<div class="form-line">
                    				<textarea name="alamat" id="al" rows="4" cols="30" class="form-control no-resize" required="">{{$transaksi->muzakki->alamat}}</textarea>
                    				<label class="form-label">Alamat</label>
                    			</div>
                    		</div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="tp" name="noHP" class="form-control only-num" maxlength="16" value="{{$transaksi->muzakki->nohp}}">
                                    <label class="form-label">Nomor Handphone</label>
                                </div>
                            </div>
                    		<div class="form-group form-float">
                    			<input type="radio" name="kelamin" id="laki-laki" class="with-gap" value="L" required=""
								@if($transaksi->muzakki->jeniskelamin=="L")
								checked
								@endif
								>
                    			<label class="form-label" for="laki-laki">Laki-laki</label>

                    			<input type="radio" name="kelamin" id="perempuan" class="with-gap" value="P"
								@if($transaksi->muzakki->jeniskelamin=="P")
								checked
								@endif
								>
                    			<label class="form-label" for="perempuan">Perempuan</label>
                    		</div>
                    		<h2 class="card-inside-title">DATA ZAKAT</h2>
                            <div class="form-group form-float">
                                <div>
                                    <select name="tipe" id="tipe" required="" class="select">
										<option value="">-- Pilih Jenis Zakat --</option> 
										<option value="1"
											@if($transaksi->jeniszakat_id == 1)
                                                selected
                                            @endif>Zakat Fitrah (Beras)</option> 
										<option value="2"
											@if($transaksi->jeniszakat_id == 2)
                                                selected
                                            @endif>Zakat Fitrah (Uang)</option>
                                        <option value="3"
                                            @if($transaksi->jeniszakat_id == 3)
                                                selected
                                            @endif>Zakat Mal</option>
                                        <option value="4"
                                            @if($transaksi->jeniszakat_id == 4)
                                                selected
                                            @endif>Infaq</option>
                                    </select>
                                </div>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" required="" name="jiwa" id="jiwa" class="form-control only-num" placeholder="Jumlah Jiwa"value="{{$transaksi->jiwa}}">
                                </div>
                                <span class="input-group-addon">Jiwa</span>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="beras" name="beras" class="form-control dec-num" placeholder="Jumlah Beras"value="{{$transaksi->beras_fitrah}}">
                                </div>
                                <span class="input-group-addon">Liter</span>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="uang" id="uang" class="form-control only-num" placeholder="Jumlah Zakat Fitrah Uang"value="{{$transaksi->uang_fitrah}}">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="maal" id="maal" class="form-control only-num" placeholder="Jumlah Zakat Maal"value="{{$transaksi->zakat_maal}}">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="infaq" id="infaq" class="form-control only-num" placeholder="Jumlah Infaq"value="{{$transaksi->infaq}}">
                    			</div>
                    		</div>
                    		<div class="row clearfix">
                                <div class="">
                                <input type="button" name="insert" id="insert" value="MASUKKAN" class="btn btn-primary m-t-15 waves-effect">
                                <input type="reset" class="btn btn-primary m-t-15 waves-effect" value="RESET">
                                </div>
                            </div>
                    	</form>
                    </div>
        </div>
    </div>
</div>
<script>
	$(document).ready( function () {
			$( ".only-num" ).keypress(function(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))
					return false;
				return true;
			});
			$( ".dec-num" ).keypress(function(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode != 46 &&(charCode < 48 || charCode > 57)))
					return false;
				return true;
			});

            $( "#tipe" ).change(function() {
                var tipe = $( "#tipe" ).val();
                if (tipe == "1") {
                    $( "#uang" ).hide();
                    $( "#maal" ).hide();
                    $( "#infaq" ).hide();
                } else if (tipe == "2"){
                    $( "#beras" ).hide();
                    $( "#maal" ).hide();
                    $( "#infaq" ).hide();
                } else if (tipe == "3"){
                    $( "#uang" ).hide();
                    $( "#beras" ).hide();
                    $( "#infaq" ).hide();
                } else if (tipe == "4"){
                    $( "#uang" ).hide();
                    $( "#maal" ).hide();
                    $( "#beras" ).hide();
                } 
            });
			$( "#beras" ).focus(function() {
				var jiwa = $( "#jiwa" ).val();
				var beras = 3.5;
				var res = jiwa*beras;
				$( "#beras" ).val(res);
			});
			$( "#uang" ).focus(function() {
				var jiwa = $( "#jiwa" ).val();
				var nominal = $("#tipe option:selected").val();
				if(nominal == "0"){
					$("#uang").val("0");
				} else {
					$.ajax({
						type:"GET",
						url:"{{url('nominal')}}/"+nominal+"",
						success: function(data) {
							var total = data.nominal*jiwa;
							$("#uang").val(total);
						}
					});
				}
			});
			$("#insert").click(function(){
				swal({
					title: 'Apakah Datanya Sudah Sesuai?',
					text: "Pastikan Data Yang Anda Berikan Sesuai",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, Sudah Sesuai',
 					cancelButtonText: 'Tidak, batalkan!',
					}).then((result) => {
					if (result.value) {
						$('#myform').submit();
					}
					})
			});
	} );
</script>
@endsection