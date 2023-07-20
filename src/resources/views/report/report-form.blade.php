@extends('layouts.app')

@section('title', 'Laporan Transaksi')
@section('content')
<div class="block-header">
            <h2>LAPORAN TRANSAKSI</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    BUAT LAPORAN
                                </h2>
                            </div>
                            {{--  <div class="col-xs-12 col-sm-1 align-right">
                                <a title="General Report" class="btn bg-indigo btn-circle-lg waves-effect waves-circle waves-float col-xs-1" href="{{route('generalreport')}}" target="_blank"><i class="material-icons">assignment</i></a>
                            </div>  --}}
                        </div>
        			</div>
                    <div class="body">
                        <form action="{{route('report.create')}}" method="post" id="profil" target="_blank">
                            @csrf
                            <div class="form-group form-float">
                    			<div class="form-line">
                    				<input type="text" id="tanggal-report" name="tanggal_report" class="datepicker form-control" required="">
                    				<label class="form-label">Tanggal</label>
                    			</div>
                    		</div>
                            <div class="row clearfix">
                                <div class="">
                                <input type="submit" name="tanggal" id="tanggal" value="BUAT" class="btn btn-primary m-t-15 waves-effect">
                                <input type="reset" name="tanggal" id="tanggal" value="BATAL" class="btn btn-primary m-t-15 waves-effect">
                                </div>
                            </div>
                        </form>
                    </div>
        		</div>
        	</div>
        </div>
        <script>
                $(document).ready(function(){
                    $('#tanggal-report').bootstrapMaterialDatePicker({ 
                        weekStart : 0, 
                        time: false 
                    });
                });
        </script>
@endsection