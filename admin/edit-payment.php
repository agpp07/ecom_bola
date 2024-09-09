<?php
//
include("../coneksi.php");

//
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $user = $_POST['owner'];
    $kode = $_POST['cvv'];
    $kartu = $_POST['kartu'];
    $mon = $_POST['bulan'];
    $taun = $_POST['tahun'];

    //
    $result = mysqli_query($coneksi, "UPDATE payment SET owner='$user',cvv='$kode',kartu='$kartu',bulan='$mon',tahun='$taun' WHERE id=$id");

    //
    echo"<script>window.alert('Payment Berhasil Diedit')
                window.location='payment.php'</script>";
}
?>
<?php


$id = $_GET['id'];


$result = mysqli_query($coneksi, "SELECT * FROM payment WHERE id=$id");

if (!$result) {
    die('Error: ' . mysqli_error($coneksi));
}

while ($user_data = mysqli_fetch_array($result)) {
    $user = $user_data['owner'];
    $kode = $user_data['cvv'];
    $kartu = $user_data['kartu'];
    $mon = $user_data['bulan'];
    $taun = $user_data['tahun'];
}

?>
<html>

<head>
    <title>Edit Payment</title>
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
                <td>Owner</td>
                <td><input type="text" name="owner" value=<?php echo $user; ?>></td>
            </tr>
            <tr>
                <td>CVV</td>
                <td><input type="text" name="cvv" value=<?php echo $kode; ?>></td>
            </tr>
            <tr>
                <td>Nomor Kartu</td>
                <td><input type="text" name="kartu" value=<?php echo $kartu; ?>></td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td><input type="text" name="bulan" value=<?php echo $mon; ?>></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td><input type="text" name="tahun" value=<?php echo $taun; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>