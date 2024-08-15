@extends('layouts.auth')

@section('content')

<div class="col-md-10 col-lg-8 col-xxl-6">
  <style>
    a {
      border-radius: 10px;
      display: inline-block;
      text-decoration: none;
      color: #000;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    a.menu:hover {
      border-radius: 10px;
      transform: scale(1.05);
      /* Membesar 10% */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      /* Menambah bayangan */
    }
  </style>


  <div class="card mb-0">
    <div class="card-body">
      @include('layouts.logos')
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
          <a href="https://manage.{{ $instansi->web }}" class="menu w-100">
            <div class="card mb-0">
              <div class="row g-0">
                <div class="col-md-2 text-center ">
                  {{-- <i class="ti ti-layout-dashboard img-fluid rounded-start" style="font-size:80px"></i> --}}
                  {{-- <img src="..." class="img-fluid rounded-start" alt="..."> --}}
                </div>
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title">Managemento</h5>
                    <p class="card-text"><small class="text-muted">Pengelolaan Hak Akses Karyawan</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <a href="https://course.{{ $instansi->web }}" class="menu w-100">
            <div class="card mb-0">
              <div class="row g-0">
                <div class="col-md-2 text-center ">
                  {{-- <i class="ti ti-layout-dashboard img-fluid rounded-start" style="font-size:80px"></i> --}}
                  {{-- <img src="..." class="img-fluid rounded-start" alt="..."> --}}
                </div>
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title">MasterCourse</h5>
                    <p class="card-text"><small class="text-muted">Sistem Manajemen Pembelajaran</small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <a href="https://test.{{ $instansi->web }}" class="menu w-100">
            <div class="card mb-0">
              <div class="row g-0">
                <div class="col-md-2 text-center ">
                  {{-- <i class="ti ti-layout-dashboard img-fluid rounded-start" style="font-size:80px"></i> --}}
                  {{-- <img src="..." class="img-fluid rounded-start" alt="..."> --}}
                </div>
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title">MasterTest</h5>
                    <p class="card-text"><small class="text-muted">
                        Sistem Evaluasi dan Try Out
                      </small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
          <a href="https://billing.{{ $instansi->web }}" class="menu w-100">
            <div class="card mb-0">
              <div class="row g-0">
                <div class="col-md-2 text-center ">
                  {{-- <i class="ti ti-layout-dashboard img-fluid rounded-start" style="font-size:80px"></i> --}}
                  {{-- <img src="..." class="img-fluid rounded-start" alt="..."> --}}
                </div>
                <div class="col-md-12">
                  <div class="card-body">
                    <h5 class="card-title">MasterBilling</h5>
                    <p class="card-text"><small class="text-muted">
                        Sistem Keuangan dan Pembayaran
                      </small></p>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
      
      <a href="/profile">

        Hello, {{ Auth::user()->name }}
      </a>

      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-outline-dark btn-block  d-block"><i class="ti ti-power pe-2"></i> Logout</button>
    </form>
    </div>
  </div>
</div>

@endsection