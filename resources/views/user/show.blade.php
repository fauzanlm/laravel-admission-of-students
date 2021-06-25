<x-app-layout>
@section('title', 'Dokumen Anda - SMK Wikrama 1 Garut')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dokumen Anda') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <table class="mt-3 table table content-center" style="width:100%">
                        <thead> 
                            <tr class="text-center">                                                                                
                                <th>NISN</th>
                                <th>Kartu Keluarga</th>
                                <th>Akte Kelahiran</th>
                                <th>SKHUN</th>
                                <th>Ijazah</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="text-center">
                                @if($document != '')
                                    <td rowspan="2" class="align-middle">{{Auth::user()->nisn}}</td>
                                    @if($document->kk == '')
                                        <td class="align-middle" >Tidak Ada data</td>
                                    @else
                                        <td class="align-middle"><img id="myImg" class="rounded mx-auto d-block" src="{{asset('/image/'.$document->kk)}}" width="150px" ></td>
                                    @endif
                                    @if($document->akte == '')
                                        <td class="align-middle" >Tidak Ada data</td>
                                    @else
                                        <td class="align-middle"><img id="myImg1" class="rounded mx-auto d-block" src="{{asset('/image/'.$document->akte)}}" width="150px" ></td>
                                    @endif
                                    @if($document->skhun == '')
                                        <td class="align-middle" >Tidak Ada data</td>
                                    @else
                                        <td class="align-middle"><img id="myImg2" class="rounded mx-auto d-block" src="{{asset('/image/'.$document->skhun)}}" width="150px" ></td>
                                    @endif
                                    @if($document->ijazah == '')
                                        <td class="align-middle" >Tidak Ada data</td>
                                    @else
                                        <td class="align-middle"><img id="myImg3" class="rounded mx-auto d-block" src="{{asset('/image/'.$document->ijazah)}}" width="150px" ></td>
                                    @endif

                                </tr>
                                <tr class="text-center">
                                    @if($document->kk != NULL)
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#kk">
                                                Edit
                                            </button>
                                        
                                    </td>
                                    @else
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#kk">Tambah Data</button>
                                        </td>
                                    @endif

                                    @if($document->akte != NULL)
                                    <td class="align-middle">
                                        <div class="btn-group">
                                            
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#akte">
                                                Edit
                                            </button>
                                        
                                    </td>
                                    @else
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#akte">Tambah Data</button>
                                        </td>
                                    @endif
                                    
                                    @if($document->skhun != NULL)
                                    <td class="align-middle">
                                        
                                            
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#skhun">
                                                Edit
                                            </button>
                                        
                                    </td>
                                    @else
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#skhun">Tambah Data</button>
                                        </td>
                                    @endif

                                    @if($document->ijazah != NULL)
                                    <td class="align-middle">
                                        
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ijazah">
                                                Edit
                                            </button>
                                        
                                    </td>
                                    @else
                                        <td>
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ijazah">Tambah Data</button>
                                        </td>
                                    @endif
                                @else
                                    <td colspan = "6" rowspan=2>Tidak ada data</td>
                                @endif
                                </tr>
                        </tbody>
                    </table>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit -->
    @if($document != NULL)
    <div class="modal fade" id="kk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" method="post" action="{{url('/document/update/'.$document->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                    <div class="modal-body">  
                        <x-jet-input id="kk" class="form-control py-1" type="file" name="kk" :value="old('kk')" autofocus required/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="akte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Akte Kelahiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" method="post" action="{{url('/document/update/'.$document->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                    <div class="modal-body"> 
                        <x-jet-input id="akte" class="form-control py-1" type="file" name="akte" :value="old('akte')" autofocus required/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="skhun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SKHUN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" method="post" action="{{url('/document/update/'.$document->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                    <div class="modal-body">                       
                        <x-jet-input id="skhun" class="form-control py-1" type="file" name="skhun" :value="old('skhun')" autofocus required/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="ijazah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ijazah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" method="post" action="{{url('/document/update/'.$document->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                    <div class="modal-body">
                        <x-jet-input id="ijazah" class="form-control py-1" type="file" name="ijazah" :value="old('ijazah')" autofocus required/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @else
    @endif
    <!-- The Modal -->
    <div id="myModal" class="modal">


    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>

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

</x-app-layout>
