<!doctype html>
  <html lang="en">
  <head>
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Icon -->
        <link rel="icon" href="{{ asset('logo/wk_logo.png')}}">
        <!-- Styles -->
        @yield('css')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('dist/js/adminlte.js')}}"></script>
        <script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
        <script src="{{ asset('dist/js/demo.js')}}"></script>
        <script src="{{ asset('dist/js/pages/dashboard3.js')}}"></script>
        <script src="{{ asset('js/jquery1.min.js')}}"></script>
        <script src="{{ asset('js/popper.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
        <script src="{{ asset('js/jquery1.min.js')}}"></script>
        <script src="{{ asset('js/popper.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
  </head>
  <body class="font-sans antialiased">
      <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
      <div class="custom-menu">
      
      </button>
      </div>
      <div class="img bg-wrap text-center py-3" style="background-image: url( {{asset('logo/bg.jpg')}} );">
        
      <div class="user-logo">
      <div class="img" style="background-image: url({{ asset('logo/admin.jpg')}});"></div>

          
        
      <h3>@yield('user') </h3>
      </div>
      </div>
      <ul class="list-unstyled components mb-5">
      <li class="active">
      <a href="{{ url('/home') }}" ><span class="fa fa-home mr-3"></span> Home</a>
      </li>
      <li>
      <a href="" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"><span class="fa fa-address-book mr-3"></span> Pendaftar</a>
          <div class="collapse" id="dashboard-collapse">
            <ul class="">
              <li><a href="{{ route('pendaftar') }}" class="link-dark rounded"><i class="fa fa-users mr-3"></i>Semua Pendaftar</a></li>
              <li><a href="{{ route('belum') }}" class="link-dark rounded"><i class="fa fa-user mr-3"></i>Belum ditanggapi</a></li>
              <li><a href="{{ route('diverifikasi') }}" class="link-dark rounded "><i class="fa fa-user mr-3"></i>Sudah Diverifikasi</a></li>
              <li><a href="{{ route('diterima') }}" class="link-dark rounded "><i class="fa fa-user mr-3"></i>Pendaftar Diterima</a></li>
              <li><a href="{{ route('ditolak') }}" class="link-dark rounded"><i class="fa fa-user mr-3"></i>Pendaftar Ditolak</a></li>
            </ul>
          </div>
      </li>
              <li><a href="{{ route('admin.profile') }}" class="link-dark rounded"><i class="fa fa-cog mr-3"></i> Edit Profile</a></li>
      <li>
      <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                          this.closest('form').submit(); return confirm('Logout?')" ">
                                        <span class="fa fa-sign-out mr-3"></span>
                                    {{ __('Log Out') }}
                                </a>
      </form>
      </li>
      </ul>
      
      </nav>

      <div id="content" class="">
              
                <!-- Page Heading -->
                

                <!-- Page Content -->
                
          <div class="min-h-screen sm:rounded-sm bg-gray-200">
                    <!-- <div class="px-4 bg-gradient-to-r from-yellow-700  sm:rounded-sm to-blue-700 ">
                      <div class="flex flex-wrap content-center">
                        <div><img src="http://localhost:8000/logo/wk_logo.png" width="100px" height="100px" alt="" class="mx-4 place-self-center mt-4"></div>
                        <div class="font-sans text-left font-bold pt-1 mb-10 mt-10 text-white">
                          <p class="text-4xl mt-3">SMK Wikrama 1 Garut 2021</p>
                          
                        </div>
                      </div>
                    </div> -->
                    <nav class="navbar navbar-expand-lg navbar-dark mb-3" style="background:#5000ac;">
                      <div class="container-fluid">
                      <img src="http://localhost:8000/logo/wk_logo.png" width="50px" height="50px" alt="" class="my-1 mr-1 place-self-center">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                              <p class="text-lg font-bold font-sans text-warning mt-3 ml-1">SMK WIKRAMA 1 GARUT</p>
                            </li>
                          </ul>
                          <form class="d-flex">
                            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                              <i class="fas fa-expand-arrows-alt"></i>
                            </a>
                            
                          </form>
                        </div>
                      </div>
                    </nav>

            <div class="container">
              @yield('content')
              
            </div>
          </div>
     
      </div>
      
      @stack('modals')

      @livewireScripts
      
    </body>
</html>