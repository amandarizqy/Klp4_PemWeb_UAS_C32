<?php
include 'database.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pengeluaran WHERE id_pengeluaran = $id");
$row = mysqli_fetch_assoc($data);

$asets = mysqli_query($conn, "SELECT id_aset, nama_aset FROM aset");
$kategori = mysqli_query($conn, "SELECT id_kategori, nama_kategori FROM kategori_pengeluaran");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tanggal = $_POST['tanggal'];
  $id_aset = $_POST['id_aset'];
  $id_kategori = $_POST['id_kategori'];
  $jumlah = $_POST['jumlah'];
  $keterangan = $_POST['keterangan'];

  mysqli_query($conn, "UPDATE pengeluaran SET 
    tanggal='$tanggal', id_aset='$id_aset', id_kategori='$id_kategori', jumlah='$jumlah', keterangan='$keterangan'
    WHERE id_pengeluaran = $id");

  echo "<script>alert('Pengeluaran diperbarui!'); window.location='Catatan.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Pengeluaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h2>Edit Pengeluaran</h2>
  <form method="POST">
    <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" class="form-control mb-2" required>
    
    <select name="id_aset" class="form-control mb-2" required>
      <?php while($a = mysqli_fetch_assoc($asets)): ?>
        <option value="<?= $a['id_aset'] ?>" <?= $row['id_aset'] == $a['id_aset'] ? 'selected' : '' ?>>
          <?= $a['nama_aset'] ?>
        </option>
      <?php endwhile; ?>
    </select>

    <select name="id_kategori" class="form-control mb-2" required>
      <?php while($k = mysqli_fetch_assoc($kategori)): ?>
        <option value="<?= $k['id_kategori'] ?>" <?= $row['id_kategori'] == $k['id_kategori'] ? 'selected' : '' ?>>
          <?= $k['nama_kategori'] ?>
        </option>
      <?php endwhile; ?>
    </select>

    <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" class="form-control mb-2" required>
    <textarea name="keterangan" class="form-control mb-3"><?= $row['keterangan'] ?></textarea>

    <button class="btn btn-success">Simpan Perubahan</button>
    <a href="Catatan.php" class="btn btn-secondary">Batal</a>
  </form>
</body>
</html>
