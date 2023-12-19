<?php
$date = date('d-m-Y');

$total_bayar = mysqli_query($kon, "SELECT SUM(totbar_transaksi) AS totbar FROM tb_transaksi WHERE aTanggal_transaksi = '$date' ");
$total = mysqli_fetch_assoc($total_bayar);
$sudahbayar = mysqli_query($kon, "SELECT COUNT(*) AS sudah_bayar FROM tb_order WHERE status_order = '1' AND aTanggal_order = '$date' ");
$sudah = mysqli_fetch_assoc($sudahbayar);
$belumbayar = mysqli_query($kon, "SELECT COUNT(*) AS belum_bayar FROM tb_order WHERE status_order = '0' AND aTanggal_order = '$date' ");
$belum = mysqli_fetch_assoc($belumbayar);
$jumlahmakanan = mysqli_query($kon, "SELECT COUNT(*) AS makanan FROM tb_masakan ");
$makanan = mysqli_fetch_assoc($jumlahmakanan);
$jumlahpelanggan = mysqli_query($kon, "SELECT COUNT(*) AS pelanggan FROM tb_user WHERE id_level='4' ");
$pelanggan = mysqli_fetch_assoc($jumlahpelanggan);
$jumlahkasir = mysqli_query($kon, "SELECT COUNT(*) AS kasir FROM tb_user WHERE id_level='3' ");
$kasir = mysqli_fetch_assoc($jumlahkasir);
$jumlahadmin = mysqli_query($kon, "SELECT COUNT(*) AS admin FROM tb_user WHERE id_level='1' ");
$admin = mysqli_fetch_assoc($jumlahadmin);
$level = $_SESSION['level'];

?>
<div class="container mt-5 p-4">
	<div class="card text-white mb-3 shadow" style="background-color: #b94d05;">
		<div class="row no-gutters">
			<div class="col-md-11">
				<div class="card-body ml-3">
					<h5 class="card-title">Welcome <?= $_SESSION['level'] ?></h5>
					<p class="card-text"><?= $_SESSION['nama_user'] ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card border mb-3 shadow p-2">
				<div class="row">
					<div class="col-md-2">
						<i class="fa fa-money-check-alt p-3 mt-2 fa-4x"></i>
					</div>
					<div class="col-md-10">
						<div class="card-body">
							<h5 class="card-title">Today's Total Sales : <?= $date ?></h5>
							<span class="btn btn-success btn-sm text-small"><?= $sudah['sudah_bayar'] ?> Paid</span>
							<?php if ($level !== "Owner") : ?>
								<span class="btn btn-danger btn-sm text-small"><?= $belum['belum_bayar'] ?> Not Paid</span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card border mb-3 shadow p-2">
				<div class="row">
					<div class="col-md-2">
						<i class="fa fa-money-bill p-3 mt-2 fa-4x"></i>
					</div>
					<div class="col-md-10">
						<div class="card-body">
							<h5 class="card-title">Today's Total Revenue : <?= $month; ?></h5>
							<span class="btn btn-success btn-sm text-small">Rp. <?= rupiah($total['totbar']) ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="card border mb-3 shadow p-2">
				<div class="row">
					<div class="col-md-2">
						<i class="fa fa-burger-soda p-3 mt-2 fa-4x"></i>
					</div>
					<div class="col-md-10">
						<div class="ml-5 card-body">
							<h6 class="card-title">Total Menu : </h6>
							<a href="index.php?dtCoffee">
								<span class="btn btn-warning text-white btn-sm text-small"><?= $makanan['makanan'] ?> Menu</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card border mb-3 shadow p-2">
				<div class="row">
					<div class="col-md-2">
						<i class="fa fa-book-user p-3 mt-2 fa-4x"></i>
					</div>
					<div class="col-md-10">
						<div class="ml-4 card-body">
							<h6 class="card-title">Total Employee :</h6>
							<span class="btn btn-secondary btn-sm text-small"><?= $kasir['kasir'] ?> Cashier</span>
							<span class="btn btn-secondary btn-sm text-small"><?= $admin['admin'] ?> Admin</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card border mb-3 shadow p-2">
				<div class="row">
					<div class="col-md-2">
						<i class="fa fa-book-user p-3 mt-2 fa-4x"></i>
					</div>
					<div class="col-md-10">
						<div class="ml-4 card-body">
							<h6 class="card-title">Total Customer :</h6>
							<span class="btn btn-secondary btn-sm text-small"><?= $pelanggan['pelanggan'] ?> Customer</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card border mb-3 shadow p-2">
				<div class="row">
					<div class="col-md-2">
						<i class="fa fa-book p-3 mt-2 fa-4x"></i>
					</div>
					<div class="col-md-10">
						<div class="ml-4 card-body">
							<h6 class="card-title">Report</h6>
							<a href="index.php?laporan">
								<span class="btn btn-danger btn-sm text-small"><i class="fa fa-eye"></i> View Report</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>