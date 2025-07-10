<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_aset = $_POST['nama_aset'];
  $saldo = $_POST['saldo'];
  $keterangan = $_POST['keterangan'];

  $query = "INSERT INTO aset (nama_aset, saldo, keterangan) VALUES ('$nama_aset', '$saldo', '$keterangan')";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Aset berhasil disimpan!'); window.location='Aset.php';</script>";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Aset</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-info text-white text-center py-4">
  <h1>Form Tambah Aset</h1>
</header>

<nav class="bg-dark">
  <ul class="nav justify-content-center">
    <li class="nav-item"><a href="Catatan.php" class="nav-link text-white">Catatan</a></li>
    <li class="nav-item"><a href="Tambah.php" class="nav-link text-white">Tambah</a></li>
    <li class="nav-item"><a href="Kategori.php" class="nav-link text-white">Kategori</a></li>
    <li class="nav-item"><a href="Aset.php" class="nav-link text-white bg-secondary">Aset</a></li>
  </ul>
</nav>

<div class="container my-5">
  <form method="POST" action="" class="mx-auto" style="max-width: 500px;">
    <div class="mb-3">
      <label for="namaAset" class="form-label">Nama Aset</label>
      <input type="text" class="form-control" id="namaAset" name="nama_aset" placeholder="Contoh: Dompet, Rekening" required>
    </div>

    <div class="mb-3">
      <label for="saldoAset" class="form-label">Saldo Awal (Rp)</label>
      <input type="number" class="form-control" id="saldoAset" name="saldo" placeholder="Contoh: 1000000" required>
    </div>

    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Contoh: Uang tunai di dompet, rekening utama, dll"></textarea>
    </div>

    <button type="submit" class="btn btn-info text-white">Simpan Aset</button>
    <a href="Aset.php" class="btn btn-secondary ms-2">Kembali</a>
  </form>
</div>

<footer class="bg-info text-white text-center py-3 mt-5">
  <p>&copy; Created by Kelompok 4</p>
</footer>

</body>
</html>
