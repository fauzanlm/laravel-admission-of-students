@extends('layouts.template')
@section('user', Auth::user()->name)
@section('title', 'Pendaftar Diterima - Admin')

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
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr class="text-center">  
                                <th>No</th>                                                                              
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Wawancara</th>
                                <th>Dokumen</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dt)
                                <tr class="text-center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dt->nisn}}</td>
                                    <td>{{$dt->name}}</td>
                                    @if($dt->wawancara)
                                        <td class="text-primary">
                                            Sudah melakukan wawancara
                                        </td>
                                    @else
                                        <td class="text-danger">
                                            Belum melakukan wawancara
                                        </td>
                                    @endif
                                    @if($dt->doc)
                                        <td class="text-primary">
                                            Sudah melengkapi dokumen
                                        </td>
                                    @else
                                        <td class="text-danger">
                                            Belum melengkapi dokumen
                                        </td>
                                    @endif
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
                                    <td>
                                        <div class="btn-group">
                                            <a href="/admin/detail/{{$dt->nisn}}" class="btn btn-info">Detail</a><br>
                                            <a href="/admin/batal/{{$dt->id}}" class="btn btn-danger" onclick="return confirm('Yakin Akan Membatalkan Siswa {{$dt->name}}?')">Batalkan</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>

            
<!-- ---------------------------------------------- -->
            </div>
        </div>
    </div>
    
    <script>
    $(document).ready(function() {
        $('#example').DataTable( {
            scrollY:        '70vh',
            scrollCollapse: true,
            paging:         false,
            responsive:true,
            columnDefs: [
                {
                    targets: -1,
                    className: 'dt-left'
                },
                {
                    targets: -2,
                    className: 'dt-left'
                },
                {
                    targets: -3,
                    className: 'dt-left'
                },
                {
                    targets: -4,
                    className: 'dt-left'
                },
                {
                    targets: -5,
                    className: 'dt-left'
                }
              ]
        } );
    } );
    </script>
    <script src="{{ asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
@endsection