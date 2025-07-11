<?php
include 'database.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $id_aset = $_POST['aset'];
    $id_kategori = $_POST['kategori'];
    $jumlah_baru = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];

    // Ambil data lama
    $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pendapatan WHERE id_pendapatan = $id"));
    $jumlah_lama = $old['jumlah'];
    $aset_lama = $old['id_aset'];

    // Hitung selisih jumlah
    $selisih = $jumlah_baru - $jumlah_lama;

    // Jika aset tidak berubah, update saldonya langsung
    if ($id_aset == $aset_lama) {
        mysqli_query($conn, "UPDATE aset SET saldo = saldo + $selisih WHERE id_aset = $id_aset");
    } else {
        // Kembalikan saldo ke aset lama
        mysqli_query($conn, "UPDATE aset SET saldo = saldo - $jumlah_lama WHERE id_aset = $aset_lama");
        // Tambahkan saldo ke aset baru
        mysqli_query($conn, "UPDATE aset SET saldo = saldo + $jumlah_baru WHERE id_aset = $id_aset");
    }

    // Update data pendapatan
    $query = "UPDATE pendapatan SET tanggal='$tanggal', id_aset='$id_aset', id_kategori='$id_kategori', jumlah='$jumlah_baru', keterangan='$keterangan' 
              WHERE id_pendapatan = $id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Berhasil diperbarui'); window.location='Catatan.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($conn);
    }
} else {
    // Ambil data untuk form
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pendapatan WHERE id_pendapatan = $id"));
    $asets = mysqli_query($conn, "SELECT * FROM aset");
    $kategori = mysqli_query($conn, "SELECT * FROM kategori_pendapatan");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Pendapatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        h2 {
            margin-bottom: 30px;
            color: #343a40;
        }

        form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            max-width: 500px;
            margin: auto;
        }

        form input[type="date"],
        form input[type="number"],
        form select,
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #0d6efd;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
        }

        form button:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body class="container py-5">
    <h2 class="text-center">Edit Pendapatan</h2>
    <form method="POST">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required>

        <label for="aset">Aset</label>
        <select name="aset" required>
            <?php while ($a = mysqli_fetch_assoc($asets)): ?>
            <option value="<?= $a['id_aset'] ?>" <?= $a['id_aset'] == $data['id_aset'] ? 'selected' : '' ?>>
                <?= $a['nama_aset'] ?>
            </option>
            <?php endwhile; ?>
        </select>

        <label for="kategori">Kategori</label>
        <select name="kategori" required>
            <?php while ($k = mysqli_fetch_assoc($kategori)): ?>
            <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $data['id_kategori'] ? 'selected' : '' ?>>
                <?= $k['nama_kategori'] ?>
            </option>
            <?php endwhile; ?>
        </select>

        <label for="jumlah">Jumlah</label>
        <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>" required>

        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" rows="3"><?= $data['keterangan'] ?></textarea>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
