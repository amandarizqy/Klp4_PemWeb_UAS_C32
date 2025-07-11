<?php include 'database.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Aset</title>
    <link rel="stylesheet" href="UAS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
    <h1>Data Aset</h1>
</header>

<nav>
    <ul>
        <li><a href="Catatan.php">Catatan</a></li>
        <li><a href="Tambah.php">Tambah</a></li>
        <li><a href="Kategori.php">Kategori</a></li>
        <li><a href="Aset.php" class="aktif">Aset</a></li>
    </ul>
</nav>

<div class="container mt-4">
    <section class="main-content">
        <a href="TambahAset.php" class="btn btn-primary mb-3">Tambah Aset</a>
        <h2>Daftar Aset Kamu</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Aset</th>
                        <th>Saldo</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $query = "SELECT * FROM aset";
                $result = mysqli_query($conn, $query);
                $no = 1;

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . htmlspecialchars($row['nama_aset']) . "</td>
                                <td>Rp " . number_format($row['saldo'], 0, ',', '.') . "</td>
                                <td>" . htmlspecialchars($row['keterangan']) . "</td>
                                <td>
                                    <a href='EditAset.php?id_aset=" . $row['id_aset'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='HapusAset.php?id_aset=" . $row['id_aset'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin mau hapus aset ini?');\">Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Belum ada data aset.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>

    <aside class="sidebar">
        <h3>Penting</h3>
        <p>Jangan kebanyakan jajan ya!</p>
    </aside>
</div>

<footer class="mt-5">
    <p>&copy; Created by Kelompok 4</p>
</footer>

</body>
</html>
