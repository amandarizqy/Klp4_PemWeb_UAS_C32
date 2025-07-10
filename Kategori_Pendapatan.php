<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama_kategori = $_POST['nama_kategori'];

  $query = "INSERT INTO kategori_pendapatan (nama_kategori) VALUES ('$nama_kategori')";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Kategori pendapatan berhasil disimpan!'); window.location='Kategori.php';</script>";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori Pendapatan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-primary text-white text-center py-4">
  <h1>Kategori Pendapatan</h1>
</header>

<div class="container my-5">
  <form class="mx-auto" style="max-width: 400px;" method="POST" action="">
    <div class="mb-3">
      <label for="namaKategori" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" id="namaKategori" name="nama_kategori" placeholder="Contoh: Gaji, Bonus" required>
    </div>
    <input type="hidden" name="tipe" value="Pendapatan">
    <button type="submit" class="btn btn-success w-100">Simpan Kategori</button>
    <a href="Kategori.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
  </form>
</div>

<footer class="bg-primary text-white text-center py-3">
  <p>&copy; Created by Kelompok 4</p>
</footer>

</body>
</html>
