@extends('layouts.app')

@section('title', 'Data Pengguna')
@section('content')
<div class="block-header">
            <h2>DAFTAR PENGGUNA</h2>
        </div>
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        		<div class="card">
        			<div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-11">
                                <h2>
                                    DAFTAR PENGGUNA
                                </h2>  
                            </div>
                        </div>
        			</div>
                    <div class="body">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbuser">
                                <thead>
                                    <tr>
                                        <th>NAMA</th>
                                        <th>USERNAME</th>
                                        <th>EMAIL</th>
                                        <th>ROLE</th>
                                        <th>STATUS</th>
                                        <th>WAKTU DAFTAR</th>
                                        <th>AKSI</th>
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
                $('#tbuser').DataTable({
                    responsive: true,
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ url("list-pengguna") }}'
                    },
                    columns: [
                    {data: 'name', name: 'name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'role', name: 'roles.name'},
                    {data: 'status', name: 'status'},
                    {data: 'created_at', name: 'created_at', searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                });
            } );
        </script>
@endsection