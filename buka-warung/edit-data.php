<?php
session_start();
if ($_SESSION['login'] != true) {
    header('location:login.php');
}
if ($_GET['id'] <= 0) {
    header('location:lapak-saya.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit data</title>
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
                <h3 class="judul">Edit data</h3>

                <?php
                include('db.php');
                $idB = $_GET['id'];
                $idP = $_SESSION['data']->id_user;
                $query = mysqli_query($conn, "SELECT * FROM tabel_barang WHERE id_barang = '$idB' && id_penjual = '$idP'");
                $data = mysqli_fetch_array($query);
                ?>

                <form action="" method="POST">
                    <label>Nama Barang</label>
                    <input type="text" name="nama" value="<?= $data['nama_barang'] ?>" placeholder="Nama barang" class="input-control" require>
                    <label>Jenis Barang</label>
                    <select name="jenis" class="input-control">
                        <option value="<?= $data['jenis'] ?>"><?= $data['jenis'] ?></option>
                        <option value="elektronik">Elektronik</option>
                        <option value="furniture">Furniture</option>
                        <option value="pakaian">Pakaian</option>
                        <option value="buku">Buku</option>
                    </select>
                    <label>Harga Barang</label>
                    <input type="number" name="harga" value="<?= $data['harga'] ?>" placeholder="Harga" class="input-control" require>
                    <label>Stok Barang</label>
                    <input type="number" name="stok" value="<?= $data['stok'] ?>" placeholder="Stok" class="input-control" require>
                    <label>Tangal Up</label>
                    <input type="date" value="<?= $data['tanggal_upload'] ?>" name="tanggal" class="input-control">
                    <input type="submit" name="submit" value="Submit" class="btn btn-warna">
                </form>

                <?php
                if (isset($_POST['submit'])) {

                    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
                    $jenis = mysqli_real_escape_string($conn, $_POST['jenis']);
                    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
                    $stok = mysqli_real_escape_string($conn, $_POST['stok']);
                    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);

                    $proses = mysqli_query($conn, "UPDATE `tabel_barang` SET `nama_barang`='$nama',`jenis`='$jenis',`harga`='$harga',`stok`='$stok',`tanggal_upload`='$tanggal' WHERE id_barang = '$idB' && id_penjual = '$idP' ");

                    if ($proses) {
                        echo "<script>alert('Edit data berhasil !')</script>";
                        echo "<script>window.location = 'lapak-saya.php'</script>";
                    } else {
                        echo "<script>alert('Edit data gagal !')</script>";
                        echo "<script>window.location = 'edit-data.php'</script>";
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