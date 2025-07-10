<?php
include 'database.php';

$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM transfer WHERE id_transfer = $id"));
$asets = mysqli_query($conn, "SELECT id_aset, nama_aset FROM aset");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $tanggal = $_POST['tanggal'];
  $dari_aset = $_POST['dari_aset'];
  $ke_aset = $_POST['ke_aset'];
  $jumlah = $_POST['jumlah'];
  $keterangan = $_POST['keterangan'];

  mysqli_query($conn, "UPDATE transfer SET 
    tanggal='$tanggal', dari_aset='$dari_aset', ke_aset='$ke_aset', jumlah='$jumlah', keterangan='$keterangan'
    WHERE id_transfer = $id");

  echo "<script>alert('Transfer diperbarui!'); window.location='Catatan.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Transfer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h2>Edit Transfer</h2>
  <form method="POST">
    <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" class="form-control mb-2" required>

    <select name="dari_aset" class="form-control mb-2" required>
      <?php while($a = mysqli_fetch_assoc($asets)): ?>
        <option value="<?= $a['id_aset'] ?>" <?= $row['dari_aset'] == $a['id_aset'] ? 'selected' : '' ?>>
          <?= $a['nama_aset'] ?>
        </option>
      <?php endwhile; mysqli_data_seek($asets, 0); ?>
    </select>

    <select name="ke_aset" class="form-control mb-2" required>
      <?php while($a = mysqli_fetch_assoc($asets)): ?>
        <option value="<?= $a['id_aset'] ?>" <?= $row['ke_aset'] == $a['id_aset'] ? 'selected' : '' ?>>
          <?= $a['nama_aset'] ?>
        </option>
      <?php endwhile; ?>
    </select>

    <input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" class="form-control mb-2" required>
    <textarea name="keterangan" class="form-control mb-3"><?= $row['keterangan'] ?></textarea>

    <button class="btn btn-warning text-white">Simpan Perubahan</button>
    <a href="Catatan.php" class="btn btn-secondary">Batal</a>
  </form>
</body>
</html>
