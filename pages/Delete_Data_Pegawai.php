<?php
include_once 'FungsiDataPegawai.php';

$FungsiDataPegawai = new FungsiDataPegawai();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menggunakan metode hapusData() sesuai dengan yang sudah ada
    if ($FungsiDataPegawai->hapusData($id)) {
        echo "<script>
                alert('Data berhasil dihapus');
                window.location.href = 'Data_Pegawai_Admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data');
                window.location.href = 'Data_Pegawai_Admin.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan');
            window.location.href = 'Data_Pegawai_Admin.php';
          </script>";
}
?>
