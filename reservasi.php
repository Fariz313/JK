<?php
include 'login.php';

if ($_POST['function'] == 'reservasi') {
    echo json_encode(reservasi($conn));
} else {
    echo json_encode(riwayat($conn));
}

// function cekJadwalKosong($tanggal, $conn)
// {
//     $cek = "SELECT * FROM `jadwal` WHERE `jam_penyewaan` = $3;";
//     $kosong = mysqli_query($conn, $cek);
//     return $kosong;
// }


// function cariJadwalTerdekat($tanggal)
// {
// }


// function reservasiLapanganFutsalBruteForce($tanggal)
// {
//     if (cekJadwalKosong($tanggal)) {

//         echo "Reservasi lapangan futsal berhasil!";
//     } else {
//         $jadwalTerdekat = cariJadwalTerdekat($tanggal);
//         $jumlahHari = 1;


//         while (!$jadwalTerdekat && $jumlahHari <= 7) {
//             $tanggalBerikutnya = date('Y-m-d', strtotime($tanggal . ' + ' . $jumlahHari . ' days'));
//             $jadwalTerdekat = cariJadwalTerdekat($tanggalBerikutnya);
//             $jumlahHari++;
//         }

//         if ($jadwalTerdekat) {

//             echo "Reservasi lapangan futsal berhasil untuk jadwal: " . $jadwalTerdekat;
//         } else {
//             // Tidak ada jadwal kosong yang tersedia dalam 7 hari ke depan
//             echo "Tidak ada jadwal kosong yang tersedia dalam 7 hari ke depan.";
//         }
//     }
// }

// // Contoh penggunaan
// $tanggalYangDiinginkan = "2023-05-30";
// reservasiLapanganFutsalBruteForce($tanggalYangDiinginkan);

function reservasi($conn)
{
    $query = "INSERT INTO `reservasi` VALUES ('$_POST[nama]','$_POST[lapangan]', '$_POST[tanggal]', '$_POST[penyewaan]', '$_POST[durasi]');";
    if (mysqli_query($conn, $query)) {
        http_response_code(200);
        return "Berhasil Reservasi";
    } else {
        http_response_code(400);
        return "Reservasi gagal, cek data anda kembali atau lapangan tidak tersedia!";
    };
};

function riwayat($conn)
{
    $query = "SELECT * FROM `reservasi`;";
    $result = $conn->query($query);
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    $response = $rows;
    return $response;
};
