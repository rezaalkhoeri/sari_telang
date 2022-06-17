<div class="col-md-12">
	<div class="card card-primary">
		<div class="card-header">
			<h3 class="card-title">Data Barang</h3>

			<div class="card-tools">
				<a href="<?= base_url('barang/add') ?>" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah</a>
			</div>
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<?php
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i>';
				echo $this->session->flashdata('pesan');
				echo '</h5></div>';
			}


			?>
			<table class="table table-bordered" id="example1">
				<thead class="text-center">
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Gambar</th>
						<th>Stok</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($barang as $key => $value) { ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td>
								<?= $value->nama_barang ?><br>
								Berat : <?= $value->berat ?> Gr
							</td>
							<td class="text-center"><?= $value->nama_kategori ?></td>
							<td class="text-center">Rp. <?= number_format($value->harga, 0) ?></td>
							<td class="text-center"><img src="<?= base_url('assets/gambar/' . $value->gambar) ?>" width="150px"></td>
							<td class="text-center"><?= $value->stok ?></td>
							<td class="text-center">
								<a href="<?= base_url('barang/edit/' . encrypt_url($value->id_barang)) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value->id_barang ?>"><i class="fas fa-trash"></i></button>
								
								<?php if($value->status == 0) { ?>
    								<a href="<?= base_url('barang/unhide/' . encrypt_url($value->id_barang)) ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
								<?php } else  { ?>
    								<a href="<?= base_url('barang/hide/' . encrypt_url($value->id_barang)) ?>" class="btn btn-danger btn-sm"><i class="fas fa-eye-slash"></i></a>
    							<?php } ?>
								
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>



<!--modal delete -->
<?php foreach ($barang as $key => $value) { ?>
	<div class="modal fade" id="delete<?= $value->id_barang ?>">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Hapus <?= $value->nama_barang ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<h5>Apakah Anda Yakin Ingin Menghapus Data Ini...?</h5>


				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<a href="<?= base_url('barang/delete/' . $value->id_barang) ?>" class="btn btn-primary">Hapus</a>
				</div>

			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
<?php } ?>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#example1').DataTable({
                searching: false,
                paging: false
		});
		
		table.destroy();
	});
</script>