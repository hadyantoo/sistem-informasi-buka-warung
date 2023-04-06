<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>

    <section>
        <div class="kotak-login">
            <form action="" method="POST" class="form-registrasi">
                <h3 class="judul">Buat akun</h3>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" require>
                <input type="text" name="username" placeholder="Username" class="input-control" require>
                <input type="password" name="password" placeholder="Password" class="input-control" require>
                <input type="number" name="no_hp" placeholder="No Handphone" class="input-control" require>
                <input type="email" name="email" placeholder="Email" class="input-control" require>
                <input type="text" name="alamat" placeholder="Alamat lengkap" class="input-control" require>
                <input type="submit" name="submit" value="Buat akun" class="btn">
            </form>

            <?php
            if (isset($_POST['submit'])) {
                include('db.php');

                $nama = mysqli_real_escape_string($conn, $_POST['nama']);
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

                $cek_akun = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' && password = '$password'");

                if (mysqli_num_rows($cek_akun) > 0) {
                    echo "<script>alert('Maaf username dan password sudah ada !')</script>";
                } else {
                    $query = mysqli_query($conn, "INSERT INTO `user`(`id_user`, `nama`, `username`, `password`, `no_hp`, `email`, `alamat`) VALUES (NULL, '$nama', '$username', '$password', '$no_hp', '$email', '$alamat')");

                    if ($query) {
                        echo "<script>alert('Buat akun berhasil !')</script>";
                        echo "<script>window.location = 'login.php'</script>";
                    } else {
                        echo "<script>alert('buat akun gagal !')</script>";
                        echo "<script>window.location = 'registrasi.php'</script>";
                    }
                }
            }
            ?>

            <div class="kotak-registrasi">
                <p>Sudah punya akun? silahkan <a href="login.php">Login</a></p>
            </div>


        </div>
    </section>

    <footer>
        <p>Copyright by Teguh hadi priyanto | 2023</p>
        <hr>
    </footer>

</body>

</html>