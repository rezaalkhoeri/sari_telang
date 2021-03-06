<div class="col-12">
    <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <i class="fas fa-shopping-cart"></i> <?= $title ?>
                    <small class="float-right">Bulan: <?= $bulan ?> Tahun: <?= $tahun ?></small>
                </h4>
            </div>
            <!-- /.col -->
        </div>


        <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped" id="detail_pesanan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $grand_total = 0;
                        foreach ($laporan as $key => $value) {
                            $grand_total = $grand_total + $value->grand_total;
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->no_order ?></td>
                                <td><?= $value->tgl_order ?></td>
                                <td>Rp. <?= number_format($value->grand_total, 0) ?></td>
                                <td>
                                    <a class="btn btn-info" href="<?= base_url('pesanan_saya/detail_pesanan/' . encrypt_url($value->id_transaksi)) ?>"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
                <h3 style="float: right;"> Total : Rp. <?= number_format($grand_total, 0) ?></h3>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-12">
                <button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Cetak</button>

            </div>
        </div>
    </div>
    <!-- /.invoice -->
</div><!-- /.col -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#detail_pesanan').DataTable();
    });
</script>