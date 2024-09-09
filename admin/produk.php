<?php
include("../coneksi.php");

$result = mysqli_query($coneksi, "SELECT * FROM produk ORDER BY id DESC");
?>
<html>

<head>
    <title>Daftar Produk</title>
    <link rel="stylesheet">
    <link rel="stylesheet" href="../css/home-admin.css" />
</head>
<style>
.button-container {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    margin-right: 10%;
    /* Optional: Add margin for spacing */
}

.button {
    margin-top: 20px;
    padding: 10px 60px;
    background: #ff523b;
    color: #fff;
    border: 0;
    outline: none;
    cursor: pointer;
    font-size: 22px;
    font-weight: 500;
    border-radius: 30px;
}

<style>table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f5f5f5;
}

img {
    max-width: 50px;
    max-height: 50px;
    display: block;
    margin: auto;
}

a {
    text-decoration: none;
    padding: 5px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f5f5f5;
    color: #333;
}

a:hover {
    background-color: #ddd;
}
</style>

</style>

<body>
    <div class="button-container">
        <form action="index.php" method="post">
            <input type="submit" class="button" value="Back">
        </form>
        <form action="tambah-produk.php" method="post">
            <input type="submit" class="button" value="Tambah Produk">
        </form>
        <form action="cek-produk.php" method="post">
            <input type="submit" class="button" value="Cek Produk">
        </form>
        <form action="logout.php" method="post">
            <input type="submit" class="button" value="Logout">
        </form>
    </div>
    <table width='100%' border=1>
        <tr>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Gambar</th>
            <th colspan="2">Update</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['harga'] . "</td>";
            echo "<td><img src='../images/".$user_data['gambar'],"'width='50' height='50'></td>";
            echo "<td><a href='edit-produk.php?id=$user_data[id]'>Edit</a></td>";
            echo "<td><a href='hapus-produk.php?id=$user_data[id]'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>