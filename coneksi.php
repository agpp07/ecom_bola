<?php

$server="localhost";
$username="root";
$password="";
$database="ecom_bola";

$coneksi = mysqli_connect($server,$username,$password,$database);

if(mysqli_connect_error()){
    echo "koneksi gagal" , mysqli_connect_error();
}else {
    echo "" ;
}

?>