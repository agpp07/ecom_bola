<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | VFAPP</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo "<div class='alert'>
                Username dan Password tidak sesuai !</div>";
        }
    }
    ?>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="cek_regis.php" method="post">
                <h2>Sign Up</h2>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>

</html>