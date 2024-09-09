<html>

<head>
    <title>Tambah Produk</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
}

a {
    text-decoration: none;
}

button {
    background-color: #3498db;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #2980b9;
}

form {
    width: 50%;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
}

table tr,
table td {
    padding: 10px;
    margin: 5px 0;
}

input[type="text"],
input[type="file"],
input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #27ae60;
}
</style>

<body>
    <a href="index.php"><button>Go To Home</button></a>

    <form action="tambah-produk.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Harga Barang</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php
        // Check if form submitted, insert form data into the produk table.
        if(isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $gambar = $_POST['gambar'];

            // Include database connection file 
            include_once("../coneksi.php");

            // Insert user data into the table
            $result = mysqli_query($coneksi, "INSERT INTO produk (nama, harga, gambar) VALUES ('$nama', '$harga', '$gambar')");

            // Check if the insertion was successful
            if($result) {
                echo"<script>window.alert('Produk Berhasil Ditambahkan')
                window.location='produk.php'</script>";
            } else {
                echo "Error: " . mysqli_error($coneksi);
            }
        }
        ?>
</body>

</html>