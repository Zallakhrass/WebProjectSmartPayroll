<?php
class FungsiDataGajiKaryawan
{
    private $conn;

    // Konstruktor untuk menginisialisasi koneksi ke database
    public function __construct()
    {
        $host = "localhost";
        $db_name = "database_account";
        $username = "root";
        $password = "";

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }

    // Fungsi untuk mengambil semua data gaji karyawan
    public function read()
    {
        $query = "SELECT * FROM gaji_karyawan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk menambah data gaji karyawan
    public function tambahData($data)
    {
        $query = "INSERT INTO gaji_karyawan (
            nik, npwp, nama, status_pegawai, jabatan, bagian, jenis_pegawai, bank, no_rek, status, in_date, out_date, keterangan, 
            gaji, lembur, lembur_per_jam, tunjangan_1, tunjangan_2, natura, bonus_japro_thr, tunjangan_pph, jkk_perusahaan, 
            jkm_perusahaan, jht_perusahaan, iuran_pensiun_perusahaan, jpk_perusahaan, tunjangan_zakat, jht_karyawan, 
            iuran_pensiun_karyawan, jpk_karyawan, zakat_karyawan, bruto, gol, ter, pph_terhutang, pph_pasal_21, 
            bpjs_ketenagakerjaan, bpjs_kesehatan, iuran_koperasi, kasbon, iuran_serikat, hutang_bank, hutang_pihak_ke3, zakat
        ) VALUES (
            :nik, :npwp, :nama, :status_pegawai, :jabatan, :bagian, :jenis_pegawai, :bank, :no_rek, :status, :in_date, :out_date, :keterangan, 
            :gaji, :lembur, :lembur_per_jam, :tunjangan_1, :tunjangan_2, :natura, :bonus_japro_thr, :tunjangan_pph, :jkk_perusahaan, 
            :jkm_perusahaan, :jht_perusahaan, :iuran_pensiun_perusahaan, :jpk_perusahaan, :tunjangan_zakat, :jht_karyawan, 
            :iuran_pensiun_karyawan, :jpk_karyawan, :zakat_karyawan, :bruto, :gol, :ter, :pph_terhutang, :pph_pasal_21, 
            :bpjs_ketenagakerjaan, :bpjs_kesehatan, :iuran_koperasi, :kasbon, :iuran_serikat, :hutang_bank, :hutang_pihak_ke3, :zakat
        )";

        try {
            $stmt = $this->conn->prepare($query);
            // Eksekusi query dengan mengikat data yang datang dari form
            if ($stmt->execute($data)) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Fungsi untuk menghapus data gaji karyawan
    public function delete($id)
    {
        $query = "DELETE FROM gaji_karyawan WHERE no = :id";

        try {
            $stmt = $this->conn->prepare($query);
            // Binding parameter :id
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
