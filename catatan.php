<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catatan Keuangan</title>
    <link rel="stylesheet" href="catatan.css">
</head>
<body>

<header>
    <h1>Catatan Keuangan</h1>
</header>

<nav>
    <ul>
        <li><a href="Catatan.html" class="aktif">Catatan</a></li>
        <li><a href="Tambah.html">Tambah</a></li>
        <li><a href="Kategori.html">Kategori</a></li>
        <li><a href="Aset.html">Aset</a></li>
    </ul>
</nav>

<div class="container">
    <section class="main-content">
        <h2>Ringkasan Keuangan</h2>
        <p>Berikut adalah catatan pendapatan dan pengeluaran Anda.</p>

        <h3>Pendapatan</h3>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>2025-07-01</td>
                <td>Gaji Bulanan</td>
                <td>Rp5.000.000</td>
            </tr>
            <tr>
                <td>2025-07-03</td>
                <td>Freelance</td>
                <td>Rp1.000.000</td>
            </tr>
        </table>

        <h3>Pengeluaran</h3>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <td>2025-07-02</td>
                <td>Makan Siang</td>
                <td>Rp50.000</td>
            </tr>
            <tr>
                <td>2025-07-04</td>
                <td>Bensin</td>
                <td>Rp100.000</td>
            </tr>
        </table>
    </section>

</div>

<footer>
    <p>&copy; Create by Kelompok 4</p>
</footer>

</body>
</html>
