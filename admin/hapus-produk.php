<?php

include("../coneksi.php");

$id = $_GET['id'];

$result = mysqli_query($coneksi, "DELETE FROM produk WHERE id=$id");

echo"<script>window.alert('Produk Berhasil Dihapus')
                window.location='produk.php'</script>";
?>