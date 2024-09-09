<?php
// Include the database connection file
include("../coneksi.php");

// Start the session
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart None - VFAPP Store | Ecommerce Website</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="home.php"><img src="../images/logo.png" width="125px" /></a>
            </div>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- cart items details -->
    <div class="cart-info">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total=0;
                if(isset($_SESSION['cart'])) 
                {

                  foreach($_SESSION['cart'] as $key => $value)
                {
                  $total= $total+$value['product_price'];
                  echo "
                    <tr>
                      <td>1</td>
                      <td>$value[product_name]</td>
                      <td>$value[product_price]<input type='hidden' class='iprice' value='$value[product_price]'></td>
                      <td><input class='iquantity' name='quantities[]' onchange='subTotal()' type='number' value='$value[Quantity]' min='1' max='10'></td>
                      <td class='itotal'></td>
                      <td>
                        <form action='manage-cart.php' method='POST'>
                          <button name='remove_product' class='btn'>Remove</button>
                          <input type='hidden' name='product_name' value='$value[product_name]'>
                        </form></td>
                    </tr>
                  ";
                  }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="total-price">
        <h3>Total:</h3>
        <h5><?php 
        $formattedTotal = number_format($total, 0, '.', '.');
        echo 'Rp ' . number_format($total, 3, '.', '.'); ?></h5>
    </div>
    <?php
$total = 0;
$cartIsEmpty = empty($_SESSION['cart']);
?>
    <form action="checkout.php" method="POST">
        <?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            echo "
                <input type='hidden' name='product_names[]' value='$value[product_name]'>
                <input type='hidden' name='product_prices[]' value='$value[product_price]'>
                <input type='hidden' name='quantities[]' value='$value[Quantity]'>
            ";
        }
    }
    ?>
        <button class="btn" <?php echo $cartIsEmpty ? 'style="display:none;"' : ''; ?>>Checkout</button>
    </form>

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
                        Fashion Accessible to the Many.
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
            <p class="copyright">Copyright 2023 - VFAPP</p>
        </div>
    </div>
</body>
<script>
var iprice = document.getElementsByClassName('iprice');
var iquantity = document.getElementsByClassName('iquantity');
var itotal = document.getElementsByClassName('itotal');

function subTotal() {
    var total = 0;

    for (var i = 0; i < iprice.length; i++) {
        var price = parseFloat(iprice[i].value); // Get the price as a floating-point number
        var quantity = parseInt(iquantity[i].value); // Get the quantity as an integer
        var subtotal = price * quantity; // Calculate the subtotal for the current item
        itotal[i].innerText = 'Rp ' + subtotal.toFixed(3).replace(/\d(?=(\d{3})+\.)/g,
            '$&,'); // Display the subtotal with proper formatting

        total += subtotal; // Add the subtotal to the total
    }

    // Update the total price at the bottom of the table
    document.querySelector('.total-price h5').innerText = 'Rp ' + total.toFixed(3).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

subTotal();
</script>


</html>