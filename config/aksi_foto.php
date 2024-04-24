<?php
session_start();
include '../config/koneksi.php';


if(isset($_POST['tambah'])){
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    move_uploaded_file($tmp, $lokasi.$namafoto);

    $sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$judulfoto', '$deskripsifoto', '$tanggal', '$namafoto', '$userid')");

    echo"<script>
    alert('Anda belum login!');
    location.href='../admin/foto.php';
    </script>";
}
if(isset($_POST['edit'])){
    $fotoid= $_POST['fotoid'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];
    $foto = $_FILES['lokasifile']['name'];
    $tmp = $_FILES['lokasifile']['tmp_name'];
    $lokasi = '../assets/img/';
    $namafoto = rand().'-'.$foto;

    if($foto == nuLL){
        $sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggal='$tanggal',userid='$userid' )");
    }

   
    echo"<script>
    alert('Anda belum login!');
    location.href='../admin/foto.php';
    </script>";
}
?>