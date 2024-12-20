<?php
include_once 'FungsiDataPegawai.php';

$FungsiDataPegawai = new FungsiDataPegawai();

// Mengecek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $pegawai = $FungsiDataPegawai->readById($id);

    if (!$pegawai) {
        echo "<script>alert('Data tidak ditemukan'); window.location.href = 'Data_Pegawai_Admin.php';</script>";
    }
}

// Proses jika form di-submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nik = $_POST['nik'];
    $npwp = $_POST['npwp'];
    $nama = $_POST['nama'];
    $active = $_POST['active'];
    $jabatan = $_POST['jabatan'];
    $bagian = $_POST['bagian'];
    $jenispegawai = $_POST['jenispegawai'];
    $bank = $_POST['bank'];
    $norek = $_POST['norek'];
    $status = $_POST['status'];
    $masuk = $_POST['masuk'];
    $keluar = $_POST['keluar'];
    $keterangan = $_POST['keterangan'];

    if ($FungsiDataPegawai->updateData($id, $nik, $npwp, $nama, $active, $jabatan, $bagian, $jenispegawai, $bank, $norek, $status, $masuk, $keluar, $keterangan)) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href = 'Data_Pegawai_Admin.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data'); window.history.back();</script>";
    }
}
?>
