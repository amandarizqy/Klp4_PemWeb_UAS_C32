<?php
include 'database.php';

// Tambah kategori
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_kategori'];
    $jenis = $_POST['jenis'];

    if ($jenis === 'Pendapatan') {
        mysqli_query($conn, "INSERT INTO kategori_pendapatan (nama_kategori) VALUES ('$nama')");
    } elseif ($jenis === 'Pengeluaran') {
        mysqli_query($conn, "INSERT INTO kategori_pengeluaran (nama_kategori) VALUES ('$nama')");
    }

    header("Location: Kategori.php");
    exit;
}

// Hapus kategori
if (isset($_GET['hapus']) && isset($_GET['id_kategori']) && isset($_GET['jenis'])) {
    $id_kategori = intval($_GET['id_kategori']);
    $jenis = $_GET['jenis'];

    if ($jenis == 'Pendapatan') {
        mysqli_query($conn, "DELETE FROM kategori_pendapatan WHERE id_kategori = $id_kategori");
    } elseif ($jenis == 'Pengeluaran') {
        mysqli_query($conn, "DELETE FROM kategori_pengeluaran WHERE id_kategori = $id_kategori");
    }

    header("Location: Kategori.php");
    exit;
}

// Ambil semua data kategori
$data = [];

$q1 = mysqli_query($conn, "SELECT id_kategori, nama_kategori FROM kategori_pendapatan");
while ($row = mysqli_fetch_assoc($q1)) {
    $data[] = [
        'id_kategori' => $row['id_kategori'],
        'nama_kategori' => $row['nama_kategori'],
        'jenis' => 'Pendapatan'
    ];
}

$q2 = mysqli_query($conn, "SELECT id_kategori, nama_kategori FROM kategori_pengeluaran");
while ($row = mysqli_fetch_assoc($q2)) {
    $data[] = [
        'id_kategori' => $row['id_kategori'],
        'nama_kategori' => $row['nama_kategori'],
        'jenis' => 'Pengeluaran'
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<header>
  <h1 class="mb-4 text-center">Tambah Kategori</h1>
</header>
<nav>
        <ul>
            <li><a href="Catatan.php">Catatan</a></li>
            <li><a href="Tambah.php">Tambah</a></li>
            <li><a href="Kategori.php" class="aktif">Kategori</a></li>
            <li><a href="Aset.php">Aset</a></li>
        </ul>
</nav>
<div class="container mt-5">
    <form method="POST" action="Kategori.php" class="card p-4 shadow-sm mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="jenis" class="form-label">Jenis</label>
            <select name="jenis" id="jenis" class="form-select" required>
                <option value="Pendapatan">Pendapatan</option>
                <option value="Pengeluaran">Pengeluaran</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-100">Tambah Kategori</button>
    </form>

    <h2 class="mt-5 mb-4 text-center">Data Kategori</h2>
    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($data as $row) {
                    $id = $row['id_kategori'];
                    $nama = htmlspecialchars($row['nama_kategori']);
                    $jenis = $row['jenis'];
                    echo "<tr>
                        <td>{$no}</td>
                        <td>{$nama}</td>
                        <td>{$jenis}</td>
                        <td>
                            <a href='EditKategori.php?id_kategori={$id}&jenis={$jenis}' class='btn btn-sm btn-success me-1'>Edit</a>
                            <a href='Kategori.php?hapus=true&id_kategori={$id}&jenis={$jenis}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                        </td>
                    </tr>";
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
