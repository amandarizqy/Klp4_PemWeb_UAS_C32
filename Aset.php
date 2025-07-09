<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Aset</title>
    <link rel="stylesheet" href="UAS.css">
    <!-- Tambahkan Bootstrap agar tombol terlihat rapi -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
    <h1>Data Aset</h1>
</header>

<nav>
    <ul>
        <li><a href="Catatan.php">Catatan</a></li>
        <li><a href="Tambah.php">Tambah</a></li>
        <li><a href="Kategori.php">Kategori</a></li>
        <li><a href="Aset.php" class="aktif">Aset</a></li>
    </ul>
</nav>

<div class="container">
    
    <section class="main-content">
        <!-- Tombol sudah diubah jadi tombol Bootstrap -->
        <a href="TambahAset.html" class="btn btn-primary mb-3">Tambah Aset</a>

        <h2>Daftar Aset Kamu</h2>
    </section>

    <aside class="sidebar">
        <h3>Penting</h3>
        <p>Jangan kebanyakan jajan ya!</p>
    </aside>
</div>

<footer>
    <p>&copy; Created by Kelompok 4</p>
</footer>

</body>
</html>
