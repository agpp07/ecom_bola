<?php
session_start();
include 'coneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($coneksi,"select * from login_akun where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if($cek > 0){
    $data = mysqli_fetch_assoc($login);
    if($data['level']=="admin"){
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "admin";
        header("location:admin/index.php");
    
}else if($data['level']=="user"){
    $_SESSION['username'] = $username;
    $_SESSION['level'] = "user";
    header("location:user/home.php");
}
else{
    header("location:index.php?pesan=gagal");
}}
else{
    header("location:index.php?pesan=gagal");
}
?>