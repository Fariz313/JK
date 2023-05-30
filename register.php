<?php
include 'login.php';

$register = "INSERT INTO user VALUES ('$_POST[no_hp]', '$_POST[email]', '$_POST[password]', '$_POST[username]');";

if (mysqli_query($conn, $register)) {
    echo "Registrasi Berhasil, silahkan login!";
    header("Location: index.html");
};
