<div class="container mt-3">
	<div class="row flex-c">
		<div class="col-lg-8">
			<div class="card shadow">
				<div class="card-header">
					<strong>Tambah Menu</strong>
				</div>
				<div class="card-body">
					<form action="fungsi/tambahMakanan.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-label" for="kategori_masakan">Kategori Masakan</label>
							<select name="kategori_masakan" id="kategori_masakan" class="form-control">
								<option value="Coffee">Coffee</option>
								<option value="NoCoffee">No Coffee</option>
								<option value="Dessert">Dessert</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label" for="nama_masakan">Nama Makanan</label>
							<input type="text" class="form-control" id="nama_masakan" name="nama_masakan">
						</div>
						<div class="form-group">
							<label class="form-label" for="harga_masakan">Harga</label>
							<input type="number" class="form-control" id="harga_masakan" name="harga_masakan" min="0">
						</div>
						<div class="form-group">
							<label class="form-label" for="status_masakan">Status</label>
							<select name="status_masakan" id="status_masakan" class="form-control">
								<option value="1">Tersedia</option>
								<option value="0">Tidak Tersedia</option>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label" for="foto">Foto</label>
							<div class="custom-file">
								<label class="custom-file-label" for="foto">Choose file</label>
								<input type="file" class="custom-file-input" id="foto" name="foto" required>
							</div>
						</div>
						<div class="flex-r">
							<button type="submit" class="btn btn-primary">Submit</button>
							<button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>