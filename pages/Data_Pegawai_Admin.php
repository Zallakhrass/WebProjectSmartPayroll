<?php
include_once 'FungsiDataPegawai.php';
$Fungsi = new FungsiDataPegawai();
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
$result = $Fungsi->read();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/Data_Pegawai.css">
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
            <span class="logo_text">SmartPayroll</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="Dashboard_Admin.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="#">
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
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <!-- <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div> -->

            </div>


            <main class="table" id="customers_table">
                <section class="table__header">
                    <h1>Data Pegawai</h1>
                    <div class="input-group">
                        <input type="search" placeholder="Search Data...">
                        <img src="/AplikasiWeb/assets/img/search.png" alt="">
                    </div>
                    <a href="/AplikasiWeb/pages/Form_Data_Pegawai.php" class="btn-download" id="add-pegawai">
                        <i class='bx bx-add-to-queue'></i>
                        <span class="text">Add Pegawai</span>
                    </a>
                    </div>
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> NIK </th>
                                <th> NPWP </th>
                                <th> Nama </th>
                                <th> Active </th>
                                <th> Jabatan </th>
                                <th> Bagian </th>
                                <th> Jenis Pegawai </th>
                                <th> Bank </th>
                                <th> No. Rek </th>
                                <th> Status </th>
                                <th> IN </th>
                                <th> OUT </th>
                                <th> Keterangan </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Inisialisasi variabel untuk nomor
                            foreach ($result as $row):
                                // Tentukan class berdasarkan nilai 'active'
                                $statusClass = ($row['active'] === 'Active') ? 'status delivered' : 'status cancelled';
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <!-- <td style="text-align: center;"><?php echo htmlspecialchars($row['id']); ?></td> -->
                                    <td><?php echo htmlspecialchars($row['nik']); ?></td>
                                    <td><?php echo htmlspecialchars($row['npwp']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                    <td><span class="<?php echo $statusClass; ?>"><?php echo htmlspecialchars($row['active']); ?></span></td>
                                    <td><?php echo htmlspecialchars($row['jabatan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['bagian']); ?></td>
                                    <td><?php echo htmlspecialchars($row['jenispegawai']); ?></td>
                                    <td><?php echo htmlspecialchars($row['bank']); ?></td>
                                    <td><?php echo htmlspecialchars($row['norek']); ?></td>
                                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                                    <td><?php echo htmlspecialchars($row['masuk']); ?></td>
                                    <td><?php echo htmlspecialchars($row['keluar']); ?></td>
                                    <td><?php echo htmlspecialchars($row['keterangan']); ?></td>
                                    <td>
                                        <div class="button">
                                            <button class="btn-Edit">Edit</button>
                                            <br>
                                            <br>
                                            <button class="btn-Delete">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </main>
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
                        </li> -->
            </ul>
            </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="/AplikasiWeb/assets/js/data_pegawai.js"></script>

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