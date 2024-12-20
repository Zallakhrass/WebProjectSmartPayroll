<?php
include_once 'FungsiDataGajiKaryawan.php';  // Pastikan file ini sesuai dengan kelas fungsi untuk data gaji
$Fungsi = new FungsiDataGajiKaryawan();
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
    header("Location: Login_Page.php");
    exit();
}

// Fungsi untuk melakukan logout
function logout()
{
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

if (isset($_POST['logout'])) {
    logout();
}

$result = $Fungsi->read();  // Mengambil data dari database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/Data_Karyawan.css">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <title>SmartPayroll</title>
    <style>
        .swal2-popup {
            font-family: 'Poppins', sans-serif !important;
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
            <li>
                <a href="Data_Pegawai_Admin.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="text">Data Pegawai</span>
                </a>
            </li>
            <li class="active">
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
                <a href="#settings">
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
           

            <main class="table" id="customers_table">
                
                <section class="table__header">
                     <div class="head-title">
                <h1>Data Gaji Karyawan</h1>
            </div>
                    <div class="input-group">
                        
                        <input type="search" placeholder="Search Data...">
                        <img src="/AplikasiWeb/assets/img/search.png" alt="">
                    </div>
                    <a href="/AplikasiWeb/pages/Form_Data_Gaji_Karyawan.php" class="btn-download" id="add-gaji">
                        <i class='bx bx-add-to-queue'></i>
                        <span class="text">Add Gaji</span>
                    </a>
                </section>
                <section class="table__body">
                    <table>
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> ID Pegawai </th>
                                <th> Nama Pegawai </th>
                                <th> Gaji Pokok </th>
                                <th> Tunjangan </th>
                                <th> Potongan </th>
                                <th> Total Gaji </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1; // Inisialisasi variabel untuk nomor
                            foreach ($result as $row):
                                // Tentukan class berdasarkan nilai 'status'
                                $statusClass = ($row['status'] === 'Paid') ? 'status delivered' : 'status cancelled';
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo htmlspecialchars($row['id_pegawai']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($row['gaji_pokok']); ?></td>
                                    <td><?php echo htmlspecialchars($row['tunjangan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['potongan']); ?></td>
                                    <td><?php echo htmlspecialchars($row['total_gaji']); ?></td>
                                    <td><span class="<?php echo $statusClass; ?>"><?php echo htmlspecialchars($row['status']); ?></span></td>
                                    <td>
                                        <div class="button">
                                            <button class="btn-Edit">Edit</button>
                                            <button class="btn-Delete">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </main>
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
