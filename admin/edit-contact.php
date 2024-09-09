<?php
//
include("../coneksi.php");

//
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama_user = $_POST['nama'];
    $no_tele = $_POST['telepon'];
    $email_id = $_POST['email'];
    $pesan = $_POST['pesan'];

    //
    $result = mysqli_query($coneksi, "UPDATE contact SET nama='$nama_user',telepon='$no_tele',email='$email_id',pesan='$pesan' WHERE id=$id");

    //
    echo"<script>window.alert('Contact Berhasil Diedit')
                window.location='contact.php'</script>";
}
?>
<?php


$id = $_GET['id'];


$result = mysqli_query($coneksi, "SELECT * FROM contact WHERE id=$id");

if (!$result) {
    die('Error: ' . mysqli_error($coneksi));
}

while ($user_data = mysqli_fetch_array($result)) {
    $nama_user = $user_data['nama'];
    $no_tele = $user_data['telepon'];
    $email_id = $user_data['email'];
    $pesan = $user_data['pesan'];
}

?>
<html>

<head>
    <title>Edit Contact</title>
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
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value=<?php echo $nama_user; ?>></td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td><input type="text" name="telepon" value=<?php echo $no_tele; ?>></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email_id; ?>></td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td><input type="text" name="pesan" value=<?php echo $pesan; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>