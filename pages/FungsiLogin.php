<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'Database.php';

// FUNGSI UNTUK MEMPROSES LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // VALIDASI INPUT AGAR TIDAK BOLEH KOSONG
    if (empty($username) || empty($password)) {
        $error = "Username atau password tidak boleh kosong.";
    } else {
        // QUERY UNTUK MEMERIKSA KREDENSIAL PENGGUNA BERDASARKAN USERNAME
        $db = new Database();
        $stmt = $db->conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // MEMERIKSA APAKAH PASSWORD COCOK DENGAN PASSWORD DI DATABASE
            if (password_verify($password, $user['password'])) {
                // JIKA USERNAME DAN PASSWORD BENAR MAKA MASUK
                session_regenerate_id(); // Mencegah Sql Injection
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role']; // Simpan role pengguna

                // MEMERIKSA ROLE PENGGUNA DAN MENGARAHKAN KE DASHBOARD YANG SESUAI
                if ($user['role'] == 'Admin') {
                    header("Location: Dashboard_Admin.php");
                } else if ($user['role'] == 'User') {
                    header("Location: Dashboard_User.php");
                } else {
                    // Jika role tidak sesuai atau tidak ada, redirect ke halaman umum
                    header("Location: dashboard.php");
                }
                exit();
            } else {
                // JIKA PASSWORD SALAH
                $error = "Password salah.";
            }
        } else {
            // QUERY UNTUK MEMERIKSA APAKAH USERNAME ADA DI DATABASE
            $stmtUsername = $db->conn->prepare("SELECT * FROM users WHERE username = :username");
            $stmtUsername->bindParam(':username', $username);
            $stmtUsername->execute();

            if ($stmtUsername->rowCount() == 0) {
                // JIKA USERNAME TIDAK DITEMUKAN
                $error = "Pengguna tidak ditemukan. Silahkan registrasi.";
            } else {
                // JIKA USERNAME SALAH, TETAPI PASSWORD BENAR
                $error = "Username salah.";
            }
        }
    }
}
// Fungsi untuk memproses registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $role = trim($_POST['role']); // Mengganti email menjadi role
    $password = trim($_POST['password']);

    // Validasi input tidak kosong
    if (empty($username) || empty($role) || empty($password)) {
        $error = "Semua kolom harus diisi.";
    } else {
        // Memeriksa apakah username sudah ada
        $db = new Database();
        $stmt = $db->conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = "Username sudah terdaftar.";
        } else {
            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Menyimpan data pengguna baru ke database
            $stmt = $db->conn->prepare("INSERT INTO users (username, role, password) VALUES (:username, :role, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':role', $role); // Menyimpan role ke database
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                // Jika registrasi sukses
                $success = "Registrasi berhasil! Silakan login.";
            } else {
                $error = "Terjadi kesalahan saat registrasi. Silakan coba lagi.";
            }
        }
    }
}
