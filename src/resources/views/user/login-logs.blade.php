@extends('layouts.app')

@section('title', 'Data Login Pengguna')
@section('content')
    <div class="block-header">
        <h2>DAFTAR LOGIN PENGGUNA</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-11">
                            <h2>
                                DAFTAR LOGIN PENGGUNA
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="body">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="tbuser">
                        <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>ALAMAT IP</th>
                            <th>OS</th>
                            <th>BROWSER</th>
                            <th>WAKTU MASUK</th>
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
                    url: '{{ url("log-pengguna") }}'
                },
                columns: [
                    {data: 'nama', name: 'nama'},
                    {data: 'ip_address', name: 'ip_address'},
                    {data: 'OS', name: 'OS'},
                    {data: 'browser', name: 'browser'},
                    {data: 'created_at', name: 'created_at', searchable: false},
                ],
            });
        } );
    </script>
@endsection