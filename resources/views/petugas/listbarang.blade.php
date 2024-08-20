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
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="g-sidenav-show  bg-gray-100">
    {{-- @include('partials.transaksi.checkout') --}}
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
            border-spacing: 0 5px;
        }

        #billTable td {
            padding: 5px;
            text-align: left;
        }

        #billTable th {
            background-color: #f8f9fa;
        }
    </style>

    <script>
        $(document).ready(function() {
            let purchaseData = [];

            function calculateTotal() {
                let total = purchaseData.reduce((sum, item) => sum + item.total_hrg, 0);
                return total;
            }

            function updateTotalHarga() {
                const totalHarga = calculateTotal();
                $('.total-harga').text(totalHarga.toLocaleString());
            }

            function updateQuantityDisplay(container, quantity) {
                container.find('.jumlah').text(quantity);
            }

            $('#checkoutBtn').click(function() {
                const metodePembayaran = $('#metodepembayaran').val();
                if (!metodePembayaran) {
                    alert('Pilih metode pembayaran terlebih dahulu');
                    return;
                }
                const dataToSend = purchaseData.map(item => {
                    return {
                        kode_barang: item.kode_barang,
                        quantity: item.quantity,
                        price: item.price,
                        metode_pembayaran: metodePembayaran
                    };
                });

                $.ajax({
                    url: '{{ route('checkout.store') }}',
                    type: 'POST',
                    data: {
                        purchaseData: dataToSend,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        window.location.href = '{{ route('receipt') }}';
                    },
                    error: function(xhr, status, error) {
                        console.error('Error during checkout:', error);
                        alert('Checkout failed. Please try again.');
                    }
                });
            });


            $('#bill').click(function() {
                $('#billTable tbody').empty();

                purchaseData.forEach(item => {
                    let row = `
        <tr>
            <td>${item.nama_barang}</td>
            <td>${item.quantity}</td>
            <td>${item.total_hrg.toLocaleString()}</td>
        </tr>`;
                    $('#billTable tbody').append(row);
                });

                $('#billModal').modal('show');
                updateTotalHarga();
            });

            $('.transaksibtn button').click(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();
                const namaBarang = container.find('#nb').text();
                const hargaBarang = parseFloat(container.find('#hrg span').text().replace(/\./g, '')
                    .replace(',', '.'));
                const stokBarang = parseInt(container.find('#stk span').text());
                const quantity = 1;

                let existingItem = purchaseData.find(item => item.kode_barang === kodeBarang);

                if (existingItem) {
                    existingItem.quantity += 1;
                    existingItem.total_hrg = existingItem.price * existingItem.quantity;
                } else {
                    purchaseData.push({
                        nama_barang: namaBarang,
                        kode_barang: kodeBarang,
                        quantity: quantity,
                        price: hargaBarang,
                        stok: stokBarang,
                        total_hrg: hargaBarang * quantity
                    });
                }

                container.find('.transaksibtn').fadeOut('slow', function() {
                    container.find('.jumlah').text(quantity).css('display', 'flex').fadeIn('slow',
                        function() {
                            container.find('.kurangbarang, .tambahbarang').fadeIn('slow');
                        });
                });

                updateTotalHarga();
                console.log(purchaseData);
            });

            let timer;

            function incrementQuantity(container) {
                const kodeBarang = container.find('#kd span').text();
                let existingItem = purchaseData.find(item => item.kode_barang === kodeBarang);

                if (existingItem && existingItem.quantity < existingItem.stok) {
                    existingItem.quantity += 1;
                    existingItem.total_hrg = existingItem.price * existingItem.quantity;
                    updateQuantityDisplay(container, existingItem.quantity);
                } else if (!existingItem) {
                    alert('Item tidak ditemukan');
                } else {
                    alert('Stok tidak mencukupi');
                }

                updateTotalHarga();
                console.log(purchaseData);
            }

            function decrementQuantity(container) {
                const kodeBarang = container.find('#kd span').text();
                let existingItem = purchaseData.find(item => item.kode_barang === kodeBarang);

                if (existingItem && existingItem.quantity > 1) {
                    existingItem.quantity -= 1;
                    existingItem.total_hrg = existingItem.price * existingItem.quantity;
                    updateQuantityDisplay(container, existingItem.quantity);
                } else if (existingItem && existingItem.quantity === 1) {
                    purchaseData = purchaseData.filter(item => item.kode_barang !== kodeBarang);
                    container.find('.kurangbarang, .tambahbarang').fadeOut('slow', function() {
                        container.find('.jumlah').fadeOut('slow', function() {
                            container.find('.transaksibtn').fadeIn('slow');
                        });
                    });
                } else {
                    alert('Item tidak ditemukan atau sudah habis');
                }

                updateTotalHarga();
                console.log(purchaseData);
            }

            $('.tambahbarang').on('mousedown touchstart', function() {
                const container = $(this).closest('.barang');
                incrementQuantity(container);

                timer = setInterval(() => {
                    incrementQuantity(container);
                }, 200);
            }).on('mouseup mouseleave touchend', function() {
                clearInterval(timer);
            });

            $('.kurangbarang').on('mousedown touchstart', function() {
                const container = $(this).closest('.barang');
                decrementQuantity(container);

                timer = setInterval(() => {
                    decrementQuantity(container);
                }, 200);
            }).on('mouseup mouseleave touchend', function() {
                clearInterval(timer);
            });

            $('.jumlah').click(function() {
                const container = $(this).closest('.barang');
                const kodeBarang = container.find('#kd span').text();

                purchaseData = purchaseData.filter(item => item.kode_barang !== kodeBarang);
                container.find('.kurangbarang, .tambahbarang').fadeOut('slow', function() {
                    container.find('.jumlah').fadeOut('slow', function() {
                        container.find('.transaksibtn').fadeIn('slow');
                    });
                });

                updateTotalHarga();
                console.log(purchaseData);
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