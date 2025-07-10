<?php
include 'database.php';

// Proses hapus pendapatan
if (isset($_POST['hapus_pendapatan'])) {
    $id = $_POST['hapus_pendapatan'];
    mysqli_query($conn, "DELETE FROM pendapatan WHERE id_pendapatan = '$id'");
}

// Proses hapus pengeluaran
if (isset($_POST['hapus_pengeluaran'])) {
    $id = $_POST['hapus_pengeluaran'];
    mysqli_query($conn, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id'");
}

// Proses hapus transfer
if (isset($_POST['hapus_transfer'])) {
    $id = $_POST['hapus_transfer'];
    mysqli_query($conn, "DELETE FROM transfer WHERE id_transfer = '$id'");
}

// Ambil filter bulan dan tahun
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Catatan Keuangan</title>
    <link rel="stylesheet" href="UAS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<header>
    <h1>Catatan Keuangan</h1>
</header>

<nav>
    <ul>
        <li><a href="Catatan.php" class="aktif">Catatan</a></li>
        <li><a href="Tambah.php">Tambah</a></li>
        <li><a href="Kategori.php">Kategori</a></li>
        <li><a href="Aset.php">Aset</a></li>
    </ul>
</nav>

<div class="container">
<section class="main-content">
    <h2>Ringkasan Keuangan</h2>

    <!-- Filter Bulan dan Tahun -->
    <form method="GET" class="mb-3">
        <label for="bulan">Bulan:</label>
        <select name="bulan" id="bulan">
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= str_pad($i, 2, '0', STR_PAD_LEFT) ?>" <?= ($i == $bulan) ? 'selected' : '' ?>>
                    <?= date('F', mktime(0, 0, 0, $i, 1)) ?>
                </option>
            <?php endfor; ?>
        </select>

        <label for="tahun">Tahun:</label>
        <select name="tahun" id="tahun">
            <?php for ($y = 2022; $y <= date('Y'); $y++): ?>
                <option value="<?= $y ?>" <?= ($y == $tahun) ? 'selected' : '' ?>><?= $y ?></option>
            <?php endfor; ?>
        </select>

        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    </form>

    <!-- Pendapatan -->
    <h3>Pendapatan</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php
        $qPendapatan = mysqli_query($conn, "SELECT id_pendapatan, tanggal, keterangan, jumlah FROM pendapatan 
            WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
        while ($row = mysqli_fetch_assoc($qPendapatan)): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                <td>
                    <a href="EditPendapatan.php?id=<?= $row['id_pendapatan'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <input type="hidden" name="hapus_pendapatan" value="<?= $row['id_pendapatan'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Pengeluaran -->
    <h3>Pengeluaran</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php
        $qPengeluaran = mysqli_query($conn, "SELECT id_pengeluaran, tanggal, keterangan, jumlah FROM pengeluaran
            WHERE MONTH(tanggal) = '$bulan' AND YEAR(tanggal) = '$tahun'");
        while ($row = mysqli_fetch_assoc($qPengeluaran)): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                <td>
                    <a href="EditPengeluaran.php?id=<?= $row['id_pengeluaran'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <input type="hidden" name="hapus_pengeluaran" value="<?= $row['id_pengeluaran'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <!-- Transfer -->
    <h3>Transfer</h3>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Dari Aset</th>
            <th>Ke Aset</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php
        $qTransfer = mysqli_query($conn, "SELECT t.id_transfer, t.tanggal, a1.nama_aset AS dari, a2.nama_aset AS ke, t.jumlah, t.keterangan 
            FROM transfer t 
            JOIN aset a1 ON t.dari_aset = a1.id_aset 
            JOIN aset a2 ON t.ke_aset = a2.id_aset
            WHERE MONTH(t.tanggal) = '$bulan' AND YEAR(t.tanggal) = '$tahun'");
        while ($row = mysqli_fetch_assoc($qTransfer)): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['dari'] ?></td>
                <td><?= $row['ke'] ?></td>
                <td>Rp<?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                <td><?= htmlspecialchars($row['keterangan']) ?></td>
                <td>
                    <a href="EditTransfer.php?id=<?= $row['id_transfer'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                        <input type="hidden" name="hapus_transfer" value="<?= $row['id_transfer'] ?>">
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</section>
</div>

<footer>
    <p>&copy; Created by Kelompok 4</p>
</footer>

</body>
</html>
