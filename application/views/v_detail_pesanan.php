<div class="col-12">
    <!-- Main content -->
    <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title"> <i class="fas fa-bars"></i> Pesanan</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?php foreach ($detail['transaksi'] as $key => $value) { ?>
                    <?php foreach ($detail['pelanggan'] as $key => $pelanggan) { ?>
                        <ul class="list-group list-group-unbordered mb-3 col-4 card-body box-profile">
                            <li class="list-group-item">
                                <b>No Order</b> <a class="float-right"> <?= $value->no_order ?> </a>
                            </li>
                            <li class="list-group-item">
                                <b>Nama Pemesan</b> <a class="float-right"><?= $pelanggan->nama_pelanggan ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email Pemesan</b> <a class="float-right"><?= $pelanggan->email ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tanggal Order</b> <a class="float-right"> <?= $value->tgl_order ?> </a>
                            </li>
                            <li class="list-group-item">
                                <b>Waktu Pembayaran</b> <a class="float-right"> <?= $value->transaction_time ?> </a>
                            </li>
                            <li class="list-group-item">
                                <b>Status Pesanan</b> <a class="float-right">
                                    <?php if ($value->status_order == 0) { ?>
                                        <span class="badge badge-warning">Order</span>
                                    <?php } else if ($value->status_order == 1) { ?>
                                        <span class="badge badge-info">Diproses</span>
                                    <?php } else if ($value->status_order == 2) { ?>
                                        <span class="badge badge-success">Dikirim</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Diterima/Sampai</span>
                                    <?php } ?>
                                </a>
                            </li>
                        </ul>
                        <ul class="list-group list-group-unbordered mb-3 col-4 card-body box-profile">
                            <li class="list-group-item">
                                <b>Nama Penerima</b> <a class="float-right"><?= $value->nama_penerima ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>HP Penerima</b> <a class="float-right"><?= $value->hp_penerima ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Alamat</b> <a class="float-right"><?= $value->alamat ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Kota</b> <a class="float-right"><?= $value->kota ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Provinsi</b> <a class="float-right"><?= $value->provinsi ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Kode Pos</b> <a class="float-right"><?= $value->kode_pos ?></a>
                            </li>
                        </ul>
                        <ul class="list-group list-group-unbordered mb-6 col-4 card-body box-profile">
                            <li class="list-group-item">
                                <b>Kurir</b> <a class="float-right"><?= $value->expedisi ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Paket</b> <a class="float-right"><?= $value->paket ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Estimasi</b> <a class="float-right"><?= $value->estimasi ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Ongkir</b> <a class="float-right"><?= $value->ongkir ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Bayar</b> <a class="float-right"><?= $value->total_bayar ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Metode Bayar</b> <a class="float-right"><?= $value->payment_type ?></a>
                            </li>
                        </ul>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="card col-12">
        <div class="card-header border-transparent">
            <h3 class="card-title">
                <i class="fas fa-shopping-cart"></i> <?= $title ?>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="card-body p-12">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($detail['barang']); $i++) {  ?>
                            <tr>
                                <td><?= $detail['barang'][$i]->nama_barang ?></td>
                                <td><?= $detail['barang'][$i]->qty ?></td>
                                <td><?= $detail['barang'][$i]->harga ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="card-footer clearfix">
            <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>
        </div>

    </div>
    <!-- /.invoice -->
</div><!-- /.col -->
</div><!-- /.row -->