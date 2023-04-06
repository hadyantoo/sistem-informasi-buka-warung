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
    <title>Lapak saya</title>
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
                <h3 class="judul">Lapak Saya</h3>
            </div>
            <a href="tambah-data.php"><button class="btn btn-warna">Tambah Data</button></a>
            <div class="konten">
                <table class="tabel-konten">

                    <tr>
                        <th>No</th>
                        <th>Nama barang</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Tanggal upload</th>
                        <th>Opsi</th>
                    </tr>

                    <?php
                    include('db.php');
                    $id = $_SESSION['data']->id_user;
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM tabel_barang WHERE id_penjual = '$id' ORDER BY id_barang DESC");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_barang'] ?></td>
                            <td><?= $data['jenis'] ?></td>
                            <td><?= $data['harga'] ?></td>
                            <td><?= $data['stok'] ?></td>
                            <td><?= $data['tanggal_upload'] ?></td>
                            <td><a href="edit-data.php?id=<?= $data['id_barang'] ?>">Edit</a> | <a href="hapus-data.php?id=<?= $data['id_barang'] ?>" onclick="return confirm('Hapus data <?= $data['nama_barang']; ?> ?')">Hapus</a></td>
                        </tr>

                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </section>

    <footer>
        <p>Copyright by Teguh hadi priyanto | 2023</p>
        <hr>
    </footer>

</body>

</html>