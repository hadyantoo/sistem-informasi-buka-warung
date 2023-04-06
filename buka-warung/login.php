<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>

    <div class="kotak-login">
        <form action="" method="POST" class="form-login">
            <h3>Login</h3>
            <input type="text" name="user" placeholder="Username" class="input-control">
            <input type="password" name="pass" placeholder="Password" class="input-control">
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        <div class="kotak-registrasi">
            <p>Tidak punya akun ?, silahkan buat akun di <a href="registrasi.php">sini</a></p>
        </div>
    </div>


    <?php
    if (isset($_POST['submit'])) {
        session_start();
        include 'db.php';

        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        $cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$user' && password = '$pass'");
        $row = mysqli_num_rows($cek);
        if ($row == 0) {
            echo "<script>alert('Username dan password salah !')</script>";
        } else {
            $_SESSION['login'] = true;
            $_SESSION['data'] = mysqli_fetch_object($cek);
            echo "<script>window.location = 'dashboard.php'</script>";
        }
    }
    ?>

    <footer>
        <p>Copyright by Teguh hadi priyanto | 2023</p>
        <hr>
    </footer>
</body>

</html>