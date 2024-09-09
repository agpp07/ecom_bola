<?php

include("../coneksi.php");

$id = $_GET['id'];

$result = mysqli_query($coneksi, "DELETE FROM login_akun WHERE id=$id");

echo"<script>window.alert('Akun Berhasil Dihapus')
                window.location='akun.php'</script>";
?>