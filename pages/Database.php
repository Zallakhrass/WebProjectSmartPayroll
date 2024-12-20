<!-- Ini Adalah File (Database.php) -->
<?php
class Database
{
    private $host = "localhost";
    private $db_name = "database_account";
    private $username = "root";
    private $password = "";
    public $conn;


    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}
?>