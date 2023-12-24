<?php
error_reporting(0);
session_start();
include "../../koneksi.php";

// ambil data dari form
$id = $_GET['id_transaksi'];
$qty = $_POST['quantity'];
$link = header("location:../index.php?transaksi");

$query = "UPDATE tb_detail_order SET jumlah_dorder='$qty' WHERE id_user='$id'";
$sql = mysqli_query($kon, $query);

if ($sql) {
    $_SESSION['pesan'] = '
    <div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
    	<b>Berhasil!</b> Data berhasil diubah
    	<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
    </div>
    ';
    $link;
} else {
    $_SESSION['pesan'] = '
    <div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
    	<b>Gagal!</b> Data gagal diubah
    	<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
    </div>
    ';
    $link;
}
