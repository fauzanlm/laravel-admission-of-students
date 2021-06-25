@extends('layouts.template')
@section('user', Auth::user()->name)
@section('title', 'Detail Pendaftar - Admin')
@section('css')
<style>
            body {font-family: Arial, Helvetica, sans-serif;}

            #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }
            #myImg1 {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }
            #myImg2 {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }
            #myImg3 {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            }

            #myImg:hover {opacity: 0.7;}

            /* The Modal (background) */
            .modal1 {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 15%; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: scroll; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
            }

            /* Modal Content (image) */
            .modal-content1 {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 500px;
            }

            /* Caption of Modal Image */
            #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 500px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
            }

            /* Add Animation */
            .modal-content1, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.4s;
            animation-name: zoom;
            animation-duration: 0.4s;
            }

            @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
            }

            @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
            }

            /* The Close Button */
            .close {
            position: absolute;
            top: 20%;
            right: 20%;
            color: #ffffff;
            font-size: 40px;
            font-weight: bold;
            transition: 0.2s;
            }

            .close:hover,
            .close:focus {
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
            }

            /* 100% Image Width on Smaller Screens */
            @media only screen and (max-width: 500px){
            .modal-content {
                width: 80%;
            }
            }
        </style>
@endsection
@section('content')
            <div class="justify-content-center">
    <div class="py-1">
        <div class="max-w-7xl  sm:px-1 lg:px-1">
            <div class="">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Pendaftar</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail</li>
            </ol>
            </nav>
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>   
            @endif
            <br>
                <div class="container px-5">
                    <div class="card border-dark mb-3" style="max-width: 63rem;">
                        <div class="card-header font-sans font-bold text-center text-xl">Biodata</div>
                        <div class="card-body text-dark font-sans">
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    NISN
                                </div>
                                <div class="col">
                                    : {{ $user->nisn }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Nama
                                </div>
                                <div class="col">
                                    : {{ $user->name }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Jenis Kelamin
                                </div>
                                <div class="col">
                                    : {{ $user->jk }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Alamat Lengkap
                                </div>
                                <div class="col">
                                    : {{ $user->alamat }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Tempat Lahir
                                </div>
                                <div class="col">
                                    : {{ $user->tempat_lahir }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Tanggal Lahir
                                </div>
                                <div class="col">
                                    : {{ $user->tanggal_lahir }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Nomor Telepon
                                </div>
                                <div class="col">
                                    : {{ $user->no_hp }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Asal Sekolah
                                </div>
                                <div class="col">
                                    : {{ $user->asal_sekolah }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Tahun Lulus
                                </div>
                                <div class="col">
                                    : {{ $user->tahun_lulus }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Agama
                                </div>
                                <div class="col">
                                    : {{ $user->agama }}
                                </div>
                            </div>
                            <div class="row align-items-start px-2">
                                <div class="col font-bold">
                                    Email
                                </div>
                                <div class="col">
                                    : {{ $user->email }}
                                </div>
                            </div>
                        </div>    
                </div>
            <div class="card bg-gradient-to-r from-red-500 to-blue-500">
            <h3 class="font-sans font-bold text-center text-light text-xl py-1 mt-1">Dokumen - dokumen</h3>
            @if($doc == NULL)
                <div class="card border-dark mb-3" style="max-width: auto;">
                    
                        <h3 class="font-sans font-bold text-center text-danger text-xl py-4 mt-1">Tidak Ada Dokumen</h3>    
                </div>
            @else
            <div class="container">
                <div class="row gx-2">
                    <div class="col">
                        <div class="card border-dark mb-3" style="max-width: 30rem;">
                            <div class="card-header font-sans font-bold text-center text-xl">Kartu Keluarga</div>
                            <div class="card-body text-dark">
                            @if($doc->kk != NULL)
                                <img id="myImg" class="rounded mx-auto d-block" src="{{ asset('image/'.$doc->kk)}}" width="300px">
                            @else
                                <p class="text-bold text-center text-danger">Tidak ada data</p>
                            @endif
                            </div>    
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark mb-3" style="max-width: 30rem;">
                            <div class="card-header font-sans font-bold text-center text-xl">Akte Kelahiran</div>
                            <div class="card-body text-dark">
                            @if($doc->akte != NULL)
                                <img id="myImg1" class="rounded mx-auto d-block" src="{{ asset('image/'.$doc->akte)}}" width="300px">
                            @else
                                <p class="text-bold text-center text-danger">Tidak ada data</p>
                            @endif
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row gx-2">
                    <div class="col">
                        <div class="card border-dark " style="max-width: 30rem;">
                            <div class="card-header font-sans font-bold text-center text-xl">SKHUN</div>
                            <div class="card-body text-dark">
                            @if($doc->skhun != NULL)
                                <img id="myImg2" class="rounded mx-auto d-block" src="{{ asset('image/'.$doc->skhun)}}" width="300px">
                            @else
                                <p class="text-bold text-center text-danger">Tidak ada data</p>
                            @endif
                            </div>    
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-dark " style="max-width: 30rem;">
                            <div class="card-header font-sans font-bold text-center text-xl">Ijazah</div>
                            <div class="card-body text-dark">
                            @if($doc->ijazah != NULL)
                                <img id="myImg3" class="rounded mx-auto d-block" src="{{ asset('image/'.$doc->ijazah)}}" width="300px">
                            @else
                                <p class="text-bold text-center text-danger">Tidak ada data</p>
                            @endif
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            @endif    
            </div>

                            
                <!-- The Modal -->
                <div id="myModal" class="modal1">


                <!-- The Close Button -->
                <span class="close">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content1" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
                </div>

                </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg1");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg2");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg3");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
            }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    </script>

    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 3000); // <-- time in milliseconds
    </script>
    
@endsection
