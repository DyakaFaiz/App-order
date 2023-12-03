<?php
session_start();
include '../../koneksi.php';

// ambil data dari form
$kategori = $_POST['kategori_masakan'];
$nama = $_POST['nama_masakan'];
$harga = $_POST['harga_masakan'];
$status = $_POST['status_masakan'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

// set nama dan direktori/penyimpanan foto
$fotobaru = date('dmYHis') . $foto;

// cek jika foto berhasil diupload
if ($kategori == 'Coffee') {
	$src = "../assets/image/Coffee/$fotobaru";
} elseif ($kategori == 'NoCoffee') {
	$src = "../assets/image/NoCoffee/$fotobaru";
} elseif ($kategori == 'Dessert') {
	$src = "../assets/image/Dessert/$fotobaru";
}

if (move_uploaded_file($tmp, "$src")) {
	$query = "INSERT INTO tb_masakan VALUES ('', '$kategori', '$nama', '$harga', '$fotobaru', '$status')";
	$sql = mysqli_query($kon, $query);

	if ($sql) {
		if ($kategori == "Coffee") {
			$_SESSION['pesan'] = '
			<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
				<b>Berhasil!</b> Data berhasil ditambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			';
			header('location:../index.php?dtCoffee');
		} elseif ($kategori == "NoCoffee") {
			$_SESSION['pesan'] = '
			<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
				<b>Berhasil!</b> Data berhasil ditambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
			';
			header('location:../index.php?dtNoCoffee');
		} else {
			$_SESSION['pesan'] = '
			<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
				<b>Berhasil!</b> Data berhasil ditambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
			header('location:../index.php?dtDessert');
		}
	} else {
		if ($kategori == "Coffee") {
			$_SESSION['pesan'] = '
				<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
					<b>Gagal!</b> Data gagal ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
				</div>
			';
			header('location:../index.php?dtCoffee');
		} elseif ($kategori == "NoCoffee") {
			$_SESSION['pesan'] = '
				<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
					<b>Gagal!</b> Data gagal ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
				</div>
			';
			header('location:../index.php?dtNoCoffee');
		} elseif ($kategori == "Dessert") {
			$_SESSION['pesan'] = '
				<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
					<b>Gagal!</b> Data gagal ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
				</div>
			';
			header('location:../index.php?dtDessert');
		}
	}
} else {
	if ($kategori == "Coffee") {
		$_SESSION['pesan'] = '
			<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
				<b>Gagal!</b> Foto gagal ditambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?dtCoffee');
	} elseif ($kategori == "NoCoffee") {
		$_SESSION['pesan'] = '
			<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
				<b>Gagal!</b> Foto gagal ditambahkan
				<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div>
		';
		header('location:../index.php?dtNoCoffee');
	} elseif ($kategori == "Dessert") {
		$_SESSION['pesan'] = '
				<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
					<b>Gagal!</b> Foto gagal ditambahkan
					<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
				</div>
			';
		header('location:../index.php?dtDessert');
	}
}
