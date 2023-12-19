<div class="container mt-3">
	<?php if (isset($_SESSION['pesan'])) : ?>
		<?= $_SESSION['pesan'] ?>
	<?php unset($_SESSION['pesan']);
	endif; ?>
	<div class="row flex-c mt-4">
		<div class="col-lg-6">
			<div class="shadow p-4 rounded">
				<div class="p-3 font-weight-bold text-center">
					<h5><strong>Registration User</strong></h5>
				</div>
				<div class="card-body p-1">
					<form action="fungsi/registrasi_user.php" method="post">
						<div class="form-group">
							<label class="form-label" for="nama_user">Full Name</label>
							<input type="text" class="form-control" id="nama_user" name="nama_user">
						</div>
						<div class="form-group">
							<label class="form-label" for="username">Username</label>
							<input type="text" class="form-control" id="username" name="username">
						</div>
						<div class="form-group">
							<label class="form-label" for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group">
							<label class="form-label" for="id_level">id_level</label>
							<select name="id_level" id="id_level" class="form-control">
								<option value="1">Owner</option>
								<option value="2">Admin</option>
								<option value="3">Cashier</option>
								<option value="4">Customer</option>
							</select>
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