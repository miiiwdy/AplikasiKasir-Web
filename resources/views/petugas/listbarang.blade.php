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
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
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
    {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    {{-- <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> --}}
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('partials.transaksi.checkout')
    @include('partials.transaksi.bill')
    {{-- sidebar --}}
    @include('layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark"
                                href="javascript:;">Petugas</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">List Barang</h6>
                </nav>

                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <a href="{{ route('profile.edit') }}">
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
                        <input type="text" id="search-input" name="search" placeholder="Cari Barang / Kode Barang"
                            value="{{ request('search') }}">
                        <select name="sort_by" id="sort-by" onchange="this.form.submit()">
                            <option value="" disabled {{ request('sort_by') == '' ? 'selected' : '' }}>Urutkan
                            </option>
                            <option value="nama_barang_asc"
                                {{ request('sort_by') == 'nama_barang_asc' ? 'selected' : '' }}>A-Z</option>
                            <option value="nama_barang_desc"
                                {{ request('sort_by') == 'nama_barang_desc' ? 'selected' : '' }}>Z-A</option>
                            <option value="harga_asc" {{ request('sort_by') == 'harga_asc' ? 'selected' : '' }}>Harga
                                Rendah</option>
                            <option value="harga_desc" {{ request('sort_by') == 'harga_desc' ? 'selected' : '' }}>Harga
                                Tinggi</option>
                            <option value="stok_asc" {{ request('sort_by') == 'stok_asc' ? 'selected' : '' }}>Stok
                                Rendah</option>
                            <option value="stok_desc" {{ request('sort_by') == 'stok_desc' ? 'selected' : '' }}>Stok
                                Tinggi</option>
                        </select>
                    </form>
                </div>
                <button id="bill" style="border: none; cursor: pointer;" data-bs-toggle="modal"
                    data-bs-target="#billModal">
                    Lihat Bill
                </button>


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
                                    @if ($barang->foto_barang)
                                        <img src="{{ asset('storage/fotos/' . $barang->foto_barang) }}"
                                            alt="{{ $barang->nama_barang }}"
                                            style="width: 80%; height: auto; border-radius: 10px; object-fit: cover;">
                                    @endif
                                </div>
                                <div id="barangdetail">
                                    <h4 id="nb">{{ $barang->nama_barang }}</h4>
                                    <p id="kd">Kode: <span>{{ $barang->kode_barang }}</span></p>
                                    <p id="stk">Stok: <span>{{ $barang->stok }}</span></p>
                                    <p id="hrg">Harga: <span>{{ $idr }}</span></p>
                                </div>
                            </div>
                            <div class="addbarang_btn">
                                <div class="transaksi-indicator">
                                    <button class="kurangbarang">-</button>
                                    <div class="jumlah" style="cursor: pointer">
                                        <button class="jumlah" style="border: none; cursor: pointer;"></button>
                                    </div>
                                    <button class="tambahbarang">+</button>
                                </div>
                                <div class="transaksibtn">
                                    <button class="transaksibtn" style="border: none; cursor: pointer;">Tambah Barang
                                        ini</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <style>
        #billTable {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        #billTable th, #billTable td {
            padding: 10px; /* Adds padding inside each cell */
            text-align: left; /* Aligns text to the left */
        }
        #billTable th {
            background-color: #f8f9fa; /* Optional: light background for header */
        }
    </style>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var billModal = document.getElementById('billModal');
            billModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget; 
                var purchaseData = JSON.parse(button.getAttribute('data-purchase'));
                var tableBody = billModal.querySelector('#billTable tbody');
                tableBody.innerHTML = ''; 

                if (purchaseData.length > 0) {
                    purchaseData.forEach(function(item) {
                        var row = document.createElement('tr');
                        var nameCell = document.createElement('td');
                        var quantityCell = document.createElement('td');

                        nameCell.textContent = item.nama_barang;
                        quantityCell.textContent = item.quantity;

                        row.appendChild(nameCell);
                        row.appendChild(quantityCell);
                        tableBody.appendChild(row);
                    });
                } else {
                    var row = document.createElement('tr');
                    var cell = document.createElement('td');
                    cell.colSpan = 2;
                    cell.textContent = 'No items selected.';
                    row.appendChild(cell);
                    tableBody.appendChild(row);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            let purchaseData = [];
            let interval;

            $('#bill').click(function() {
                if (purchaseData.length > 0) {
                    populateBillTable(purchaseData);
                    $('#billModal').modal('show');
                } else {
                    alert('No items selected.');
                }
            });

            function populateBillTable(data) {
                const $tableBody = $('#billTable tbody');
                $tableBody.empty(); 

                data.forEach(item => {
                    const row = `
                    <tr>
                        <td>${item.nama_barang}</td>
                        <td>${item.quantity}</td>
                    </tr>
                `;
                    $tableBody.append(row);
                });
            }

            $('.transaksibtn button').click(function() {
                const container = $(this).closest('.barang');
                const namaBarang = container.find('#nb').text();
                const kodeBarang = container.find('#kd span').text();

                console.log('Adding item:', {
                    namaBarang,
                    kodeBarang
                });

                let item = purchaseData.find(data => data.kode_barang === kodeBarang);

                if (!item) {
                    purchaseData.push({
                        nama_barang: namaBarang,
                        kode_barang: kodeBarang,
                        quantity: 1
                    });
                }

                container.find('.transaksibtn').fadeOut('slow', function() {
                    container.find('.jumlah').text(1).css('display', 'flex').fadeIn('slow',
                        function() {
                            container.find('.kurangbarang, .tambahbarang').fadeIn('slow');
                        });
                });
            });

            $('.tambahbarang').click(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();

                let item = purchaseData.find(data => data.kode_barang === kodeBarang);
                if (item) {
                    item.quantity += 1;
                    container.find('.jumlah').text(item.quantity);

                    console.log('Increased quantity for:', {
                        kodeBarang,
                        newQuantity: item.quantity
                    });
                }
            });

            $('.kurangbarang').click(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();

                let item = purchaseData.find(data => data.kode_barang === kodeBarang);
                if (item) {
                    if (item.quantity > 1) {
                        item.quantity -= 1;
                        container.find('.jumlah').text(item.quantity);

                        console.log('Decreased quantity for:', {
                            kodeBarang,
                            newQuantity: item.quantity
                        });
                    } else {
                        purchaseData = purchaseData.filter(data => data.kode_barang !== kodeBarang);
                        container.find('.kurangbarang, .tambahbarang').fadeOut('slow', function() {
                            container.find('.jumlah').fadeOut('slow', function() {
                                container.find('.transaksibtn').fadeIn('slow');
                            });
                        });

                        console.log('Removed item:', {
                            kodeBarang
                        });
                    }
                }
            });

            $('.tambahbarang').mousedown(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();
                interval = setInterval(function() {
                    let item = purchaseData.find(data => data.kode_barang === kodeBarang);
                    if (item) {
                        item.quantity += 1;
                        container.find('.jumlah').text(item.quantity);
                    }
                }, 200);
            });

            $('.kurangbarang').mousedown(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();
                interval = setInterval(function() {
                    let item = purchaseData.find(data => data.kode_barang === kodeBarang);
                    if (item) {
                        if (item.quantity > 1) {
                            item.quantity -= 1;
                            container.find('.jumlah').text(item.quantity);
                        } else {
                            purchaseData = purchaseData.filter(data => data.kode_barang !==
                                kodeBarang);
                            container.find('.kurangbarang, .tambahbarang').fadeOut('slow',
                            function() {
                                container.find('.jumlah').fadeOut('slow', function() {
                                    container.find('.transaksibtn').fadeIn('slow');
                                });
                            });
                        }
                    }
                }, 200);
            });

            $('.jumlah').click(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();

                purchaseData = purchaseData.filter(data => data.kode_barang !== kodeBarang);
                container.find('.kurangbarang, .tambahbarang').fadeOut('slow', function() {
                    container.find('.jumlah').fadeOut('slow', function() {
                        container.find('.transaksibtn').fadeIn('slow');
                    });
                });

                console.log('Removed item on jumlah click:', {
                    kodeBarang
                });
            });

            $(document).mouseup(function() {
                clearInterval(interval);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkoutModal = document.getElementById('checkoutModal');
            const quantityInput = document.getElementById('quantity');
            const totalHargaInput = document.getElementById('total_harga');

            checkoutModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const namaBarang = button.getAttribute('data-nama');
                const kodeBarang = button.getAttribute('data-kode');
                const hargaBarang = button.getAttribute('data-harga');
                const stokBarang = button.getAttribute('data-stok');

                document.getElementById('nama_barang').value = namaBarang;
                document.getElementById('kode_barang').value = kodeBarang;
                document.getElementById('harga').value = hargaBarang;
                quantityInput.value = 1;
                totalHargaInput.value = hargaBarang;

                quantityInput.max = stokBarang;
            });

            quantityInput.addEventListener('input', function() {
                const hargaBarang = parseFloat(document.getElementById('harga').value);
                const quantity = parseInt(quantityInput.value, 10);

                if (quantity > 0 && quantity <= quantityInput.max) {
                    totalHargaInput.value = (hargaBarang * quantity).toFixed(2);
                } else {
                    totalHargaInput.value = hargaBarang.toFixed(2); // Default total price
                }
            });
        });
    </script>

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
