<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt - EasyCashier</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>
<body>
    <div class="receipt-container">
        <h1 style="text-align: center;">EasyCashier</h1>
        <p>Nama Barang: {{ $nama_barang }}</p>
        <p>Kode Barang: {{ $kode_barang }}</p>
        <p>Harga Satuan: Rp {{ number_format($harga, 2, ',', '.') }}</p>
        <p>Quantity: {{ $quantity }}</p>
        <p>Total Harga: Rp {{ number_format($total_harga, 2, ',', '.') }}</p>
    </div>
</body>
<style>
    * {
        font-family: 'Open Sans', sans-serif;
        letter-spacing: -0.4px;
    }
</style>
</html>

