<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'FungsiLogin.php';

// CEK APAKAH USER SUDAH LOGIN
if (isset($_SESSION['user_id'])) {
    // AMBIL ROLE PENGGUNA DARI SESSION
    $role = $_SESSION['role']; // Pastikan Anda sudah menyimpan role di session saat login

    // PERIKSA ROLE PENGGUNA
    if ($role == 'Admin') {
        // JIKA ROLE ADMIN, KE DASHBOARD ADMIN
        header("Location: Dashboard_Admin.php");
        exit();
    } else if ($role == 'User') {
        // JIKA ROLE USER, KE DASHBOARD USER
        header("Location: Dashboard_User.php");
        exit();
    } else {
        // JIKA ROLE TIDAK DIKENALI, BISA DIARAHKAN KE HALAMAN DEFAULT ATAU ERROR
        header("Location: dashboard.php");
        exit();
    }
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
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/style.css" />
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
                <!-- <button class="btn btn-1" id="login">Sign In</button> -->
                <!-- <button class="btn btn-2" id="register">Sign Up</button> -->
            </div>
            <!-- Login Form Container -->
            <form class="login-form" action="" method="post">
                <div class="form-title">
                    <span>Sign In</span>
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
                    <div class="forgot-pass">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="input-box">
                        <button name="login" class="input-submit">
                            <span>Sign In</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                        <?php if (isset($_SESSION)): ?>
                            <script>
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Anda berhasil Logout.",
                                    showConfirmButton: false,
                                    timer: 1500
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
                <!-- <div class="social-login">
                    <i class="bx bxl-google"></i>
                    <i class="bx bxl-facebook"></i>
                    <i class="bx bxl-twitter"></i>
                    <i class="bx bxl-github"></i>
                </div> -->
            </form>
            <!-- Register Form Container -->
            <div class="register-form">
                <div class="form-title">
                    <span>Create Account</span>
                </div>
                <form class="form-inputs" action="" method="post">
                    <div class="input-box">
                        <input
                            type="text"
                            name="role"
                            class="input-field"
                            placeholder="Role"
                            required />
                        <i class="bx bx-envelope icon"></i>
                    </div>
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
                    <div class="forgot-pass">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <div class="input-box">
                        <button type="submit" name="register" class="input-submit" value="Sign up">
                            <span>Sign In</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                        <?php if (isset($success)): ?>
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: '<?= htmlspecialchars($success) ?>',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
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
                </form>
                <div class="social-login">
                    <i class="bx bxl-google"></i>
                    <i class="bx bxl-facebook"></i>
                    <i class="bx bxl-twitter"></i>
                    <i class="bx bxl-github"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Container -->

    <!-- JS -->
    <script src="/AplikasiWeb/assets/js/main.js"></script>
</body>

</html>