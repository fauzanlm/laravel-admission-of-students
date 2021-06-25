<x-app-layout>
@section('title','Home - SMK Wikrama 1 Garut')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>   
            @endif
            <br>
           <div class="ml-7 my-4">
                <div class="jumbotron text-center">
                    <h1 class="text-danger display-4">Selamat Datang {{Auth::user()->name}} </h1>
                    <p class="lead">
                        Selamat Datang di SMK Wikrama 1 Garut
                    </p>
                        <hr class="mr-8">
                    <p>
                    @if($data != '')
                        @if($data->kk != '' OR $data->akte != '' OR $data->skhun != '' OR $data->ijazah != '')
                                Kamu sudah mengisi berkas-berkas pendaftaran <br> 
                                <button type="button" class="btn btn-outline-primary mt-2 btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Cek Hasil
                                </button>
                        @elseif($data->kk == '' OR $data->akte == '' OR $data->skhun == '' OR $data->ijazah == '')
                                Kamu Belum Melengkapi semua berkas berkas Silahkan Lengkapi <a class="text-blue-500" href="{{ route('document') }}">disini</a></p>
                        @endif
                    @else
                        Kamu Belum Mengisi Berkas-berkas Pendaftaran, Silahkan isi <a class="text-blue-500" href="{{ route('input') }}">disini</a></p>
                    @endif
                    </p>
                </div>
                <br>
            </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keterangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if(Auth::user()->status == 'diterima')
                        <p class="text-primary">Selamat Anda Lolos!
                    @elseif(Auth::user()->status == 'ditolak')
                        <p class="text-danger">Maaf Anda Tidak Lolos Seleksi.</p>
                            Alasan: <br>
                                    <div class="container">
                                    @if(Auth::user()->catatan != NULL)
                                        {{Auth::user()->catatan}}
                                    @else
                                        Tidak Ada Catatan
                                    @endif
                                    </div>
                    @elseif(Auth::user()->status == 'diverifikasi')
                        <p class="text-success font-bold">Selamat Anda Lolos Tahap 1 (Pemberkasan)</p>
                            Jadwal Wawancara Anda adalah {{ date('d-F-Y, H:i', strtotime(Auth::user()->tanggal_wawancara . '14:00')) }} PM
                                    
                    @else
                        <p class="text-secondary">Mohon Menunggu info selanjutnya...</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000); // <-- time in milliseconds
    </script>
</x-app-layout>
