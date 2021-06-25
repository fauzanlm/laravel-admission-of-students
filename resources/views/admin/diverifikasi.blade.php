@extends('layouts.template')
@section('user', Auth::user()->name)
@section('title', 'Pendaftar Sudah Diverifikasi - Admin')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ url('/admin/pendaftar') }}">Pendaftar</a></li>
<li class="breadcrumb-item active" aria-current="page">Belum Ditanggapi</li>
@endsection
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
                                            <a href="/admin/detail/{{$dt->nisn}}" class="btn btn-primary">Detail</a><br>
                                            @if($dt->wawancara)
                                                <a href="/admin/terima/{{$dt->id}}" class="btn btn-success" onclick="return confirm('Yakin Akan Menerima Siswa {{$dt->name}}?')">Terima</a>
                                                <button type="button" class="btn btn-danger " data-id="{{$dt->id}}" data-bs-toggle="modal" data-bs-target="{{'#catatan'.$dt->id}}">
                                                    Tolak
                                                </button>
                                            @elseif(date('Y-m-d') == $dt->tanggal_wawancara)
                                                <a href="/admin/wawancara/{{$dt->id}}" class="btn btn-success" target="_blank" onclick="return confirm('Lakukan Wawancara Pada Siswa dan Orang Tua dari {{$dt->name}}?')">Wawancara</a>
                                                <a href="/admin/batalkan/{{$dt->id}}" class="btn btn-danger" onclick="return confirm('Siswa akan dianggap sebagai siswa yang belum ditanggapi, Yakin Akan Membatalkan Siswa {{$dt->name}}?')">Batalkan</a>
                                            @else
                                                <button type="button" class="btn btn-warning " data-id="" data-bs-toggle="modal" data-bs-target="{{'#blmwawancara'.$dt->id}}">
                                                    Wawancara
                                                </button>
                                                <a href="/admin/batalkan/{{$dt->id}}" class="btn btn-danger" onclick="return confirm('Siswa akan dianggap sebagai siswa yang belum ditanggapi, Yakin Akan Membatalkan Siswa {{$dt->name}}?')">Batalkan</a>
                                            @endif
                                        </div>
                                        <!-- modal catatan -->
                                            <div class="modal fade" id="{{'catatan'.$dt->id}}" tabindex="-1" aria-labelledby="catatanModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="catatanModalLabel">Catatan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="" method="post" action="{{url('/admin/tolak/'.$dt->id)}}">
                                                        @csrf
                                                        @method('patch')
                                                            <div class="modal-body">  
                                                                <textarea name="catatan" class="w-full sm:rounded-md" id="catatan" cols="30" rows="4"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Kirim</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#catatan">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- end modal wawancara -->
                                        <!-- modal wawancara -->
                                            <div class="modal fade" id="{{'blmwawancara'.$dt->id}}" tabindex="-1" aria-labelledby="catatanModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="catatanModalLabel">Info</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">  
                                                            Belum memasuki jadwal wawancara siswa {{$dt->name}} <br>
                                                            jadwal wawancara : {{ $dt->tanggal_wawancara }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#catatan">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- end modal wawancara -->
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
        $('#example1').DataTable( {
            scrollY:        '70vh',
            scrollCollapse: true,
            paging:         false,
            responsive : true,
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
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000); // <-- time in milliseconds
    </script>
    <script src="{{ asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
@endsection
