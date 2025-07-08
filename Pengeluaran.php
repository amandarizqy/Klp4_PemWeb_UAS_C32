<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Input Pengeluaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">Form Pengeluaran</h2>
  <form>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" class="form-control" id="tanggal" required>
    </div>
    <div class="mb-3">
      <label for="aset" class="form-label">Aset</label>
      <input type="text" class="form-control" id="aset" required>
    </div>
    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <input type="text" class="form-control" id="kategori" required>
    </div>
    <div class="mb-3">
      <label for="jumlah" class="form-label">Jumlah</label>
      <input type="number" class="form-control" id="jumlah" required>
    </div>
    <div class="mb-3">
      <label for="keterangan" class="form-label">Keterangan</label>
      <textarea class="form-control" id="keterangan" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Simpan</button>
    <a href="Tambah.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

</body>
</html>
