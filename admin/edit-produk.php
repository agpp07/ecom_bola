<?php
//
include("../coneksi.php");

//
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $gambar = $_POST['gambar'];
    $harga = $_POST['harga'];

    //
    $result = mysqli_query($coneksi, "UPDATE produk SET nama='$nama',harga='$harga',gambar='$gambar' WHERE id=$id");

    //
    echo"<script>window.alert('Produk Berhasil Diedit')
                window.location='produk.php'</script>";
}
?>
<?php


$id = $_GET['id'];


$result = mysqli_query($coneksi, "SELECT * FROM produk WHERE id=$id");

if (!$result) {
    die('Error: ' . mysqli_error($coneksi));
}

while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $harga = $user_data['harga'];
    $gambar = $user_data['gambar'];
}

?>
<html>

<head>
    <title>Edit Produk</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
}

table td {
    padding: 10px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

button {
    background-color: #008CBA;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
}

button:hover {
    background-color: #00587a;
}
</style>

<body>
    <a href="index.php"><button>Go To Home</button></a>

    <form name="update_user" method="post" action="#">
        <table border="#">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama; ?>></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value=<?php echo $harga; ?>></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar" value=<?php echo $gambar; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>