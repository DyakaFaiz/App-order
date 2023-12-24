<?php
session_start();
error_reporting(0);

include 'header.php';

if (isset($_GET['registrasi'])) {
	include 'admin/registrasi.php';
} elseif (isset($_GET['user'])) {
	include 'admin/data_user.php';
} elseif (isset($_GET['tambah_makanan'])) {
	include 'admin/tambah_makanan.php';
} elseif (isset($_GET['ubah_makanan'])) {
	include 'admin/ubah_makanan.php';
} elseif (isset($_GET['ubah_user'])) {
	include 'admin/ubah_user.php';
} elseif (isset($_GET['order'])) {
	include 'admin/data_order.php';
} elseif (isset($_GET['transaksi'])) {
	include 'admin/transaksi.php';
} elseif (isset($_GET['meja'])) {
	include 'admin/transaksi.php';
} elseif (isset($_GET['dashboard'])) {
	include 'admin/dashboard.php';
} elseif (isset($_GET['laporan'])) {
	include 'admin/laporan.php';
} elseif (isset($_GET['coffee'])) {
	include 'admin/index.php';
} elseif (isset($_GET['noCoffee'])) {
	include 'admin/data_noCoffee.php';
} elseif (isset($_GET['dessert'])) {
	include 'admin/data_dessert.php';
} elseif (isset($_GET['dtCoffee'])) {
	include 'admin/dt_coffee.php';
} elseif (isset($_GET['dtNoCoffee'])) {
	include 'admin/dt_nocoffee.php';
} elseif (isset($_GET['dtDessert'])) {
	include 'admin/dt_dessert.php';
} elseif (isset($_GET['ubah_transaksi'])) {
	include 'admin/ubah_transaksi.php';
} else {
	include 'admin/index.php';
}

include 'footer.php';
