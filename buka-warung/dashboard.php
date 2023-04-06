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
    <div class="isi">

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
                    <h3 class="judul">Dashboard</h3>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="konten">
                    <div class="kotak-konten">

                        <?php
                        include('db.php');
                        $query = mysqli_query($conn, "SELECT * FROM tabel_barang");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>

                            <div class="isi-kotak-konten">
                                <img src="" alt="Foto-produk">
                                <h4><?= $data['nama_barang'] ?></h4>
                                <p><?= $data['harga'] ?></p>
                                <a href="detail-produk.php"><button class="btn btn-warna">Detail Produk</button></a>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            </div>
        </section>


        <footer>
            <p>Copyright by Teguh hadi priyanto | 2023</p>
            <hr>
        </footer>
    </div>
</body>

</html>