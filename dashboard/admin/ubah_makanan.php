<?php
$id = $_GET['ubah_makanan'];
$query = "SELECT * FROM tb_masakan WHERE id_masakan='$id'";
$sql = mysqli_query($kon, $query);
$data = mysqli_fetch_array($sql);

if ($data['kategori_masakan'] == "Coffee") {
	$kategori = "Coffee";
	$sc = "Selected";
} elseif ($data['kategori_masakan'] == "NoCoffee") {
	$kategori = "NoCoffee";
	$snc = "Selected";
} elseif ($data['kategori_masakan'] == "Dessert") {
	$kategori = "Dessert";
	$sd = "Selected";
}
?>
<div class="container p-3">
	<div class="row flex-c">
		<div class="col-lg-6">
			<div class="shadow p-4 rounded">
				<div class="card-header  mb-3 text-center fs-20">
					<strong>Change <?= $kategori; ?></strong>
				</div>
				<div class="card-body">
					<form action="fungsi/ubahMakanan.php?id_masakan=<?= $data['id_masakan'] ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-label" for="kategori_masakan">Category</label>
							<select name="kategori_masakan" id="kategori_masakan" class="form-control">
								<option value="Coffee" <?= $sc; ?>>Coffee</option>
								<option value="NoCoffee" <?= $snc; ?>>No Coffee</option>
								<option value="Dessert" <?= $sd; ?>>Dessert</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label" for="nama_masakan">Name <?= $kategori; ?></label>
							<input type="text" class="form-control" id="nama_masakan" name="nama_masakan" value="<?= $data['nama_masakan'] ?>">
						</div>
						<div class="form-group">
							<label class="form-label" for="harga_masakan">Price</label>
							<input type="number" class="form-control" id="harga_masakan" name="harga_masakan" min="0" value="<?= $data['harga_masakan'] ?>">
						</div>
						<div class="form-group">
							<label class="form-label" for="status_masakan">Status</label>
							<select name="status_masakan" id="status_masakan" class="form-control">
								<?php
								if ($data['status_masakan'] == 1) {
									$tersedia = "Selected";
								} elseif ($data['status_masakan'] == 0) {
									$tTersedia = "Selected";
								}
								?>
								<option value="1" <?= $tersedia; ?>>Available</option>
								<option value="0" <?= $tTersedia; ?>>Not Available</option>
							</select>
						</div>
						<?php
						if ($kategori == "Coffee") {
							$src = 'Coffee';
						} elseif ($kategori == "NoCoffee") {
							$src = 'NoCoffee';
						} elseif ($kategori == "Dessert") {
							$src = 'Dessert';
						}
						?>

						<div class="form-group">
							<label class="form-label" for="foto">Photo</label>
							<div class="row">
								<div class="col-md-4">
									<img src="assets/image/<?= $src; ?>/<?= $data['foto'] ?>" alt="makanan" class="img-thumbnail">
								</div>
								<div class="col-md-8">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<div class="input-group-text">
												<input type="checkbox" name="ubah_foto">
											</div>
										</div>
										<div class="custom-file">
											<label class="custom-file-label" for="foto">Choose file</label>
											<input type="file" class="custom-file-input" id="foto" name="foto">
										</div>
									</div>
									<span class="help-block text-muted">Check if you want to change the photo</span>
								</div>
							</div>
						</div>
						<div class="card-footer flex-c gx-5">
							<div class="col flex-r">
								<button type="submit" class="btn-edit">Submit</button>
							</div>
							<div class="col">
								<button type="button" class="btn-delete" onclick="history.back()">Back</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>