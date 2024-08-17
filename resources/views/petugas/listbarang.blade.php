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
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
  @include('partials.transaksi.checkout')
  {{-- sidebar --}}
  @include('layouts.petugas.sidebar_petugas')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Petugas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">List Barang</h6>
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
    <div class="container-fluid py4">
        <div class="rows">
          <div class="sort-container">
            <form id="search-form" method="GET" action="{{ route('barangs.index') }}">
              <input type="text" id="search-input" name="search" placeholder="Cari Barang / Kode Barang" value="{{ request('search') }}">
              <select name="sort_by" id="sort-by" onchange="this.form.submit()">
                  <option value="" disabled {{ request('sort_by') == '' ? 'selected' : '' }}>Urutkan</option>
                  <option value="nama_barang_asc" {{ request('sort_by') == 'nama_barang_asc' ? 'selected' : '' }}>A-Z</option>
                  <option value="nama_barang_desc" {{ request('sort_by') == 'nama_barang_desc' ? 'selected' : '' }}>Z-A</option>
                  <option value="harga_asc" {{ request('sort_by') == 'harga_asc' ? 'selected' : '' }}>Harga Rendah</option>
                  <option value="harga_desc" {{ request('sort_by') == 'harga_desc' ? 'selected' : '' }}>Harga Tinggi</option>
                  <option value="stok_asc" {{ request('sort_by') == 'stok_asc' ? 'selected' : '' }}>Stok Rendah</option>
                  <option value="stok_desc" {{ request('sort_by') == 'stok_desc' ? 'selected' : '' }}>Stok Tinggi</option>
              </select>
          </form>          
        </div>
        </div>
        <div id="result-container" class="listbarang">
          @foreach ($barangs as $barang)
          @php
              $idr = number_format($barang->harga, 2, ',', '.'); 
          @endphp
          <div class="barang">
              <div id="column">
                  <div id="row">
                      <div id="barangimages">
                          @if($barang->foto_barang)
                          <img src="{{ asset('storage/fotos/' . $barang->foto_barang) }}" alt="{{ $barang->nama_barang }}" style="width: 80%; height: auto; border-radius: 10px; object-fit: cover;">
                      @endif
                      </div>
                      <div id="barangdetail">
                          <h4 id="nb">{{ $barang->nama_barang }}</h4>
                          <p id="kd">Kode: <span>{{ $barang->kode_barang }}</span></p>
                          <p id="stk">Stok: <span>{{ $barang->stok }}</span></p>
                          <p id="hrg">Harga: <span>{{ $idr }}</span></p>
                      </div>
                  </div>
                  <div id="transaksibtn">
                    <button class="transaksi-button" data-bs-toggle="modal" data-bs-target="#checkoutModal"
                            data-nama="{{ $barang->nama_barang }}"
                            data-kode="{{ $barang->kode_barang }}"
                            data-harga="{{ $barang->harga }}"
                            data-stok="{{ $barang->stok }}">
                        Transaksi Barang ini
                    </button>
                </div>
                
              </div>
          </div>
          @endforeach
      </div>
    </div>  
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    document.addEventListener('DOMContentLoaded', function () {
    const checkoutModal = document.getElementById('checkoutModal');
    const quantityInput = document.getElementById('quantity');
    const totalHargaInput = document.getElementById('total_harga');

    checkoutModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const namaBarang = button.getAttribute('data-nama');
        const kodeBarang = button.getAttribute('data-kode');
        const hargaBarang = button.getAttribute('data-harga');
        const stokBarang = button.getAttribute('data-stok');

        document.getElementById('nama_barang').value = namaBarang;
        document.getElementById('kode_barang').value = kodeBarang;
        document.getElementById('harga').value = hargaBarang;
        document.getElementById('stok').value = stokBarang;
        quantityInput.value = 1;
        totalHargaInput.value = hargaBarang; 

        quantityInput.max = stokBarang; 
    });

    quantityInput.addEventListener('input', function () {
        const hargaBarang = document.getElementById('harga').value;
        const quantity = quantityInput.value;

        if (quantity > 0 && quantity <= quantityInput.max) {
            totalHargaInput.value = hargaBarang * quantity;
        } else {
            totalHargaInput.value = hargaBarang;
        }
    });
});


    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });

    $(document).ready(function() {
        var select = $('.custom-select select');
        var selected = $('.custom-select .selected');
        var options = $('.custom-select .option');

        selected.on('click', function() {
            options.toggleClass('show');
        });

        $('.custom-select .option div').on('click', function() {
            var value = $(this).data('value');
            select.val(value).change();
            selected.text($(this).text());
            options.removeClass('show');
        });

        $(document).on('click', function(event) {
            if (!$(event.target).closest('.custom-select').length) {
                options.removeClass('show');
            }
        });
    });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>