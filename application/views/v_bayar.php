<div class="row">
	<div class="col-sm-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">No Rekening Toko</h3>
			</div>
			<div class="card-body">

				
				<table class="table">
					<tr>
						<th>Nama Produk</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Jumlah</th>
					</tr>
					<tbody>
						<?php foreach ($barang as $key => $value) { ?>
							<tr>
								<td><?= $value->nama_barang ?></td>
								<td>Rp. <?= number_format($value->harga) ?></td>
								<td><?= $value->qty ?></td>
								<td>Rp. <?= number_format(($value->harga * $value->qty)) ?></td>
							</tr>
						<?php } ?>
						<tr>
							<td colspan="3"> <b> PPn (10%) </b></td>
							<td> <b> Rp. <?= ((10 * $value->harga  * $value->qty) / 100) ?> </b> </td>
						</tr>
						<tr>
							<td colspan="3"> <b> Ongkos Kirim (<?= $pesanan->expedisi ?> | <?= $pesanan->paket ?>) </b></td>
							<td> <b>Rp.  <?= number_format($pesanan->ongkir) ?> </b> </td>
						</tr>
						<tr>
							<td colspan="3"><b> Total </b></td>
							<td> <b>Rp. <?= number_format($pesanan->total_bayar) ?> </b></td>
						</tr>
					</tbody>

				</table>
				<form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
					<input type="hidden" name="result_type" id="result-type" value="">
					<input type="hidden" name="result_data" id="result-data" value="">
					<input type="hidden" name="no_order" id="result-no-order" value="<?= $pesanan->no_order ?>">
					<input type="hidden" name="nama" id="result-nama" value="<?= $pelanggan[0]->nama_pelanggan ?>">
					<input type="hidden" name="email" id="result-email" value="<?= $pelanggan[0]->email ?>">
					<input type="hidden" name="total" id="result-amount" value="<?= $pesanan->total_bayar ?>">
				</form>
			</div>
			<div class="card-footer">
				<button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
			</div>
		</div>
	</div>
	<?php /*
	<div class="col-sm-6">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Sudah bayar? Upload Bukti Pembayaran disini</h3>
			</div>
			<!-- /.card-header -->

			<!-- form start -->
			<?php
			echo form_open_multipart('pesanan_saya/bayar/' . encrypt_url($pesanan->id_transaksi));
			?>
			<div class="card-body">
				<div class="form-group">
					<label>Atas Nama</label>
					<input name="atas_nama" class="form-control" placeholder="Atas Nama" required>
				</div>
				<div class="form-group">
					<label>Nama Bank</label>
					<input name="nama_bank" class="form-control" placeholder="Nama Bank" required>
				</div>
				<div class="form-group">
					<label>No Rekening</label>
					<input name="no_rek" class="form-control" placeholder="No Rekening" required>
				</div>

				<div class="form-group">
					<label for="exampleInputFile">Bukti Bayar</label>
					<input type="file" name="bukti_bayar" class="form-control" required>
				</div>

			</div>
			<!-- /.card-body -->

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
				<a href="<?= base_url('pesanan_saya') ?>" class="btn btn-success">Kembali</a>
			</div>
			<?php echo form_close() ?>
		</div>
	</div>
	*/ ?>
</div>

<script type="text/javascript">
	$('#pay-button').click(function(event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");
		let nama = $('#result-nama').val()
		let email = $('#result-email').val()
		let totalBayar = $('#result-amount').val()

		let sendData = {}
		sendData.nama = nama
		sendData.email = email
		sendData.totalBayar = totalBayar

// 		console.log(sendData);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type: 'POST',
			url: '<?= site_url() ?>snap/token',
			data: "datanya=" + JSON.stringify(sendData),
			cache: false,
			dataType:'json',
			success: function(data) {
				//location = data;

				// console.log('token = ' + data);

				var resultType = document.getElementById('result-type');
				var resultData = document.getElementById('result-data');

				function changeResult(type, data) {
					$("#result-type").val(type);
					$("#result-data").val(JSON.stringify(data));
					//resultType.innerHTML = type;
					//resultData.innerHTML = JSON.stringify(data);
				}

				snap.pay(data, {

					onSuccess: function(result) {
						changeResult('success', result);
						console.log(result.status_message);
						console.log(result);
						$("#payment-form").submit();
					},
					onPending: function(result) {
						changeResult('pending', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					},
					onError: function(result) {
						changeResult('error', result);
						console.log(result.status_message);
						$("#payment-form").submit();
					}
				});
			}
		});
	});
</script>