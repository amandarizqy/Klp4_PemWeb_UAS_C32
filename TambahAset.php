<?php
include 'database.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_aset = $_POST['nama_aset'];
    $saldo = $_POST['saldo'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO aset (nama_aset, saldo, keterangan) VALUES ('$nama_aset', '$saldo', '$keterangan')";

    if (mysqli_query($conn, $query)) {
        $success = "Aset berhasil disimpan!";
    } else {
        $error = "Gagal menyimpan aset: " . mysqli_error($conn);
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
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Manajemen</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="Catatan.php">Catatan</a></li>
                <li class="nav-item"><a class="nav-link" href="Tambah.php">Tambah</a></li>
                <li class="nav-item"><a class="nav-link" href="Kategori.php">Kategori</a></li>
                <li class="nav-item"><a class="nav-link active" href="Aset.php">Aset</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- HEADER -->
<header class="bg-info text-white text-center py-4 mb-4">
    <h2>Form Tambah Aset</h2>
</header>

<!-- FORM -->
<div class="container">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <?php if ($success): ?>
                <div class="alert alert-success"><?= $success ?> <a href="Aset.php" class="alert-link">Lihat Aset</a></div>
            <?php elseif ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form method="POST" action="">
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

                <div class="d-flex justify-content-between">
                    <a href="Aset.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-info text-white">Simpan Aset</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer class="bg-info text-white text-center py-3 mt-5">
    <p>&copy; Created by Kelompok 4</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
