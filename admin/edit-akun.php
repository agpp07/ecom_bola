<?php
//
include("../coneksi.php");

//
if (isset($_POST['update']))
{
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //
    $result = mysqli_query($coneksi, "UPDATE login_akun SET username='$username',email='$email',password='$password' WHERE id=$id");

    //
    echo"<script>window.alert('Akun Berhasil Diedit')
                window.location='akun.php'</script>";
}
?>
<?php


$id = $_GET['id'];


$result = mysqli_query($coneksi, "SELECT * FROM login_akun WHERE id=$id");

if (!$result) {
    die('Error: ' . mysqli_error($coneksi));
}

while ($user_data = mysqli_fetch_array($result)) {
    $username = $user_data['username'];
    $email = $user_data['email'];
    $password = $user_data['password'];
}

?>
<html>

<head>
    <title>Edit Akun</title>
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
                <td>Username</td>
                <td><input type="text" name="username" value=<?php echo $username; ?>></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value=<?php echo $email; ?>></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" value=<?php echo $password; ?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>