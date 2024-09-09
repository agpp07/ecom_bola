<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment - VFAPP Store | Ecommerce Website</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <style>
    body {
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ff523b;
    }
    </style>
</head>

<body>
    <div class="container-payment">
        <h1>Confirm Your Payment</h1>
        <form action="#" method="post">
            <div class="first-row">
                <div class="owner">
                    <h3>Owner</h3>
                    <div class="input-field">
                        <input type="text" name="owner" required>
                    </div>
                </div>
                <div class="cvv">
                    <h3>CVV</h3>
                    <div class="input-field">
                        <input type="password" name="cvv" required>
                    </div>
                </div>
            </div>
            <div class="second-row">
                <div class="card-number">
                    <h3>Card Number</h3>
                    <div class="input-field">
                        <input type="text" name="kartu" required>
                    </div>
                </div>
            </div>
            <div class="third-row">
                <h3>Date</h3>
                <div class="selection">
                    <div class="date">
                        <input type="text" placeholder="Bulan..." name="bulan" required>
                        <input type="text" placeholder="Tahun..." name="tahun" required>
                    </div>
                    <div class="cards">
                        <img src="../images/pp.png" />
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="button" value="Submit">
        </form>
    </div>
    <?php
        $koneksi=mysqli_connect("localhost","root","","ecom_bola");
        if(isset($_POST["submit"])){
            $user=$_POST["owner"];
            $kode=$_POST["cvv"];
            $kartu=$_POST["kartu"];
            $mon=$_POST["bulan"];
            $taun=$_POST["tahun"];

            
            $result=mysqli_query($koneksi,"INSERT INTO payment(owner, cvv, kartu, bulan, tahun) VALUES('$user','$kode','$kartu','$mon','$taun')");

            if($result){
                echo"<script>window.alert('Orderan sudah dikonfirm')
                window.location='final.php'</script>";
            }else{
                echo "<script>window.alert('Masukkan data yang benar')
                window.location='payment.php'</script>";
            }
        }
        ?>
</body>

</html>