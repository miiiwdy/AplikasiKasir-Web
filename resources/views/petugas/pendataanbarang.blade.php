<!--
=========================================================
* Soft UI Dashboard - v1.0.7
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <title>
    EasyCashier | Petugas
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  {{-- sidebar --}}
  @include('layouts.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Petugas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Pendataan Barang</h6>
        </nav>

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <a href="{{ route('profile.edit')}}">
                    <span class="d-sm-inline d-none">Profile</span>
                </a>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row my-4">
          <div class="col-lg-11 col-md-6 mb-md-0 mb-4">
              <div class="card">
                  <div class="card-header pb-0">
                      <div class="column">   
                          <div class="col-lg-6 col-7">
                              <h6>Pendataan Barang</h6>
                          </div>
                          <button type="button" class="btn btn-primary w-25" data-bs-toggle="modal"
                          data-bs-target="#createModal">Tambah Barang</button>
                       
                      </div>
                  </div>
                  @include("partials.barang.barang_create")
                  <div class="card-body px-0 pb-2">
                      <div class="table-responsive">
                          <table class="table align-items-center mb-0">
                              <thead>
                                  <tr>
                                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                          Nama Barang</th>
                                      <th
                                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                          Kategori</th>
                                      <th
                                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                          Harga</th>
                                      <th
                                          class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                          Stok</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($barangs as $barang)
                                  @php
                                  $idr = number_format($barang->harga, 2, ',', '.'); 
                                  @endphp
                                      <tr>
                                          <td>
                                              <div class="d-flex px-2 py-1">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm">{{ $barang->nama_barang }}</h6>
                                                  </div>
                                              </div>
                                          </td>
                                          <td>
                                              <div class="avatar-group">
                                                  {{ $barang->kategori }}
                                              </div>
                                          </td>
                                          <td>
                                              <div class="avatar-group">
                                                  {{ $idr }}
                                              </div>
                                          </td>
                                          <td>
                                              <div class="avatar-group">
                                                  {{ $barang->stok }}
                                              </div>
                                          </td>
                                          <td>
                                              <div class="">
                                                  <div class="avatar-group d-flex">
                                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                              data-bs-target="#editModal_{{ $barang->id }}" data-book-id="{{ $barang->id }}">
                                                          Edit
                                                      </button>
                                                      @include("partials.barang.barang_edit")
                                                      <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" class="ml-2">
                                                          @csrf
                                                          @method('DELETE')
                                                          <button type="submit" class="btn btn-danger ml-3">Delete</button>
                                                      </form>
                                                  </div>
                                              </div>
                                          </td>                                            
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
 
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>