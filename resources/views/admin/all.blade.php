@extends('layouts.template')
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">   
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('user', Auth::user()->name)
@section('title', 'Pendaftar - Admin')
@section('content')
    <div class="py-1">
        <div class="max-w-7xl mx-auto ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>   
            @endif
            <br>
            <div class="container">
                    <table id="example1" class="display" style="width:100%">
                        <thead>
                            <tr class="text-center">  
                                <th>No</th>                                                                              
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Wawancara</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dt->nisn}}</td>
                                    <td>{{$dt->name}}</td>
                                    <td>
                                        @if($dt->wawancara)
                                            Sudah melakukan wawancara
                                        @else
                                            Belum melakukan wawancara
                                        @endif
                                    </td>
                                    <td>
                                        @if($dt->doc)
                                            Sudah melengkapi berkas berkas
                                        @else
                                            Belum melengkapi berkas berkas
                                        @endif
                                    </td>
                                    <td>
                                        @if($dt->status == 'diterima')
                                            Diterima
                                        @elseif($dt->status == 'ditolak')
                                            Ditolak
                                        @elseif($dt->status == 'diverifikasi')
                                            Diverifikasi
                                        @else
                                            Belum Diterima
                                        @endif
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <br>
            <!-- Modal -->

            
<!-- ---------------------------------------------- -->
            </div>
        </div>
    </div>
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],  "paging":false, "scrollY":'70vh', "scrollCollapse":true, "columnDefs": [
                    {
                    "targets": -1,
                    "className": 'dt-left'
                },
                {
                    "targets": -2,
                    "className": 'dt-left'
                },
                {
                    "targets": -3,
                    "className": 'dt-left'
                },
                {
                    "targets": -4,
                    "className": 'dt-left'
                },
                {
                    "targets": -5,
                    "className": 'dt-left'}]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    } );
    </script>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000); // <-- time in milliseconds
    </script>
@endsection
