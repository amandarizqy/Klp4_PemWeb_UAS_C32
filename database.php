<?php
$koneksi = new mysqli("localhost", "root", "", "pengelola_keuangan");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
