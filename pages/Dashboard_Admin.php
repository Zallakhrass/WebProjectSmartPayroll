<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: Login_Page.php");
    exit();
}

// Fungsi untuk melakukan logout
function logout()
{
    // Hapus semua data sesi
    $_SESSION = array();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
    header("Location: Login_Page.php");
    exit();
}

// Jika tombol logout ditekan
if (isset($_POST['logout'])) {
    logout();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/dashboard_admin.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <title>SmartPayroll</title>
    <style>
        /* Mengatur font untuk SweetAlert2 */
        .swal2-popup {
            font-family: 'Poppins', sans-serif !important;
            /* Mengatur font Poppins */
        }
    </style>

</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
                <img src="/AplikasiWeb/assets/img/logo_payrol.png" alt="" style="width: 70px; height: 70px; margin-top:5px;margin-left:-5px;">
            <span class="logo">SmartPayroll</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="#">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Data_Pegawai_Admin.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="text">Data Pegawai</span>
                </a>
            </li>
            <li>
                <a href="Data_Gaji_Karyawan.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Data Gaji Karyawan</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Message</span>
                </a>
            </li>
            <li>
                <a href="Management_Users.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Management Users</span>
                </a>
            </li>
            <li>
                <a href="Register_Account.php">
                    <i class='bx bx-add-to-queue'></i>
                    <span class="text">Register Account</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout" id="logoutBtn">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="/assets/img/profil.jpg">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="Dashboard_Admin.php">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
                <a href="#" class="btn-download">
                    <i class='bx bxs-cloud-download'></i>
                    <span class="text">Download PDF</span>
                </a>
            </div>

            <ul class="box-info">
                <li>
                    <i class='bx bxs-calendar-check'></i>
                    <a href="Absen_Karyawan.php"></a>
                    <span class="text">
                        <h3>Absen</h3>
                        <p>Karyawan</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-group'></i>
                    <a href="Data_Pegawai_Admin.php">
                         <span class="text">
                        <h3>Data</h3>
                        <p>Karyawan</p>
                    </span>
                    </a>
                   
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <a href="Data_Gaji_Karyawan.php">
                        <span class="text">
                        <h3>Gaji</h3>
                        <p>Karyawan</p>
                    </span>
                    </a>
                    
                </li>
            </ul>


            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Data Karyawan</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Tahun Masuk</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>Muhamad Rizal</p>
                                </td>
                                <td>01-10-2021</td>
                                <td><span class="status completed">Manajer</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>Bagas</p>
                                </td>
                                <td>01-10-2021</td>
                                <td><span class="status pending">Karyawan</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>M Fahri</p>
                                </td>
                                <td>01-10-2021</td>
                                <td><span class="status process">Karyawan</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>Rasidi</p>
                                </td>
                                <td>01-10-2021</td>
                                <td><span class="status pending">Karyawan</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="img/people.png">
                                    <p>Noval</p>
                                </td>
                                <td>01-10-2021</td>
                                <td><span class="status completed">Karyawan</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- <div class="todo">
                    <div class="head">
                        <h3>Todos</h3>
                        <i class='bx bx-plus'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <ul class="todo-list">
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                        <li class="not-completed">
                            <p>Todo List</p>
                            <i class='bx bx-dots-vertical-rounded'></i>
                        </li>
                    </ul>
                </div> -->
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

<script>document.querySelector('nav i.bx-menu').addEventListener('click', function() {
    const navbar = document.querySelector('.navbar');
    navbar.classList.toggle('open');
});
</script>
    <script src="/AplikasiWeb/assets/js/dashboard.js"></script>
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, log me out!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika user mengkonfirmasi, kirim request logout
                    var form = document.createElement('form');
                    form.method = 'post';
                    form.action = window.location.href;

                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'logout';
                    input.value = '1';

                    form.appendChild(input);
                    document.body.appendChild(form);
                    form.submit();
                }
            })
        });
    </script>
</body>

</html>