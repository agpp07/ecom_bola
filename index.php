<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | VFAPP</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="cek_login.php" method="post">
                <h2>Login</h2>
                <div class="input-group">
                    <input type="text" name="username" required>
                    <label for="">username</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <button type="submit">Login</button>
                <div class="signUp-link">
                    <p>Don't have an account? <a href="register.php" class="signUpBtn-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
    <?php
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo"<script>window.alert('Username dan Password Salah')
                window.location='index.php'</script>";
        }
    }
    ?>
</body>

</html>