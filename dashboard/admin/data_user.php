<link rel="stylesheet" href="../../auth/css/main.css">
<link rel="stylesheet" href="/dashboard/assets/css/custom.css">
<div class="container mt-3">
	<div class="row flex-c">
		<div class="col-md-11 p-3">
			<?php if (isset($_SESSION['pesan'])) : ?>
				<?= $_SESSION['pesan'] ?>
			<?php unset($_SESSION['pesan']);
			endif; ?>
			<div class="p-4 font-weight-bold shadow-sm rounded">
				USER DATA
			</div>

			<div class="shadow p-4 shadow-sm rounded mt-1">
				<a href="index.php?registrasi"><button class="tombol">Add User</button></a>
				<table class="table table-responsive-lg" id="tabel">
					<thead>
						<tr>
							<th>No</th>
							<th>Full Name</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
							<?php if ($_SESSION['level'] == "Admin") : ?>
								<th>Action</th>
							<?php endif ?>
						</tr>
					</thead>
					<tbody>
						<!-- mengambil data dari database -->
						<?php
						if ($_SESSION['level'] == "Admin") {
							$tp = "text";
						} else {
							$tp = "password";
						}

						$i = 1;
						$sql = mysqli_query($kon, "SELECT * FROM tb_user");
						while ($data = mysqli_fetch_array($sql)) : ?>

							<tr>
								<td><?= $i++; ?></td>
								<td><?= $data['nama_user'] ?></td>
								<td><?= $data['username'] ?></td>
								<td>
									<div class="wrap-input100">
										<span class="btn-show-pass">
											<i class="zmdi zmdi-eye"></i>
										</span>
										<input class="input100" type="<?= $tp ?>" name="password" value="<?= $data['password'] ?>" disabled>
									</div>
								</td>
								<?php
								if ($data['id_level'] == 1) {
									$level = "Owner";
								} elseif ($data['id_level'] == 2) {
									$level = "Admin";
								} elseif ($data['id_level'] == 3) {
									$level = "Cashier";
								} elseif ($data['id_level'] == 4) {
									$level = "Customer";
								}

								?>
								<td><?= $level; ?></td>
								<?php if ($_SESSION['level'] == "Admin") : ?>
									<td>
										<div class="btn-group">
											<a href="index.php?ubah_user=<?= $data['id_user'] ?>" class="btn btn-sm btn-warning rounded">Edit</a>
											<a href="fungsi/hapusUser.php?id_user=<?= $data['id_user']; ?>" class="btn btn-danger btn-sm ml-2 rounded">Delete</a>
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