<?php
include 'FungsiDataPegawai.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Pegawai</title>
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/Form_Pegawai.css">
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css
" rel="stylesheet">
</head>

<body>
    

    <main class="form-container" id="customers_form">
        <div class="head">
            
        <h4>Formulir Data Pegawai</h4>
    </div>
        <form action="Form_Data_Pegawai.php" method="POST">
            
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" name="nik" id="nik" placeholder="Masukan Nik" required>
            </div>

            <div class="form-group">
                <label for="npwp">NPWP:</label>
                <input type="text" name="npwp" id="npwp" placeholder="Masukan NPWP">
            </div>

            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" required>
            </div>

              <div class="form-group">
                <label for="active">Active / Non Active</label>
                <select name="active" id="status" required>
                    <option value=""></option>
                    <option value="Active">Active</option>
                    <option value="Non Active">Non Active</option>
                </select>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan:</label>
                <input type="text" name="jabatan" id="jabatan" placeholder="Masukan Jabatan">
            </div>

            <div class="form-group">
                <label for="bagian">Bagian:</label>
                <input type="text" name="bagian" id="bagian" placeholder="Masukan Bagian">
            </div>

            <div class="form-group">
                <label for="jenis_pegawai">Jenis Pegawai:</label>
                <input type="text" name="jenispegawai" id="jenispegawai" placeholder="Masukan Jenis Pegawai">
            </div>

            <div class="form-group">
                <label for="bank">Bank:</label>
                <input type="text" name="bank" id="bank" placeholder="Masukan Bank">
            </div>

            <div class="form-group">
                <label for="norek">No Rekening:</label>
                <input type="text" name="norek" id="norek" placeholder="Masukan No Rekening">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value=""></option>
                    <option value="TK/0">TK/0</option>
                    <option value="TK/1">TK/1</option>
                    <option value="TK/2">TK/2</option>
                    <option value="TK/3">TK/3</option>
                    <option value="K/0">K/0</option>
                    <option value="K/1">K/1</option>
                    <option value="K/2">K/2</option>
                    <option value="K/3">K/3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tgl_masuk">Tanggal Masuk:</label>
                <input type="date" name="masuk" id="masuk">
            </div>

            <div class="form-group">
                <label for="tgl_keluar">Tanggal Keluar:</label>
                <input type="date" name="keluar" id="keluar">
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea name="keterangan" id="keterangan"></textarea>
            </div>

            <button type="submit">Submit</button>
              <a href="Data_Pegawai_Admin.php" class="btn-kembali">Kembali</a> 
            

        </form>
    </main>

</body>

</html>

<?php
$Fungsi =  new FungsiDataPegawai();

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

    // Proses tambah data
    if ($Fungsi->tambahData($nik, $npwp, $nama, $active, $jabatan, $bagian, $jenispegawai, $bank, $norek, $status, $masuk, $keluar, $keterangan)) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil disimpan.',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'Data_Pegawai_Admin.php';
                }
            });
        </script>
        ";
    } else {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Data gagal disimpan. Silakan coba lagi.',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.history.back();
                }
            });
        </script>
        ";
    }
}
?>
