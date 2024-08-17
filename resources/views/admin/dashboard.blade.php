{{-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EasyCashier | Dashboard Petugas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="title">
            <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.5 8.25V5.5H27.5V8.25H5.5ZM5.5 27.5V19.25H4.125V16.5L5.5 9.625H27.5L28.875 16.5V19.25H27.5V27.5H24.75V19.25H19.25V27.5H5.5ZM8.25 24.75H16.5V19.25H8.25V24.75ZM6.94375 16.5H26.0562L25.2313 12.375H7.76875L6.94375 16.5Z" fill="#344767" />
            </svg>
            <h1>EasyCashier</h1>
        </div>
        <div class="dashboardtitle">
            <h1>Dashboard</h1>
            <span>Petugas</span>
        </div>
    </header>
    <main>
    <aside>
        <div class="sidebaritem">
            <div id="cube">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 22C6.45 22 5.97917 21.8042 5.5875 21.4125C5.19583 21.0208 5 20.55 5 20C5 19.45 5.19583 18.9792 5.5875 18.5875C5.97917 18.1958 6.45 18 7 18C7.55 18 8.02083 18.1958 8.4125 18.5875C8.80417 18.9792 9 19.45 9 20C9 20.55 8.80417 21.0208 8.4125 21.4125C8.02083 21.8042 7.55 22 7 22ZM17 22C16.45 22 15.9792 21.8042 15.5875 21.4125C15.1958 21.0208 15 20.55 15 20C15 19.45 15.1958 18.9792 15.5875 18.5875C15.9792 18.1958 16.45 18 17 18C17.55 18 18.0208 18.1958 18.4125 18.5875C18.8042 18.9792 19 19.45 19 20C19 20.55 18.8042 21.0208 18.4125 21.4125C18.0208 21.8042 17.55 22 17 22ZM6.15 6L8.55 11H15.55L18.3 6H6.15ZM5.2 4H19.95C20.3333 4 20.625 4.17083 20.825 4.5125C21.025 4.85417 21.0333 5.2 20.85 5.55L17.3 11.95C17.1167 12.2833 16.8708 12.5417 16.5625 12.725C16.2542 12.9083 15.9167 13 15.55 13H8.1L7 15H19V17H7C6.25 17 5.68333 16.6708 5.3 16.0125C4.91667 15.3542 4.9 14.7 5.25 14.05L6.6 11.6L3 4H1V2H4.25L5.2 4Z" fill="#6B6B6B"/>
                    </svg>                    
            </div>
            <h3>List Barang</3>
        </div>
    </aside>
        <div class="container_barang">
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
                        <form method="GET" action="{{ route('barangs.edit', $barang->id) }}">
                        <button id="transaksibtn"style="border: none; cursor: pointer;">
                            <center>Transaksi Barang ini</center>
                        </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
    <footer></footer>
</body>

<style>

    * {
        font-family: 'Open Sans', sans-serif;
        margin: 0;
    }

    html,
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        background-color: #F8F9FA;
    }

    /* header */
    header {
        display: flex;
        flex-direction: row;
        width: auto;
        height: auto;
        padding: 30px 0 20px 80px;
    }
    .title {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-right: 135px;
    }
    .title h1 {
        font-weight: 600;
        color: #344767;
        font-size: 19px;
        margin-left: 5px;
    }
    .dashboardtitle {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        justify-content: flex-start;
    }
    .dashboardtitle h1{
        font-size: 17px;
        font-weight: 600;
        color: #344767;
        letter-spacing: -0.3%;
    }
    .dashboardtitle span{
        line-height: -0.4%;
        font-size: 15px;
        font-weight: 500;
        color: #67748E;
        letter-spacing: -0.3%;
    }
    

    /* barang */
    .container_barang {
        height: 100vh;
    }
    .barang {
        width: 290px;
        height: 150px;
        border: 1.4px solid #DDDDDD;
        background: rgb(255,255,255);
        background: linear-gradient(0deg, rgba(255,255,255,1) 47%, rgba(240,240,240,1) 100%);
        border-radius: 16px;
        filter: drop-shadow(10px 19px 20px #6161611c);
    }

    .barang #column {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        padding: 5px;
        /* justify-content: end; */
    }
    .barang #row {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .barang #barangimages {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28%;
        height: 75px;
        border: 1.5px solid #DDDDDD;
        border-radius: 11px;
        margin: 0 15px 13px 0;
    }
    .barang #barangdetail {
        display: flex;
        flex-direction: column;
        width: auto;
        height: 100%;
        justify-content: flex-start;
    }
    .barang #barangdetail h4 {
        color: #373737;
        font-weight: 700;
        letter-spacing: -0.3px;
        margin-bottom: 3px;
    }
    .barang #barangdetail p {
        color: #5f5f5f;
        font-size: 13px;
    }
    .barang #barangdetail span {
        color: #344767;
        font-weight: 600;
    }
    .barang #transaksibtn {
        color: #ffffff;
        font-weight: 500;
        font-size: 14px;
        width: 99%;
        height: 47px;
        border-radius: 11px;
        background: rgb(255,0,122);
        background: linear-gradient(166deg, rgba(255,0,122,1) 0%, rgba(255,0,199,1) 32%, rgba(160,145,255,1) 88%, rgba(1,225,255,1) 100%);
    }


    /* main */
    main {
        display: flex;
        flex-direction: row;
        width: 100%
    }
    aside {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        background-color: rgba(255, 0, 0, 0.162);
        width: 300px;
        height: 100vh;
        margin-right: 40px
    }
    .sidebaritem {                          
        display: flex;
        flex-direction: row;
        align-items: center;
        width: 190px;
        height: 50px;
        background-color: rgb(16, 77, 12);
    }
    #cube {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background-color: white;
        filter: drop-shadow(0 4 15px #0000005a);
    }

</style>



</html> --}}
