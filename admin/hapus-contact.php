<?php

include("../coneksi.php");

$id = $_GET['id'];

$result = mysqli_query($coneksi, "DELETE FROM contact WHERE id=$id");

echo"<script>window.alert('Contact Berhasil Dihapus')
                window.location='contact.php'</script>";
?>