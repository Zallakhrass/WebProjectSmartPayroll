<?php
include_once 'Database.php';

class FungsiSelect
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Membaca semua produk
    public function read()
    {
        $query = "SELECT * FROM users";

        try {
            $stmt = $this->db->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil hasil sebagai array asosiatif
        } catch (PDOException $e) {
            // Menangani error
            return ['error' => $e->getMessage()];
        }
    }
}
