<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'FungsiLogin.php';

// CEK APAKAH USER SUDAH LOGIN
if (isset($_SESSION['user_id'])) {
    // AMBIL ROLE PENGGUNA DARI SESSION
    $role = $_SESSION['role']; // Pastikan Anda sudah menyimpan role di session saat login

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payroll Application 21</title>
    <!-- BOXICONS -->
    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet" />
    <!-- STYLE -->
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/register.css" />
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Form Container -->
    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                <img src="/AplikasiWeb/assets/img/white-outline.png" class="form-image-main" />
                <img src="/AplikasiWeb/assets/img/dots.png" class="form-image dots" />
                <img src="/AplikasiWeb/assets/img/coin.png" class="form-image coin" />
                <img src="/AplikasiWeb/assets/img/spring.png" class="form-image spring" />
                <img
                    src="/AplikasiWeb/assets/img/pngtree-internet-seo-marketing-data-login-page-concept-illustration-png-image_3389802.png"
                    class="form-image rocket" />
                <img src="/AplikasiWeb/assets/img/cloud.png" class="form-image cloud" />
                <img src="/AplikasiWeb/assets/img/stars.png" class="form-image stars" />
            </div>
            <p class="featured-words">
                Perhitungan Gaji Secara Otomatis
                <span>Payroll Application</span>
            </p>
        </div>
        <div class="col col-2">
            <div class="btn-box">
                <a href="Dashboard_Admin.php" class="btn btn-1" id="login">Back To Dashboard</a>
                <!-- <button class="btn btn-2" id="register">Sign Up</button> -->
            </div>
            <!-- Login Form Container -->
            <form class="login-form" action="" method="post">
                <div class="form-title">
                    <span>Register Account</span>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <input
                            type="text"
                            name="username"
                            class="input-field"
                            placeholder="Username"
                            required />
                        <i class="bx bx-user icon"></i>
                    </div>
                    <div class="input-box">
                        <input
                            type="password"
                            name="password"
                            class="input-field"
                            placeholder="Password"
                            required />
                        <i class="bx bx-lock-alt icon"></i>
                    </div>
                    <div class="input-box">
                        <input
                            type="text"
                            name="role"
                            class="input-field"
                            placeholder="Email"
                            required />
                        <i class="bx bx-envelope icon"></i>
                    </div>
                    <div class="input-box">
                        <select name="role" class="input-field" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                        <i class="bx bx-target-lock icon"></i>
                    </div>
                    <div class="forgot-pass">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="input-box">
                        <button type="submit" name="register" class="input-submit" value="Sign up">
                            <span>Create Account</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                        <?php if (isset($success)): ?>
                            <script>
                                let timerInterval;
                                // Menampilkan loading pertama kali
                                Swal.fire({
                                    title: "Sedang memproses...",
                                    html: "Tunggu beberapa saat.",
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        timerInterval = setInterval(() => {
                                            const timer = Swal.getHtmlContainer().querySelector('b');
                                            if (timer) {
                                                timer.textContent = Swal.getTimerLeft();
                                            }
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then(() => {
                                    // Setelah loading selesai, menampilkan pesan sukses
                                    Swal.fire({
                                        title: "Berhasil Registrasi!",
                                        text: "Anda berhasil Registrasi Account.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    });
                                });
                            </script>
                        <?php endif; ?>

                        <?php if (isset($error)): ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: '<?= htmlspecialchars($error) ?>',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });
                            </script>
                        <?php endif; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Register Form Container -->

    <!-- JS -->
    <script src="/AplikasiWeb/assets/js/register.js"></script>
</body>

</html>