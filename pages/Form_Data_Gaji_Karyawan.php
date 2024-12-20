<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Input Gaji Pegawai</title>
    <link rel="stylesheet" href="/AplikasiWeb/assets/css/Form_Karyawan.css">
</head>

<body>
    <div class="container">
        <h2>Formulir Input Gaji Pegawai</h2>
        <form action="Form_Data_Gaji_Karyawan.php" method="POST">
            <div class="form-section">
                <!-- Kolom 1 -->
                <div class="column">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" required>

                    <label for="npwp">NPWP</label>
                    <input type="text" name="npwp" id="npwp" required>

                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required>

                    <label for="status_pegawai">Status Pegawai</label>
                    <select name="status_pegawai" id="status_pegawai">
                        <option value=""></option>
                        <option value="Active">Active</option>
                        <option value="Non Active">Non Active</option>
                    </select>

                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" required>

                    <label for="bagian">Bagian</label>
                    <input type="text" name="bagian" id="bagian" required>

                    <label for="jenis_pegawai">Jenis Pegawai</label>
                    <select name="jenis_pegawai" id="jenis_pegawai">
                        <option value=""></option>
                        <option value="Tetap">Tetap</option>
                        <option value="Kontrak">Kontrak</option>
                    </select>

                    <label for="bank">Bank</label>
                    <input type="text" name="bank" id="bank" required>

                    <label for="no_rek">No. Rek</label>
                    <input type="text" name="no_rek" id="no_rek" required>

                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="TK/0">TK/0</option>
                        <option value="K/0">K/0</option>
                    </select>

                    <label for="in_date">Tanggal Masuk</label>
                    <input type="date" name="in_date" id="in_date" required>

                    <label for="out_date">Tanggal Keluar</label>
                    <input type="date" name="out_date" id="out_date">

                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan"></textarea>
                </div>

                <!-- Kolom 2 -->
                <div class="column">
                    <label for="gaji">Gaji</label>
                    <input type="number" name="gaji" id="gaji" required>

                    <label for="lembur">Lembur</label>
                    <input type="number" name="lembur" id="lembur" required>

                    <label for="lembur_per_jam">Lembur per Jam</label>
                    <input type="number" name="lembur_per_jam" id="lembur_per_jam" required>

                    <label for="tunjangan_1">Tunjangan 1</label>
                    <input type="number" name="tunjangan_1" id="tunjangan_1" required>

                    <label for="tunjangan_2">Tunjangan 2</label>
                    <input type="number" name="tunjangan_2" id="tunjangan_2" required>

                    <label for="natura">Natura</label>
                    <input type="number" name="natura" id="natura" required>

                    <label for="bonus_japro_thr">Bonus Japro THR</label>
                    <input type="number" name="bonus_japro_thr" id="bonus_japro_thr" required>

                    <label for="tunjangan_pph">Tunjangan PPh</label>
                    <input type="number" name="tunjangan_pph" id="tunjangan_pph" required>

                    <label for="jkk_perusahaan">JKK Perusahaan</label>
                    <input type="number" name="jkk_perusahaan" id="jkk_perusahaan" required>

                    <label for="jkm_perusahaan">JKM Perusahaan</label>
                    <input type="number" name="jkm_perusahaan" id="jkm_perusahaan" required>

                    <label for="jht_perusahaan">JHT Perusahaan</label>
                    <input type="number" name="jht_perusahaan" id="jht_perusahaan" required>

                    <label for="iuran_pensiun_perusahaan">Iuran Pensiun Perusahaan</label>
                    <input type="number" name="iuran_pensiun_perusahaan" id="iuran_pensiun_perusahaan" required>

                    <label for="jpk_perusahaan">JPK Perusahaan</label>
                    <input type="number" name="jpk_perusahaan" id="jpk_perusahaan" required>

                    <label for="tunjangan_zakat">Tunjangan Zakat</label>
                    <input type="number" name="tunjangan_zakat" id="tunjangan_zakat" required>
                </div>

                <!-- Kolom 3 -->
                <div class="column">
                    <label for="jht_karyawan">JHT Karyawan</label>
                    <input type="number" name="jht_karyawan" id="jht_karyawan" required>

                    <label for="iuran_pensiun_karyawan">Iuran Pensiun Karyawan</label>
                    <input type="number" name="iuran_pensiun_karyawan" id="iuran_pensiun_karyawan" required>

                    <label for="jpk_karyawan">JPK Karyawan</label>
                    <input type="number" name="jpk_karyawan" id="jpk_karyawan" required>

                    <label for="zakat_karyawan">Zakat Karyawan</label>
                    <input type="number" name="zakat_karyawan" id="zakat_karyawan" required>

                    <label for="bruto">Bruto</label>
                    <input type="text" name="bruto" id="bruto" disabled>

                    <label for="gol">Gol</label>
                    <input type="text" name="gol" id="gol" required>

                    <label for="ter">TER</label>
                    <input type="number" name="ter" id="ter" required>

                    <label for="pph_terhutang">PPh Terhutang</label>
                    <input type="number" name="pph_terhutang" id="pph_terhutang" required>

                    <label for="pph_pasal_21">PPh Pasal 21</label>
                    <input type="number" name="pph_pasal_21" id="pph_pasal_21" required>

                    <label for="bpjs_ketenagakerjaan">BPJS Ketenagakerjaan</label>
                    <input type="number" name="bpjs_ketenagakerjaan" id="bpjs_ketenagakerjaan" required>

                    <label for="bpjs_kesehatan">BPJS Kesehatan</label>
                    <input type="number" name="bpjs_kesehatan" id="bpjs_kesehatan" required>

                    <label for="iuran_koperasi">Iuran Koperasi</label>
                    <input type="number" name="iuran_koperasi" id="iuran_koperasi" required>

                    <label for="kasbon">Kasbon</label>
                    <input type="number" name="kasbon" id="kasbon" required>

                    <label for="iuran_serikat">Iuran Serikat</label>
                    <input type="number" name="iuran_serikat" id="iuran_serikat" required>

                    <label for="hutang_bank">Hutang Bank</label>
                    <input type="number" name="hutang_bank" id="hutang_bank" required>

                    <label for="hutang_pihak_ke3">Hutang Pihak Ke-3</label>
                    <input type="number" name="hutang_pihak_ke3" id="hutang_pihak_ke3" required>

                    <button type="submit">Simpan</button>
                    <a href="Data_Gaji_Karyawan.php" class="btn-kembali">Kembali</a>
                </div>
            </div>
        </form>
    </div>
    <script>
// Function to format number with thousands separator
function formatNumber(num) {
    return num.toLocaleString('id-ID'); // Format menggunakan locale Indonesia (ID)
}

// Get all relevant input elements
const gajiInput = document.getElementById('gaji');
const lemburInput = document.getElementById('lembur');
const tunjangan1Input = document.getElementById('tunjangan_1');
const tunjangan2Input = document.getElementById('tunjangan_2');
const naturaInput = document.getElementById('natura');
const brutoInput = document.getElementById('bruto');

// Function to calculate Bruto
function calculateBruto() {
    // Ambil nilai dari input, pastikan angka yang valid (0 jika tidak ada)
    const gaji = parseInt(gajiInput.value.replace(/[^0-9]+/g, "")) || 0;
    const lembur = parseInt(lemburInput.value.replace(/[^0-9]+/g, "")) || 0;
    const tunjangan1 = parseInt(tunjangan1Input.value.replace(/[^0-9]+/g, "")) || 0;
    const tunjangan2 = parseInt(tunjangan2Input.value.replace(/[^0-9]+/g, "")) || 0;
    const natura = parseInt(naturaInput.value.replace(/[^0-9]+/g, "")) || 0;

    // Hitung nilai bruto
    const bruto = gaji + lembur + tunjangan1 + tunjangan2 + natura;

    // Tampilkan hasil bruto dengan format angka yang dipisahkan titik
    brutoInput.value = formatNumber(bruto);
}

// Tambahkan event listener untuk menghitung ulang Bruto saat input berubah
gajiInput.addEventListener('input', calculateBruto);
lemburInput.addEventListener('input', calculateBruto);
tunjangan1Input.addEventListener('input', calculateBruto);
tunjangan2Input.addEventListener('input', calculateBruto);
naturaInput.addEventListener('input', calculateBruto);
</script>

</body>

</html>
