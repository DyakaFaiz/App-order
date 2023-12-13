<?php
$id = $_GET['ubah_user'];
$query = "SELECT * FROM tb_user WHERE id_user='$id'";
$sql = mysqli_query($kon, $query);
$data = mysqli_fetch_array($sql);

$sql2 = mysqli_query($kon, "SELECT * FROM tb_level");
?>
<div class="container mt-4">
	<div class="row flex-c">
		<div class="col-lg-6">
			<div class="shadow p-5 rounded">
				<div class="card-header mb-3 text-center fs-20">
					<strong>Update User</strong>
				</div>
				<div class="card-body p-4">
					<form action="fungsi/ubahUser.php?id_user=<?= $data['id_user'] ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="form-label" for="nama_user">Full Name</label>
							<input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $data['nama_user'] ?>">
						</div>
						<div class="form-group">
							<label class="form-label" for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>">
						</div>
						<div class="form-group">
							<label class="form-label" for="password">Password</label>
							<input type="text" class="form-control" id="password" name="password" value="<?= $data['password'] ?>">
						</div>
						<div class="form-group">
							<label class="form-label" for="id_level">Level</label>
							<select name="id_level" id="id_level" class="form-control">
								<?php foreach ($sql2 as $level) : ?>
									<option value="<?= $level['id_level'] ?>" <?= $data['id_level'] == $level['id_level'] ? 'selected' : '' ?>>
										<?= $level['level'] ?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="card-footer flex-c gx-5">
							<div class="col flex-r">
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
							<div class="col">
								<button type="button" class="btn btn-danger" onclick="history.back()">Back</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>