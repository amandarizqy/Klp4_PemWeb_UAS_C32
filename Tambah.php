<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link.active {
            font-weight: bold;
            color: #0d6efd !important;
        }
        .btn-group-custom {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        footer {
            margin-top: 100px;
        }
    </style>
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Manajemen</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Catatan.php">Catatan</a></li>
                <li class="nav-item"><a class="nav-link active" href="Tambah.php">Tambah</a></li>
                <li class="nav-item"><a class="nav-link" href="Kategori.php">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="Aset.php">Aset</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- BUTTON -->
<div class="container my-5 text-center">
    <h2 class="mb-4">Tambah Transaksi</h2>

    <div class="d-grid gap-3 mx-auto" style="max-width: 300px;">
        <a href="Pendapatan.php" class="btn btn-success btn-lg py-3">Pendapatan</a>
        <a href="Pengeluaran.php" class="btn btn-danger btn-lg py-3">Pengeluaran</a>
        <a href="Transfer.php" class="btn btn-warning btn-lg py-3 text-white">Transfer</a>
    </div>
</div>


<!-- FOOTER -->
<footer class="bg-white text-center py-3 shadow-sm">
    <p class="mb-0 text-muted">&copy; Created by Kelompok 4</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
