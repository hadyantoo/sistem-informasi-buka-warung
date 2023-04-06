<?php
session_start();
if ($_SESSION['login'] != true) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Profil</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="container">
            <div class="menu">
                <h3 class="judul-menu"><a href="dashboard.php"><?= $_SESSION['data']->nama; ?></a></h3>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="lapak-saya.php">Lapak Saya</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="konten">
                <h3 class="judul">Profil</h3>

                <?php
                include('db.php');
                $idP = $_SESSION['data']->id_user;
                $query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$idP' ");
                $data = mysqli_fetch_array($query);
                ?>

                <form action="" method="POST">
                    <label>Nama lengkap</label>
                    <input type="text" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama Lengkap" class="input-control" require>
                    <label>Username</label>
                    <input type="text" name="username" value="<?= $data['username'] ?>" placeholder="Username" class="input-control" require>
                    <label>Nomor Hp</label>
                    <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" placeholder="Nomor HP" class="input-control" require>
                    <label>Email</label>
                    <input type="email" value="<?= $data['email'] ?>" name="email" class="input-control">
                    <label>Alamat</label>
                    <input type="text" value="<?= $data['alamat'] ?>" name="alamat" class="input-control">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warna">
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

                    $proses = mysqli_query($conn, "UPDATE `user` SET `nama`='$nama',`username`='$username',`no_hp`='$no_hp',`email`='$email',`alamat`='$alamat' WHERE id_user = '$idP'");

                    if ($proses) {
                        echo "<script>alert('Edit data berhasil !')</script>";
                        echo "<script>window.location = 'profil.php'</script>";
                    } else {
                        echo "<script>alert('Edit data gagal !')</script>";
                        echo "<script>window.location = 'profil.php'</script>";
                    }
                }
                ?>

            </div>
        </div>

        <div class="container">
            <div class="konten">
                <h3 class="judul">Edit Password</h3>
                <form action="" method="POST">
                    <input type="password" name="password1" placeholder="Input your password" class="input-control">
                    <input type="password" name="password2" placeholder="Konfirmasi password" class="input-control">
                    <input type="submit" name="ubah_password" value="Submit" class="btn btn-warna">
                </form>

                <?php
                if (isset($_POST['ubah_password'])) {
                    if ($_POST['password1'] == $_POST['password2']) {
                        $pass = $_POST['password1'];
                        $edit_p = mysqli_query($conn, "UPDATE `user` SET `password`='$pass' WHERE id_user = '$idP'");

                        if ($edit_p) {
                            echo "<script>alert('Edit Password berhasil !')</script>";
                            echo "<script>window.location = 'profil.php'</script>";
                        } else {
                            echo "<script>alert('Edit Password Gagal !')</script>";
                            echo "<script>window.location = 'profil.php'</script>";
                        }
                    } else {
                        echo "<script>alert('korfirmasi password harus sama !')</script>";
                    }
                }
                ?>

            </div>
        </div>

        <div class="container">
            <center>
                <a href="hapus-akun.php"><button class="btn btn-warna" onclick="return confirm('Anda yakin ingin menghapus akun ?')">Hapus akun</button></a>
            </center>
        </div>
    </section>


    <footer>
        <p>Copyright by Teguh hadi priyanto | 2023</p>
        <hr>
    </footer>

</body>

</html>