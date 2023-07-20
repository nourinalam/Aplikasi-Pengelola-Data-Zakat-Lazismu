@extends('layouts.app')

@section('title','Konfirmasi Pembayaran')
@section('content')
    <div class="block-header">
      <h2>DAFTAR MUZAKKI</h2>
    </div>
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<div class="row clearfix">
              <div class="col-xs-12 col-sm-10">
                <h2>
                  CEK ULANG DATA ZAKAT
                </h2>  
              </div>
              <div class="col-xs-12 col-sm-1 align-right">
                <a title="Rubah Data" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="{{ url('edit-transaksi')."/".base64_encode($transaksi->id) }}"><i class="material-icons">border_color</i></a>
              </div>
              <div class="col-xs-12 col-sm-1 align-right">
                <a title="Print Kwitansi" class="btn btn-success btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="{{ url('make-invoice')."/".base64_encode($transaksi->id) }}" target="_blank"><i class="material-icons">print</i></a>
              </div>
              </div>
					</div>
					<div class="body table-responsive">
						<table class="table table-hover">
							<tr>
								<th  class="text-center info" width="20%" colspan="8">DATA MUZAKKI</th>
							</tr>
							<tr>
								<th>NAMA LENGKAP</th>
								<td>{{$transaksi->muzakki->name}}</td>
							</tr>
							<tr>
								<th>NO HP</th>
								<td>{{$transaksi->muzakki->nohp}}</td>
							</tr>
							<tr>
								<th>ALAMAT</th>
								<td>{{$transaksi->muzakki->alamat}}</td>
							</tr>
							<tr>
								<th>JENIS KELAMIN</th>
								<td>
								@if($transaksi->muzakki->jeniskelamin === "L")
									Laki-laki
								@else
									Perempuan
								@endif
								{{--  {{$transaksi->muzakki->jeniskelamin}}  --}}
								</td>
							</tr>
							<tr>
								<th  class="text-center info" colspan="8">DATA ZAKAT</th>
							</tr>
							{{--  <tr>
								<th>TIPE NOMINAL ZAKAT</th>
								<td>
								@if(isset($transaksi->jeniszakat->jenis))
								{{"Rp. ".number_format($transaksi->jeniszakat->jenis,0,'',',').',-' }}
								@else
								Rp. 0,-
								@endif
								</td>
							</tr>  --}}
							<tr>
								<th>JUMLAH JIWA</th>
								<td>{{$transaksi->jiwa}}</td>
							</tr>
							<tr>
								<th>JUMLAH BERAS</th>
								<td>{{$transaksi->beras_fitrah.' Liter' }}</td>
							</tr>
							<tr>
								<th>JUMLAH UANG</th>
								<td>{{"Rp. ".number_format($transaksi->uang_fitrah,0,'',',').',-'}}</td>
							</tr>
							<tr>
								<th>JUMLAH FIDYAH</th>
								<td>{{"Rp. ".number_format($transaksi->fidyah,0,'',',').',-' }}</td>
							</tr>
							<tr>
								<th>JUMLAH ZAKAT MAAL</th>
								<td>{{"Rp. ".number_format($transaksi->zakat_maal,0,'',',').',-' }}</td>
							</tr>
							<tr>
								<th>JUMLAH INFAQ</th>
								<td>{{"Rp. ".number_format($transaksi->infaq,0,'',',').',-' }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
@endsection