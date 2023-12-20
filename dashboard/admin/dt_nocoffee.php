<div class="container p-2">
	<?php if (isset($_SESSION['pesan'])) : ?>
		<?= $_SESSION['pesan'] ?>
	<?php unset($_SESSION['pesan']);
	endif; ?>
	<div class="row flex-c">
		<div class="col-md-11 p-3">

			<div class="p-4 font-weight-bold shadow-sm rounded">
				BEVERAGE
			</div>
			<div class="shadow">
				<div class="card-body p-4 shadow-sm rounded mt-1">
					<div class="mb-2">
						<a href="index.php?dtCoffee"><button class="tombol">Coffee Data</button></a>
						<a href="#"><button class="tombol aktip">Beverage Data</button></a>
						<a href="index.php?dtDessert"><button class="tombol">Dessert Data</button></a>
						<?php
						$level = $_SESSION['level'];
						if ($level == "Admin") :
						?>
							<a href="index.php?tambah_makanan"><button class="tombol float-right"><i class="fas fa-plus ml-3 mr-3"></i></button></a>
						<?php endif; ?>
					</div>
					<table class="table table-hover table-responsive-lg" id="tabel">
						<thead>
							<tr>
								<th>No</th>
								<th>Drink Name</th>
								<th>Price</th>
								<th>Photo</th>
								<th>Status</th>
								<?php
								if ($level == 'Admin') : ?>
									<th>Action</th>
								<?php endif; ?>

							</tr>
						</thead>
						<tbody>
							<!-- mengambil data dari database -->
							<?php
							$i = 1;
							$sql = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE kategori_masakan='NoCoffee'");
							while ($data = mysqli_fetch_array($sql)) : ?>
								<tr class="shadow-sm">
									<td><?= $i++; ?></td>
									<td style="text-transform: capitalize;"><?= $data['nama_masakan'] ?></td>
									<td><?= $data['harga_masakan'] ?></td>
									<td><img src="assets/image/NoCoffee/<?= $data['foto'] ?>" alt="makanan" height="100" class="shadow rounded"></td>
									<?php
									if ($data['status_masakan'] == 1) {
										$status = "Available";
									} else {
										$status = "Not Available";
									}
									?>
									<td><?= $status; ?></td>
									<?php if ($level == "Admin") : ?>
										<td>
											<div class="btn-group">
												<a href="index.php?ubah_makanan=<?= $data['id_masakan'] ?>" class="btn-edit"><i class="far fa-pencil-alt ml-1 mr-1"></i></a>
												<a href="fungsi/hapusMakanan.php?id_masakan=<?= $data['id_masakan']; ?>" class="btn-delete ml-2"><i class="fad fa-trash ml-1 mr-1"></i></a>
											</div>
										</td>
									<?php endif; ?>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>