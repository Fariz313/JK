<?php
$database = "reservasiLapangan";
$username = "root";
$password = "";
$host = "localhost";
$conn = mysqli_connect($host, $username, $password, $database);

// Fungsi untuk memeriksa apakah jadwal lapangan futsal pada hari yang diinginkan kosong
function cekJadwalKosong($tanggal)
{
    $cek = "SELECT * FROM `jadwal` WHERE `jam_penyewaan` = $tanggal;";
    return mysqli_query($conn, $cek);
}

// Fungsi untuk mencari jadwal terdekat yang kosong
function cariJadwalTerdekat($tanggal)
{
    // Lakukan pencarian ke database atau sumber data lainnya
    // untuk mencari jadwal terdekat yang kosong pada tanggal yang diberikan
    // Kembalikan jadwal terdekat yang kosong dalam format yang sesuai
}

// Fungsi untuk melakukan reservasi lapangan futsal secara brute force
function reservasiLapanganFutsalBruteForce($tanggal)
{
    if (cekJadwalKosong($tanggal)) {
        // Jadwal kosong, lakukan reservasi lapangan futsal
        echo "Reservasi lapangan futsal berhasil!";
    } else {
        $jadwalTerdekat = cariJadwalTerdekat($tanggal);
        $jumlahHari = 1;

        // Coba jadwal kosong pada hari-hari berikutnya secara berurutan
        while (!$jadwalTerdekat && $jumlahHari <= 7) {
            $tanggalBerikutnya = date('Y-m-d', strtotime($tanggal . ' + ' . $jumlahHari . ' days'));
            $jadwalTerdekat = cariJadwalTerdekat($tanggalBerikutnya);
            $jumlahHari++;
        }

        if ($jadwalTerdekat) {
            // Jadwal terdekat ditemukan, lakukan reservasi lapangan futsal
            echo "Reservasi lapangan futsal berhasil untuk jadwal: " . $jadwalTerdekat;
        } else {
            // Tidak ada jadwal kosong yang tersedia dalam 7 hari ke depan
            echo "Tidak ada jadwal kosong yang tersedia dalam 7 hari ke depan.";
        }
    }
}

// Contoh penggunaan
$tanggalYangDiinginkan = "2023-05-30";
reservasiLapanganFutsalBruteForce($tanggalYangDiinginkan);
