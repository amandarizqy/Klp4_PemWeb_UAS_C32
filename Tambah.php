<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>

    <!-- Bootstrap 5.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="UAS.css">

</head>
<body>

<header class="bg-primary text-white text-center py-4">
    <h1>Tambah Transaksi</h1>
</header>

<nav class="bg-dark">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link text-white" href="Catatan.html">Catatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-white bg-secondary" href="Tambah.html">Tambah</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="Kategori.html">Kategori</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="Aset.html">Aset</a>
        </li>
    </ul>
</nav>

<!-- TOMBOL DI TENGAH -->
<div class="container centered-container">
    <div class="btn-group-custom text-center">
        <a href="Pendapatan.php" class="btn btn-success btn-lg">Pendapatan</a>
        <a href="Pengeluaran.php" class="btn btn-danger btn-lg">Pengeluaran</a>
        <a href="Transfer.php" class="btn btn-warning btn-lg text-white">Transfer</a>
    </div>
</div>

<footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; Create by Nayla Putri Innayah</p>
</footer>

<!-- Bootstrap JS (optional if needed) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

