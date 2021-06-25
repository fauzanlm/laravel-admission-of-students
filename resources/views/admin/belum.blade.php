@extends('layouts.template')
@section('user', Auth::user()->name)
@section('title', 'Pendaftar Belum Ditanggapi - Admin')
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
            @elseif (session('status-danger'))
                <div class="alert alert-danger">
                    {{session('status-danger')}}
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
                                            
                                            @if($dt->status == "diverifikasi")
                                                <a href="/admin/terima/{{$dt->id}}" class="btn btn-success" onclick="return confirm('Yakin Akan Menerima Siswa {{$dt->name}}?')">Terima</a>
                                            @elseif($dt->status == "belum")
                                                <button type="button" class="btn btn-success " data-id="{{$dt->id}}" data-bs-toggle="modal" data-bs-target="{{'#verifikasi'.$dt->id}}">
                                                    Verifikasi
                                                </button>
                                            @endif
                                            
                                            <button type="button" class="btn btn-danger " data-id="{{$dt->id}}" data-bs-toggle="modal" data-bs-target="{{'#catatan'.$dt->id}}">
                                                Tolak
                                            </button>
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
                                            <!-- modal verifikasi -->
                                            <div class="modal fade" id="{{'verifikasi'.$dt->id}}" tabindex="-1" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title font-bold" id="verifikasiModalLabel">Verifikasi Pendaftar</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form class="" method="post" action="{{url('/admin/user/verifikasi/'.$dt->id)}}">
                                                            @csrf
                                                            @method('get')
                                                            @if( $dt->doc )
                                                                <div class="modal-body">  
                                                                    <p class="">Tanggal Wawancara </p> 
                                                                    <input required class="block mt-1 w-full sm:rounded-md" min='<?= date('Y-m-d'); ?>' type="date" name="tanggal_wawancara" id="">
                                                                    <p class="text opacity-75 text-sm mt-2 ml-2">*jadwal wawancara harus setelah hari ini</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Verifikasi</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#verifikasi">Close</button>
                                                                </div>
                                                            @else
                                                                <div class="modal-body">  
                                                                    <p class="font-bold text-danger text-center">Pendaftar Belum Melengkapi Berkas-berkas!</p> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#verifikasi">Close</button>
                                                                </div>
                                                            @endif
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal verifikasi -->
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
