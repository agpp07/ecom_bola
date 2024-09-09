<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VFAPP Store | Ecommerce Website</title>
    <link rel="stylesheet" href="../css/contact.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/0f999b640b.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="home.php"><img src="../images/logo.png" width="150px" /></a>
                </div>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="products.php">Products</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="contak">
        <form action="#" method="post">
            <div class="input-group">
                <input type="text" name="nama" id="name" required>
                <label><i class="fa-regular fa-user"></i> Your Name</label>
            </div>
            <div class="input-group">
                <input type="text" name="telepon" id="number" required>
                <label><i class="fa-regular fa-phone"></i> Phone No.</label>
            </div>
            <div class="input-group">
                <input type="email" name="email" id="email" required>
                <label><i class="fa-regular fa-envelope"></i> Email Id</label>
            </div>
            <div class="input-group">
                <textarea id="message" name="pesan" rows="8" required></textarea>
                <label><i class="fa-regular fa-comments"></i> Your Message</label>
            </div>
            <button type="submit" name="submit">SUBMIT <i class="fa-regular fa-paper-plane"></i></button>
        </form>
    </div>
    <?php
        $koneksi = mysqli_connect("localhost", "root", "", "ecom_bola");

        if (!$koneksi) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        
        if(isset($_POST["submit"])){
            $nama_user=$_POST["nama"];
            $no_tele=$_POST["telepon"];
            $email_id=$_POST["email"];
            $pesan=$_POST["pesan"];
            
            $submit=mysqli_query($koneksi,"INSERT INTO contact (nama, telepon, email, pesan) VALUES('$nama_user','$no_tele','$email_id','$pesan')");

            if($submit){
                echo"<script>window.alert('Pesan berhasil dikirim')
                window.location='home.php'</script>";
            }else{
                echo "<script>window.alert('Pesan gagal terkirim')
                window.location='contact.php'</script>";
            }
        }
        ?>
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
                    <a href="home.php"><img src="../images/logo-white.png" /></a>
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

</html>