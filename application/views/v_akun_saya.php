<div id="alert">
	<?php if (@$this->session->response) : ?>
		<div class="alert alert-<?= $this->session->response['status'] == 'error' ? 'danger' : $this->session->response['status'] ?> alert-dismissable fade show" role="alert">
			<button class="close" aria-dismissable="alert">
				<span aria-hidden="true">&times;</span>
			</button>
			<p><?= $this->session->response['message'] ?></p>
		</div>
	<?php endif; ?>
</div>
<div class="card card-solid">
	<div class="card-body pb-0">
		<?php foreach ($user as $key => $value) { ?>
			<div class="row">
				<div class="col-12 col-md-4">
					<div class="card">
						<form action="<?= base_url('pelanggan/update_foto/' . $value->id_pelanggan) ?>" method="post" enctype="multipart/form-data">
							<div class="card-header">
								<h4 class="card-title">Foto Profil</h4>
							</div>
							<div class="card-body text-center">
								<img src="<?= base_url('assets/foto/' . $value->foto) ?>" alt="Foto Profil" class="d-fluid w-75">
							</div>
							<div class="card-footer">
								<div class="custom-file mb-3">
									<input type="file" name="foto" class="custom-file-input" id="input-foto" aria-describedby="input-foto" accept="image/*">
									<label class="custom-file-label" for="input-foto">Pilih Gambar</label>
								</div>
								<button type="submit" class="btn btn-primary btn-block mt-2">Simpan <i class="fa fa-save"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-12 col-md-8">
					<div class="card">
						<form action="<?= base_url('pelanggan/edit_profil/') ?>" method="post">
							<div class="card-header">
								<h4 class="card-title">Edit Profil</h4>
							</div>
							<div class="card-body">
								<h4 class="text-muted my-3">Profil</h4>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="nama">Nama Akun : </label>
										<input type="text" name="username" id="username" value="<?= $value->nama_pelanggan ?>" class="form-control" placeholder="Masukan Username" required="reuqired" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="email">E-mail : </label>
										<input type="email" name="email" id="email" value="<?= $value->email ?>" class="form-control" placeholder="Masukan Email" required="reuqired" />
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<label for="password">Kata Sandi</label>
										<input type="password" name="password" id="password" class="form-control" placeholder="********" />
										<span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="row w-100">
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
										<button type="submit" class="btn btn-primary btn-block">Simpan <i class="fa fa-save"></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</div>