<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Home Admin | VFAPP</title>
</head>

<body>
    <header>
        <div class="header-content">
            <h1>Selamat Datang di Halaman Admin</h1>
            <p>Memonitor Semua Aktifitas!</p>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </header>

    <div class="button-container">
        <form action="produk.php" method="post">
            <input type="submit" class="button large-button" value="Daftar Produk">
        </form>
        <form action="akun.php" method="post">
            <input type="submit" class="button large-button" value="Daftar Akun">
        </form>
        <form action="contact.php" method="post">
            <input type="submit" class="button large-button" value="Daftar Contact">
        </form>
        <form action="payment.php" method="post">
            <input type="submit" class="button large-button" value="Daftar Payment">
        </form>
    </div>


    <footer>
        <p>&copy;Copyright 2023 - VFAPP</p>
    </footer>
</body>

</html>