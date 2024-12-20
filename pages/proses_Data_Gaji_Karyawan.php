<?php
include_once 'Fungsi_Data_Gaji_Karyawan.php';
$Fungsi = new FungsiDataKaryawan();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nik = $_POST['nik'];
    $npwp = $_POST['npwp'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $bagian = $_POST['bagian'];
    $jenis_pegawai = $_POST['jenis_pegawai'];
    $bank = $_POST['bank'];
    $no_rek = $_POST['no_rek'];
    $status = $_POST['status'];
    $in_date = $_POST['in_date'];
    $out_date = $_POST['out_date'];

    // Menambahkan data gaji karyawan
    $isAdded = $Fungsi->add($nik, $npwp, $nama, $jabatan, $bagian, $jenis_pegawai, $bank, $no_rek, $status);

    if ($isAdded) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Gagal menyimpan data.";
    }
}
?>
