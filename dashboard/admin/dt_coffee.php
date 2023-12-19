<div class="container mt-3">
	<?php if (isset($_SESSION['pesan'])) : ?>
		<?= $_SESSION['pesan'] ?>
	<?php unset($_SESSION['pesan']);
	endif; ?>
	<div class="row flex-c">
		<div class="col-md-11 p-3">

			<div class="p-4 font-weight-bold shadow-sm rounded">
				Coffee
			</div>
			<div class="shadow rounded mt-1">
				<div class="card-body p-4">
					<a href="#"><button class="btn btn-primary btn-sm mb-3">Coffee Data</button></a>
					<a href="index.php?dtNoCoffee"><button class="btn btn-primary btn-sm mb-3">Beverage Data</button></a>
					<a href="index.php?dtDessert"><button class="btn btn-primary btn-sm mb-3">Dessert Data</button></a>
					<?php
					$level = $_SESSION['level'];
					if ($level == "Admin") :
					?>
						<a href="index.php?tambah_makanan"><button class="btn btn-success btn-sm mb-3 float-right">Add Menu</button></a>
					<?php endif; ?>
					<table class="table table-hover table-responsive-lg" id="tabel">
						<thead>
							<tr>
								<th>No</th>
								<th>Coffe Name</th>
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
							$sql = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE kategori_masakan='Coffee'");
							while ($data = mysqli_fetch_array($sql)) : ?>
								<tr>
									<td><?= $i++; ?></td>
									<td style="text-transform: capitalize;"><?= $data['nama_masakan'] ?></td>
									<td><?= $data['harga_masakan'] ?></td>
									<td><img src="assets/image/Coffee/<?= $data['foto'] ?>" alt="makanan" height="100" class="shadow rounded"></td>
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
												<a href="index.php?ubah_makanan=<?= $data['id_masakan'] ?>" class="btn btn-sm btn-warning rounded">Edit</a>
												<a href="fungsi/hapusMakanan.php?id_masakan=<?= $data['id_masakan']; ?>" class="btn btn-danger btn-sm ml-2 rounded">Delete</a>
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