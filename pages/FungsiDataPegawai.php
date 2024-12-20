<?php
include_once 'Database.php';

class FungsiDataPegawai
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Membaca semua produk
    public function read()
    {
        $query = "SELECT * FROM pegawai";

        try {
            $stmt = $this->db->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil hasil sebagai array asosiatif
        } catch (PDOException $e) {
            // Menangani error
            return ['error' => $e->getMessage()];
        }
    }

   public function tambahData($nik, $npwp, $nama, $active, $jabatan, $bagian, $jenispegawai, $bank, $norek, $status, $masuk, $keluar, $keterangan) {
    $query = "INSERT INTO pegawai (nik, npwp, nama, active, jabatan, bagian, jenispegawai, bank, norek, status, masuk, keluar, keterangan) VALUES ('$nik', '$npwp', '$nama', '$active', '$jabatan', '$bagian', '$jenispegawai', '$bank', '$norek', '$status', '$masuk', '$keluar', '$keterangan')";
    return $this->db->conn->query($query);
   }

   public function hapusData($id)
{
    $query = "DELETE FROM pegawai WHERE id = :id";
    try {
        $stmt = $this->db->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}


}


