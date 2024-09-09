<?php
include("../coneksi.php");
session_start();

$result = mysqli_query($coneksi, "SELECT * FROM produk ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Products - VFAPP Store | Ecommerce Website</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>
<style>
.small-container {
    max-width: 1080px;
    margin: 0 auto;
}

.row-2 {
    margin-top: 20px;
}

.menu-product {
    margin-top: 20px;
    text-align: center;
}

.search-form {
    margin-bottom: 20px;
}

.products {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.card {
    width: 250px;
    margin-bottom: 60px;
}

.card img {
    max-width: 100%;
    max-height: 100%;
}

.title h3 {
    font-size: 18px;
}

.box-search {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
}

.price {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    margin-top: 5px;
    /* Adjust the top margin to reduce space */
}

.btn-cart {
    padding: 5px 10px;
    /* Adjust the padding to make the button smaller */
    border-radius: 20px;
    color: black;
    border: none;
    cursor: pointer;
    font-size: 14px;
    /* Adjust the font size to make the text smaller */
}

.btn-cart:hover {
    background-color: #ff523b;
}
</style>

<body>
    <?php
    $count=0;
    if(isset($_SESSION['cart']))
    {
        $count=count($_SESSION['cart']);
    }
     ?>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="home.php"><img src="../images/logo.png" width="125px" /></a>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <a href="cart.php" class="btn">Cart (<?php echo $count; ?>)</a>
        </div>
    </div>

    <div class="small-container">
        <div class="row row-2">
            <h2>Semua Produk</h2>
        </div>

        <!-- menu section starts -->
        <section class="menu-product" id="menu">
            <a href="products.php">
                <h1 class="heading">Bola Basket</h1>
            </a>

            <form action="" method="post" class="search-form">
                <input type="text" name="searchTerm" placeholder="Cari bola....">
                <input type="submit" name="search" value="Cari">
            </form>

            <div class="products">
                <?php
        if(isset($_POST['search'])) {
            $searchTerm = $_POST['searchTerm'];

            // Lakukan pencarian
            $select_products = mysqli_query($coneksi, "SELECT * FROM `produk` WHERE `nama` LIKE '%$searchTerm%'");
        } else {
            // Tampilkan semua produk jika tidak ada pencarian
            $select_products = mysqli_query($coneksi, "SELECT * FROM `produk`");
        }

        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
        ?>


                <form action="manage-cart.php" method="post">
                    <div class="card">
                        <div class="img"><img src="../images/<?php echo $fetch_product['gambar']; ?>" alt="">
                        </div>
                        <div class="title">
                            <h3><?php echo $fetch_product['nama']; ?></h3>
                        </div>
                        <div class="box-search">
                            <div class="price">Rp<?php echo $fetch_product['harga']; ?></div>
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['nama']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['harga']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['gambar']; ?>">
                            <input type="submit" class="btn-cart" value="add to cart" name="add_to_cart">
                        </div>

                    </div>
                </form>

                <?php
            }
        } else {
            echo "<script>alert('Menu tidak tersedia'); window.location.href='fashion.php';</script>";
        }
        ?>
            </div>
        </section>

    </div>
    <!----- footer ----->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios mobile phone.</p>
                    <div class="app-logo">
                        <img src="../images/play-store.png" />
                        <img src="../images/app-store.png" />
                    </div>
                </div>
                <div class="footer-col-2">
                    <a href="index.html"><img src="../images/logo-white.png" /></a>
                    <p>
                        Our Purpose Is To Sustainably Make the Pleasure and Benefits of
                        Sports Accessible to the Many.
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
                <div class="footer-col-4">
                    <h3>Follow us</h3>
                    <ul>
                        <a href="">
                            <li>Facebook</li>
                        </a>
                        <a href="https://twitter.com/home">
                            <li>Twitter</li>
                        </a>
                        <a href="https://www.instagram.com/whoisgunk/?hl=id">
                            <li>Instagram</li>
                        </a>
                        <a href="https://www.youtube.com/channel/UCEM2eofYC866b1vGB4sM3IQ">
                            <li>Youtube</li>
                        </a>
                    </ul>
                </div>
            </div>
            <hr />
            <p class="copyright">Copyright 2020 - Easy Tutorials</p>
        </div>
    </div>
</body>

</html>