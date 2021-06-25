@extends('layouts.template')
@section('user', Auth::user()->name)
@section('title', 'Dashboard - Admin')

@section('content')

          <div class="container">
            <div class="card bg-white">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Pendaftar</h3>
                  <a href="javascript:void(0);">Lihat Laporan</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{ count($data) }}</span>
                    <span>Pendaftar Selama Ini</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> {{ count($data)/7.0 }}%
                    </span>
                    <span class="text-muted">Seminggu Terakhir</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-2">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Minggu Ini
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Minggu Terakhir
                  </span>
                </div>
              </div>
            </div>
        </div>


@endsection