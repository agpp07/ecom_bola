<?php
session_start();
include 'coneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = "user";

$query_insert = "INSERT INTO login_akun (username, email, password, level)
                VALUES ('$username', '$email', '$password', '$level')";

if (mysqli_query($coneksi, $query_insert)) {
    $query_select = "SELECT * FROM login_akun WHERE username='$username'";
    $result = mysqli_query($coneksi, $query_select);

    if ($result) {
        $data = mysqli_fetch_assoc($result);

        if ($data['level'] == "user") {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = "user";
            header("location:index.php");
        } else {
            header("location:index.php?pesan=gagal");
        }
    } else {
        echo "Error: " . mysqli_error($coneksi);
    }
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($coneksi);
}
?>