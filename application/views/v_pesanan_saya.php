<div class="row">
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
						<a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Order</a>
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
						<!-- data pesanan order -->
						<table class="table">
							<tr>
								<th>No Order</th>
								<th>Detail Barang</th>
								<th>Tanggal</th>
								<th>Kurir</th>
								<th>Total Bayar</th>
								<th>Aksi</th>
							</tr>
							<?php foreach ($belum_bayar['pesanan'] as $key => $value) { ?>
								<tr>
									<td><?= $value->no_order ?></td>
									<td>
										<!-- <button type="button" class="btn btn-sm btn-primary detail_barang" data="<?= $value->no_order ?>">
											<i class="fa fa-eye"> </i>
										</button> -->
										<?php for ($i = 0; $i < count($belum_bayar['detail'][$key]); $i++) { ?>
											<div class="row">
												<div class="col-12 mt-2">
													<div class="card">
														<div class="card-horizontal">
															<div class="img-square-wrapper">
																<img class="" src="<?= base_url('assets/gambar/' . $belum_bayar['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
															</div>
															<div class="card-body">
																<h4 class="card-title"><?php echo $belum_bayar['detail'][$key][$i]->nama_barang ?></h4>
																<p class="card-text"> Rp. <?php echo number_format($belum_bayar['detail'][$key][$i]->harga) ?> </p>
															</div>
															<div class="card-body" align="right">
																<small class="text-muted"> x <?php echo $belum_bayar['detail'][$key][$i]->qty ?> </small>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
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
										<?php if ($value->status_bayar == 0) { ?>
											<a href="<?= base_url('pesanan_saya/bayar/' . encrypt_url($value->id_transaksi)) ?>" class="btn btn-sm btn-flat btn-primary">Bayar</a>
										<?php } ?>

									</td>
								</tr>
							<?php } ?>

						</table>
					</div>
					<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
						<!-- data pesanan diproses -->
						<table class="table">
							<tr>
								<th>No Order</th>
								<th>Detail Barang</th>
								<th>Tanggal</th>
								<th>Kurir</th>
								<th>Total Bayar</th>

							</tr>
							<?php foreach ($diproses['pesanan'] as $key => $value) { ?>
								<tr>
									<td><?= $value->no_order ?></td>
									<td>
										<?php for ($i = 0; $i < count($diproses['detail'][$key]); $i++) { ?>
											<div class="row">
												<div class="col-12 mt-2">
													<div class="card">
														<div class="card-horizontal">
															<div class="img-square-wrapper">
																<img class="" src="<?= base_url('assets/gambar/' . $diproses['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
															</div>
															<div class="card-body">
																<h4 class="card-title"><?php echo $diproses['detail'][$key][$i]->nama_barang ?></h4>
																<p class="card-text"> Rp. <?php echo number_format($diproses['detail'][$key][$i]->harga) ?> </p>
															</div>
															<div class="card-body" align="right">
																<small class="text-muted"> x <?php echo $diproses['detail'][$key][$i]->qty ?> </small>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</td>
									<td><?= $value->tgl_order ?></td>
									<td>
										<b><?= $value->expedisi ?></b><br>
										Paket : <?= $value->paket ?><br>
										Ongkir : <?= number_format($value->ongkir, 0) ?>
									</td>
									<td>
										<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>
										<span class="badge badge-success">Terverifikasi</span><br>
										<span class="badge badge-primary">Diproses/Dikemas</span>

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
										<?php for ($i = 0; $i < count($dikirim['detail'][$key]); $i++) { ?>
											<div class="row">
												<div class="col-12 mt-2">
													<div class="card">
														<div class="card-horizontal">
															<div class="img-square-wrapper">
																<img class="" src="<?= base_url('assets/gambar/' . $dikirim['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
															</div>
															<div class="card-body">
																<h4 class="card-title"><?php echo $dikirim['detail'][$key][$i]->nama_barang ?></h4>
																<p class="card-text"> Rp. <?php echo number_format($dikirim['detail'][$key][$i]->harga) ?> </p>
															</div>
															<div class="card-body" align="right">
																<small class="text-muted"> x <?php echo $dikirim['detail'][$key][$i]->qty ?> </small>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</td>
									<td><?= $value->tgl_order ?></td>
									<td>
										<b><?= $value->expedisi ?></b><br>
										Paket : <?= $value->paket ?><br>
										Ongkir : <?= number_format($value->ongkir, 0) ?>
									</td>
									<td>
										<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>
										<span class="badge badge-success">Dikirim</span><br>
									</td>
									<td>
										<h5><?= $value->no_resi ?><br> </h5>
										<button data-toggle="modal" data-target="#diterima<?= encrypt_url($value->id_transaksi) ?>" class="btn btn-primary btn-xs btn-flat">Diterima</button>
										<a href="https://cekresi.com/" target="_blank" class="btn btn-primary btn-xs btn-flat"> Lacak Paket </a>
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
										<?php for ($i = 0; $i < count($selesai['detail'][$key]); $i++) { ?>
											<div class="row">
												<div class="col-12 mt-2">
													<div class="card">
														<div class="card-horizontal">
															<div class="img-square-wrapper">
																<img class="" src="<?= base_url('assets/gambar/' . $selesai['detail'][$key][$i]->gambar) ?>" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">
															</div>
															<div class="card-body">
																<h4 class="card-title"><?php echo $selesai['detail'][$key][$i]->nama_barang ?></h4>
																<p class="card-text"> Rp. <?php echo number_format($selesai['detail'][$key][$i]->harga) ?> </p>
															</div>
															<div class="card-body" align="right">
																<small class="text-muted"> x <?php echo $selesai['detail'][$key][$i]->qty ?> </small>
															</div>
														</div>
													</div>
												</div>
											</div>
										<?php } ?>
									</td>
									<td><?= $value->tgl_order ?></td>
									<td>
										<b><?= $value->expedisi ?></b><br>
										Paket : <?= $value->paket ?><br>
										Ongkir : <?= number_format($value->ongkir, 0) ?>
									</td>
									<td>
										<b>Rp.<?= number_format($value->total_bayar, 0) ?></b><br>
										<span class="badge badge-success">Selesai</span><br>
									</td>
									<td>
										<h5><?= $value->no_resi ?><br>
										</h5>
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
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detail Barang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container-fluid data_barang">


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php foreach ($dikirim['pesanan'] as $key => $value) { ?>
	<div class="modal fade" id="diterima<?= encrypt_url($value->id_transaksi) ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Pesanan Diterima</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Apakah Anda Yakin Pesanan Sudah Diterima...?
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
					<a href="<?= base_url('pesanan_saya/diterima/' . encrypt_url($value->id_transaksi)) ?>" class="btn btn-primary">Ya</a>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php } ?>

<style>
	.card-horizontal {
		display: flex;
		flex: 1 1 auto;
	}
</style>
<script>
	$(document).ready(function() {
		$(".detail_barang").click(function(e) {
			let noOrder = $(this).attr("data")
			let data = {}
			data.noOrder = noOrder

			$.ajax({
				url: "<?= base_url('pesanan_saya/detail_barang') ?>",
				type: "POST",
				data: "datanya=" + JSON.stringify(data),
				dataType: "json",
				success: function(data) {
					$('#exampleModal').modal('show')
					$('.data_barang').empty()

					// console.log(data);
					for (let i = 0; i < data.length; i++) {
						let html = '<div class="row"><div class="col-12 mt-2"><div class="card"><div class="card-horizontal"><div class="img-square-wrapper">'
						html += '<img class="" src="<?= base_url('assets/gambar/') ?>' + data[i].gambar + '" alt="Card image cap" width="90px" height="100%" style="object-fit:scale-down;">'
						html += '</div><div class="card-body">'
						html += '<h4 class="card-title">' + data[i].nama_barang + '</h4>'
						html += '<p class="card-text"> ' + data[i].harga + ' </p> </div>'
						html += '<div class="card-body" align="right">'
						html += '<small class="text-muted"> x ' + data[i].qty + ' </small>'
						html += '</div></div ><div class="card-footer" align="right">'
						html += '<small class="text-muted" > ' + (data[i].harga * data[i].qty) + ' </small>'
						html += '</div></div></div></div>'

						$('.data_barang').append(html);
					}

				},
				error: function(data) {

				}
			});
		});
	});
</script>