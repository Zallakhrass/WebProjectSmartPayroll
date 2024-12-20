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
        <th>No</th>
        <th>NIK</th>
        <th>NPWP</th>
        <th>Nama</th>
        <th>Active / Non Active</th>
        <th>Jabatan</th>
        <th>Bagian</th>
        <th>Jenis Pegawai</th>
        <th>Bank</th>
        <th>No Rekening</th>
        <th>Status</th>
        <th>In Date</th>
        <th>Out Date</th>
        <th>Keterangan</th>
        <th>Gaji</th>
        <th>Lembur</th>
        <th>Lembur per Jam</th>
        <th>Tunjangan 1</th>
        <th>Tunjangan 2</th>
        <th>Natura</th>
        <th>Bonus Japro THR</th>
        <th>Tunjangan PPH</th>
        <th>JKK Perusahaan</th>
        <th>JKM Perusahaan</th>
        <th>JHT Perusahaan</th>
        <th>Iuran Pensiun Perusahaan</th>
        <th>JPK Perusahaan</th>
        <th>Tunjangan Zakat</th>
        <th>JHT Karyawan</th>
        <th>Iuran Pensiun Karyawan</th>
        <th>JPK Karyawan</th>
        <th>Zakat Karyawan</th>
        <th>Bruto</th>
        <th>Gol</th>
        <th>Ter</th>
        <th>PPH Terhutang</th>
        <th>PPH Pasal 21</th>
        <th>BPJS Ketenagakerjaan</th>
        <th>BPJS Kesehatan</th>
        <th>Iuran Koperasi</th>
        <th>Kasbon</th>
        <th>Iuran Serikat</th>
        <th>Hutang Bank</th>
        <th>Hutang Pihak Ke-3</th>
        <th>Zakat</th>
    </tr>
</thead>
<tbody>
    <?php
    $no = 1;
    foreach ($result as $row):
    ?>
        <tr>
            <td><?php echo $no++; ?>1</td>
            <td><?php echo htmlspecialchars($row['nik']); ?></td>
            <td><?php echo htmlspecialchars($row['npwp']); ?></td>
            <td><?php echo htmlspecialchars($row['nama']); ?></td>
            <td><?php echo htmlspecialchars($row['status_pegawai']); ?></td>
            <td><?php echo htmlspecialchars($row['jabatan']); ?></td>
            <td><?php echo htmlspecialchars($row['bagian']); ?></td>
            <td><?php echo htmlspecialchars($row['jenis_pegawai']); ?></td>
            <td><?php echo htmlspecialchars($row['bank']); ?></td>
            <td><?php echo htmlspecialchars($row['no_rek']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td><?php echo htmlspecialchars($row['in_date']); ?></td>
            <td><?php echo htmlspecialchars($row['out_date']); ?></td>
            <td><?php echo htmlspecialchars($row['keterangan']); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['gaji'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['lembur'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['lembur_per_jam'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['tunjangan_1'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['tunjangan_2'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['natura'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['bonus_japro_thr'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['tunjangan_pph'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['jkk_perusahaan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['jkm_perusahaan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['jht_perusahaan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['iuran_pensiun_perusahaan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['jpk_perusahaan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['tunjangan_zakat'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['jht_karyawan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['iuran_pensiun_karyawan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['jpk_karyawan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['zakat_karyawan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['bruto'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars($row['gol']); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['ter'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['pph_terhutang'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['pph_pasal_21'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['bpjs_ketenagakerjaan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['bpjs_kesehatan'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['iuran_koperasi'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['kasbon'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['iuran_serikat'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['hutang_bank'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['hutang_pihak_ke3'], 2, ',', '.')); ?></td>
            <td><?php echo htmlspecialchars(number_format($row['zakat'], 2, ',', '.')); ?></td>
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
