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
    <title>Dashboard</title>
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
                <h3 class="judul">Tambah Data</h3>

                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama barang" class="input-control" require>
                    <select name="jenis" class="input-control">
                        <option value="elektronik">Elektronik</option>
                        <option value="furniture">Furniture</option>
                        <option value="pakaian">Pakaian</option>
                        <option value="buku">Buku</option>
                    </select>
                    <input type="number" name="harga" placeholder="Harga" class="input-control" require>
                    <input type="number" name="stok" placeholder="Stok" class="input-control" require>
                    <input type="date" name="tanggal" class="input-control">
                    <input type="submit" name="submit" value="Tambah" class="btn btn-warna">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    include('db.php');

                    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
                    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
                    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
                    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
                    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
                    $idP = $_SESSION['data']->id_user;

                    $query = mysqli_query($conn, "INSERT INTO `tabel_barang`(`id_barang`, `nama_barang`, `jenis`, `harga`, `stok`, `tanggal_upload`, `id_penjual`) VALUES (NULL, '$nama', '$jenis', '$harga', '$stok', '$tanggal', '$idP')");

                    if ($query) {
                        echo "<script>alert('Input data berhasil !')</script>";
                        echo "<script>window.location = 'lapak-saya.php'</script>";
                    } else {
                        echo "<script>alert('Input data gagal !')</script>";
                        echo "<script>window.location = 'tambah-data.php'</script>";
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright by Teguh hadi priyanto | 2023</p>
        <hr>
    </footer>

</body>

</html>