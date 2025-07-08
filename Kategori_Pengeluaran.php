<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kategori Pengeluaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header class="bg-danger text-white text-center py-4">
  <h1>Kategori Pengeluaran</h1>
</header>

<div class="container my-5">
  <form class="mx-auto" style="max-width: 400px;">
    <div class="mb-3">
      <label for="namaKategori" class="form-label">Nama Kategori</label>
      <input type="text" class="form-control" id="namaKategori" placeholder="Contoh: Makan, Transportasi" required>
    </div>
    <input type="hidden" name="tipe" value="Pengeluaran">
    <button type="submit" class="btn btn-danger w-100">Simpan Kategori</button>
    <a href="Kategori.php" class="btn btn-secondary w-100 mt-2">Kembali</a>
  </form>
</div>

<footer class="bg-danger text-white text-center py-3">
  <p>&copy; Create by Nayla Putri Innayah</p>
</footer>

</body>
</html>
