@extends('layouts.app')

@section('title',"Bayar Zakat")
@section('content')
<div class="block-header">
            <h2>BAYAR ZAKAT</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        
                        <a class="waves-effect waves-light btn" onclick="PopupCenter('kalkulator/zc_uang.html','xtf','830','650');">KALKULATOR ZAKAT</a>
                    </div>
                    <div class="body">
                    	<form class="form-vertical" id="myform" action="{{route('zakat.store')}}" method="POST">
                    	<h2 class="card-inside-title">DATA MUZAKKI</h2>
							@csrf
							@include('zakat.input-muzakki')
                    		<h2 class="card-inside-title">DATA ZAKAT</h2>
                            <div class="form-group form-float">
                                <div>
                                    <select name="tipe" id="tipe" required="" class="select">
										<option value="">-- Pilih Jenis Zakat --</option>
										<option value="1">Zakat Fitrah (Beras)</option> 
										<option value="2">Zakat Fitrah (Uang)</option>
                                        <option value="3">Zakat Mal</option>
                                        <option value="4">Infaq</option>
                                    </select>
                                </div>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" required="true" name="jiwa" id="jiwa" class="form-control only-num" placeholder="Jumlah Jiwa">
                                </div>
                                <span class="input-group-addon">Jiwa</span>
                            </div>
                    		<div class="input-group">
                                <div class="form-line">
                                    <input type="text" id="beras" name="beras" class="form-control dec-num" placeholder="Jumlah Beras">
                                </div>
                                <span class="input-group-addon">Liter</span>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="uang" id="uang" class="form-control only-num" placeholder="Jumlah Zakat Fitrah Uang">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="maal" id="maal" class="form-control only-num" placeholder="Jumlah Zakat Maal">
                    			</div>
                    		</div>
                    		<div class="input-group">
                    			<span class="input-group-addon">Rp</span>
                    			<div class="form-line">
                    				<input type="text" name="infaq" id="infaq" class="form-control only-num" placeholder="Jumlah Infaq">
                    			</div>
                    		</div>
                    		<div class="row clearfix">
                                <div class="">
								{{--  <button type="button" class="btn btn-primary m-t-15 waves-effect" id="insert">MASUKKAN</button>  --}}
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
                var tipe = $( "#tipe" ).val();
				var beras = 3.5;
				var res = jiwa*beras;
                if (tipe == "2") {
                    $( "#beras" ).val("0");
                } else {
                    $( "#beras" ).val(res);
                }
				
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
					text: "Jika Data Tidak Sesuai, Anda Bisa Memodifikasinya di Halaman Edit",
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


function PopupCenter(url, title, w, h) {  
    // Fixes dual-screen position                         Most browsers      Firefox  
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;  
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;  
              
    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;  
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;  
              
    var left = ((width / 2) - (w / 2)) + dualScreenLeft;  
    var top = ((height / 2) - (h / 2)) + dualScreenTop;  
    var newWindow = window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);  
  
    // Puts focus on the newWindow  
    if (window.focus) {  
        newWindow.focus();  
    }  
}  
</script>
@endsection