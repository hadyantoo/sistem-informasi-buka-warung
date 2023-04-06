<?php
session_start();
if ($_SESSION['login'] != true) {
    header('location:login.php');
}
if ($_GET['id'] <= 0) {
    header('location:lapak-saya.php');
} else {

    include('db.php');
    $id = $_GET['id'];
    $idp = $_SESSION['data']->id_user;


    $query = mysqli_query($conn, "DELETE FROM tabel_barang WHERE id_barang = '$id' && id_penjual = '$idp'");
    if ($query) {
        header('location:lapak-saya.php');
    } else {
        echo "ada kesalah saat hapus data !";
    }
}
