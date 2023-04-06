<?php
session_start();
if ($_SESSION['login'] != true) {
    header('location:login.php');
}

include('db.php');
$id = $_SESSION['data']->id_user;


$query = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id'");
if ($query) {
    mysqli_query($conn, "DELETE FROM tabel_barang WHERE id_penjual = '$id'");
    echo "<script>alert('Hapus Akun berhasil !')</script>";
    echo "<script>window.location = 'login.php'</script>";
} else {
    echo "ada kesalah saat hapus Akun !";
}
