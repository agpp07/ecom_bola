<?php

include("../coneksi.php");

$id = $_GET['id'];

$result = mysqli_query($coneksi, "DELETE FROM payment WHERE id=$id");

echo"<script>window.alert('Payment Berhasil Dihapus')
                window.location='payment.php'</script>";
?>