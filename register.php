<?php
include 'login.php';


if (mysqli_query($conn, $register)) {
    echo "Registrasi Berhasil, silahkan login!";
    header("Location: index.html");
};
