<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori</title>

  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .centered-container {
      min-height: 80vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn-group-custom {
      display: flex;
      flex-direction: column;
      gap: 20px;
      width: 100%;
      max-width: 300px;
    }
  </style>
</head>
<body>

<header class="bg-primary text-white text-center py-4">
  <h1>Tambah Kategori</h1>
</header>

<nav class="bg-dark">
  <ul class="nav justify-content-center">
    <li class="nav-item"><a href="Catatan.html" class="nav-link text-white">Catatan</a></li>
    <li class="nav-item"><a href="Tambah.html" class="nav-link text-white">Tambah</a></li>
    <li class="nav-item"><a href="Kategori.html" class="nav-link active text-white bg-secondary">Kategori</a></li>
    <li class="nav-item"><a href="Aset.html" class="nav-link text-white">Aset</a></li>
  </ul>
</nav>

<div class="container centered-container">
  <div class="btn-group-custom text-center">
    <a href="Kategori_Pendapatan.php" class="btn btn-success btn-lg">Kategori Pendapatan</a>
    <a href="Kategori_Pengeluaran.php" class="btn btn-danger btn-lg">Kategori Pengeluaran</a>
  </div>
</div>

<footer class="bg-primary text-white text-center py-3 mt-5">
  <p>&copy; Create by Nayla Putri Innayah</p>
</footer>

</body>
</html>
