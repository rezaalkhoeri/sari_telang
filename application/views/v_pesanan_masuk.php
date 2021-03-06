<div class="col-sm-12">
	<?php

	if ($this->session->flashdata('pesan')) {
		echo '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h5><i class="icon fas fa-check"></i>';
		echo $this->session->flashdata('pesan');
		echo '</h5>
	</div>';
	}
	?>
	<div class="card card-primary card-outline card-outline-tabs">
		<div class="card-header p-0 border-bottom-0">
			<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Pesanan Masuk</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Diproses</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Dikirim</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="custom-tabs-four-settings-tab" data-toggle="pill" href="#custom-tabs-four-settings" role="tab" aria-controls="custom-tabs-four-settings" aria-selected="false">Selesai</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="tab-content" id="custom-tabs-four-tabContent">
				<div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Detail Barang</th>
							<th>Tanggal</th>
							<th>Kurir</th>
							<th>Total Bayar</th>
							<th></th>
						</tr>
						<?php foreach ($pesanan_masuk['pesanan'] as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<div class="row">
										<table class="col-12 mt-2">
											<?php for ($i = 0; $i < count($pesanan_masuk['detail'][$key]); $i++) { ?>
												<tr>
													<td width="120px">
														<img class="" src="<?= base_url('assets/gambar/' . $pesanan_masuk['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
													</td>
													<td width="220px">
														<h4 class="card-title"><?php echo $pesanan_masuk['detail'][$key][$i]->nama_barang ?></h4>
														<p class="card-text"> Rp. <?php echo number_format($pesanan_masuk['detail'][$key][$i]->harga) ?> </p>
													</td>
													<td>
														<small class="text-muted"> x <?php echo $pesanan_masuk['detail'][$key][$i]->qty ?> </small>
													</td>
												</tr>
											<?php } ?>
										</table>
									</div>
								</td>
								<td><?= $value->tgl_order ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>
									<?php if ($value->status_bayar == 0) { ?>
										<span class="badge badge-warning">Belum Bayar</span>
									<?php } else { ?>
										<span class="badge badge-success">Sudah Bayar</span><br>
										<span class="badge badge-primary">Menunggu Verifikasi</span>
									<?php } ?>
								</td>
								<td>
									<?php if ($value->status_bayar == 1) { ?>
										<button class="btn btn-sm btn-success btn-flat" data-toggle="modal" data-target="#cek<?= $value->id_transaksi ?>">Cek Bukti Bayar</button>
										<a href="<?= base_url('admin/proses/' . $value->id_transaksi) ?>" class="btn btn-sm btn-flat btn-primary">Proses</a>
									<?php } ?>

								</td>
							</tr>
						<?php } ?>

					</table>
				</div>
				<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Detail Barang</th>
							<th>Tanggal</th>
							<th>Kurir</th>
							<th>Total Bayar</th>
							<th></th>
						</tr>
						<?php foreach ($diproses['pesanan'] as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<div class="row">
										<table class="col-12 mt-2">
											<?php for ($i = 0; $i < count($diproses['detail'][$key]); $i++) { ?>
												<tr>
													<td width="120px">
														<img class="" src="<?= base_url('assets/gambar/' . $diproses['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
													</td>
													<td width="220px">
														<h4 class="card-title"><?php echo $diproses['detail'][$key][$i]->nama_barang ?></h4>
														<p class="card-text"> Rp. <?php echo number_format($diproses['detail'][$key][$i]->harga) ?> </p>
													</td>
													<td>
														<small class="text-muted"> x <?php echo $diproses['detail'][$key][$i]->qty ?> </small>
													</td>
												</tr>
											<?php } ?>
										</table>
									</div>
								</td>
								<td><?= $value->tgl_order ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>

									<span class="badge badge-primary">Diproses/Dikemas</span>

								</td>
								<td>
									<?php if ($value->status_bayar == 1) { ?>

										<button class="btn btn-sm btn-flat btn-primary" data-toggle="modal" data-target="#kirim<?= $value->id_transaksi ?>"><i class="fa fa-paper-plane"></i> Kirim</button>
									<?php } ?>

								</td>
							</tr>
						<?php } ?>

					</table>
				</div>
				<div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Detail Barang</th>
							<th>Tanggal</th>
							<th>Kurir</th>
							<th>Total Bayar</th>
							<th>No Resi</th>
						</tr>
						<?php foreach ($dikirim['pesanan'] as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<div class="row">
										<table class="col-12 mt-2">
											<?php for ($i = 0; $i < count($dikirim['detail'][$key]); $i++) { ?>
												<tr>
													<td width="120px">
														<img class="" src="<?= base_url('assets/gambar/' . $dikirim['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
													</td>
													<td width="220px">
														<h4 class="card-title"><?php echo $dikirim['detail'][$key][$i]->nama_barang ?></h4>
														<p class="card-text"> Rp. <?php echo number_format($dikirim['detail'][$key][$i]->harga) ?> </p>
													</td>
													<td>
														<small class="text-muted"> x <?php echo $dikirim['detail'][$key][$i]->qty ?> </small>
													</td>
												</tr>
											<?php } ?>
										</table>
									</div>
								</td>
								<td><?= $value->tgl_order ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>

									<span class="badge badge-success">Dikirim</span>

								</td>
								<td>
									<h4><?= $value->no_resi ?></h4>
								</td>
							</tr>
						<?php } ?>

					</table>
				</div>
				<div class="tab-pane fade" id="custom-tabs-four-settings" role="tabpanel" aria-labelledby="custom-tabs-four-settings-tab">
					<table class="table">
						<tr>
							<th>No Order</th>
							<th>Detail Barang</th>
							<th>Tanggal</th>
							<th>Kurir</th>
							<th>Total Bayar</th>
							<th>No Resi</th>
						</tr>
						<?php foreach ($selesai['pesanan'] as $key => $value) { ?>
							<tr>
								<td><?= $value->no_order ?></td>
								<td>
									<div class="row">
										<table class="col-12 mt-2">
											<?php for ($i = 0; $i < count($selesai['detail'][$key]); $i++) { ?>
												<tr>
													<td width="120px">
														<img class="" src="<?= base_url('assets/gambar/' . $selesai['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
													</td>
													<td width="220px">
														<h4 class="card-title"><?php echo $selesai['detail'][$key][$i]->nama_barang ?></h4>
														<p class="card-text"> Rp. <?php echo number_format($selesai['detail'][$key][$i]->harga) ?> </p>
													</td>
													<td>
														<small class="text-muted"> x <?php echo $selesai['detail'][$key][$i]->qty ?> </small>
													</td>
												</tr>
											<?php } ?>
										</table>
									</div>
								</td>
								<td><?= $value->tgl_order ?></td>
								<td>
									<b><?= $value->expedisi ?></b><br>
									Paket : <?= $value->paket ?><br>
									Ongkir : <?= number_format($value->ongkir, 0) ?>
								</td>
								<td>
									<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>

									<span class="badge badge-success">Diterima/Sampai</span>

								</td>
								<td>
									<h4><?= $value->no_resi ?></h4>
								</td>
							</tr>
						<?php } ?>

					</table>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div>
</div>

<?php foreach ($pesanan_masuk['pesanan'] as $key => $value) { ?>

	<!-- modal cek bukti pembayaran -->
	<div class="modal fade" id="cek<?= $value->id_transaksi ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><?= $value->no_order ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php if ($value->order_id != null) { ?>
						<table class="table">
							<tr>
								<th>Order ID</th>
								<th>:</th>
								<td><?= $value->order_id ?></td>
							</tr>
							<tr>
								<th>Tipe Pembayaran</th>
								<th>:</th>
								<td><?= $value->payment_type ?></td>
							</tr>
							<?php if ($value->order_id != null) { ?>
								<tr>
									<th>Bank</th>
									<th>:</th>
									<td><?= $value->bank ?></td>
								</tr>
								<tr>
									<th>Nomor Virtual Akun</th>
									<th>:</th>
									<td><?= $value->va_number ?></td>
								</tr>
							<?php }  ?>
							<tr>
								<th>Waktu Transaksi</th>
								<th>:</th>
								<td><?= $value->transaction_time ?></td>
							</tr>
							<tr>
								<th>Status Transaksi</th>
								<th>:</th>
								<td><?= $value->transaction_status ?></td>
							</tr>
							<tr>
								<th>Total Bayar</th>
								<th>:</th>
								<td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
							</tr>
						</table>
					<?php } else { ?>
						<table class="table">
							<tr>
								<th>Nama Bank</th>
								<th>:</th>
								<td><?= $value->nama_bank ?></td>
							</tr>
							<tr>
								<th>No Rek</th>
								<th>:</th>
								<td><?= $value->no_rek ?></td>
							</tr>
							<tr>
								<th>Atas Nama</th>
								<th>:</th>
								<td><?= $value->atas_nama ?></td>
							</tr>
							<tr>
								<th>Total Bayar</th>
								<th>:</th>
								<td>Rp. <?= number_format($value->total_bayar, 0) ?></td>
							</tr>
							<img class="img-fluid pad" src="<?= base_url('assets/bukti_bayar/' . $value->bukti_bayar) ?>" alt="">
						</table>

					<?php } ?>

				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>


<?php foreach ($diproses['pesanan'] as $key => $value) { ?>
	<div class="modal fade" id="kirim<?= $value->id_transaksi ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><?= $value->no_order ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<?php echo form_open('admin/kirim/' . $value->id_transaksi) ?>
					<table class="table">
						<tr>
							<th>Kurir</th>
							<th>:</th>
							<th><?= $value->expedisi ?></th>
						</tr>
						<tr>
							<th>Paket</th>
							<th>:</th>
							<th><?= $value->paket ?></th>
						</tr>
						<tr>
							<th>Paket</th>
							<th>:</th>
							<th>Rp.<?= number_format($value->ongkir, 0) ?></th>
						</tr>
						<tr>
							<th>No Resi</th>
							<th>:</th>
							<th><input name="no_resi" class="form-control" placeholder="No Resi" required></th>
						</tr>
					</table>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Kirim</button>
				</div>
				<?php echo form_close() ?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>