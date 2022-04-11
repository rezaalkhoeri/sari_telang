<div class="row">
    <div class="col-12">
        <div class="invoice p-3 mb-3">

            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> Sari Telang
                        <small class="float-right">Tanggal <?= date("d/m/Y"); ?></small>
                    </h4>
                </div>

            </div>

            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Dari
                    <address>
                        <strong>Sari Telang</strong><br>
                        Jalan Barokah Rt 14 Rw 04 Ds. Pesarean<br>
                        Kec.Adiwerna Kab. Tegal - 52154<br>
                        Phone : +62 853-2519-1799<br>
                        Email : mourest19@gmail.com
                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    Untuk
                    <address>
                        <strong><?= $data_pesanan['nama'] ?></strong><br>
                        <?= $data_pesanan['email'] ?>
                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    <b>Invoice #<?= $data_pesanan['no_order'] ?></b><br>
                    <br>
                    <b>Order ID:</b> <?= $pembayaran->order_id ?> <br>
                    <b>Waktu Transaksi:</b> <?= $pembayaran->transaction_time ?> <br>
                    <b>Status Bayar:</b> <?= $pembayaran->transaction_status ?> <br>
                    <b>Pesan:</b> <?= $pembayaran->status_message ?>
                </div>

            </div>

            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_pesanan['barang'] as $row) : ?>
                                <tr>
                                    <td><?= $row->qty ?></td>
                                    <td><?= $row->nama_barang ?></td>
                                    <td>Rp. <?= number_format($row->harga, 0) ?></td>
                                    <td><?= $row->deskripsi ?></td>
                                    <td>Rp. <?= number_format($row->qty * $row->harga, 0) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    <p class="lead">Metode Bayar:</p>
                    <?php if ($pembayaran->payment_type == 'bank_transfer') { ?>

                        <?php if ($pembayaran->va_numbers[0]->bank == 'bca') { ?>
                            <img src="https://www.bca.co.id/-/media/Feature/Header/Header-Logo/logo-bca.svg?v=1" width="100" alt="bca">
                        <?php } elseif ($pembayaran->va_numbers[0]->bank == 'mandiri') { ?>
                            <img src="https://bankmandiri.co.id/image/layout_set_logo?img_id=31567&t=1644339091162" width="100" alt="mandiri">
                        <?php } elseif ($pembayaran->va_numbers[0]->bank == 'bni') { ?>
                            <img src="https://www.bni.co.id/Portals/1/bni-logo-id.svg?ver=2017-04-27-170938-000" width="100" alt="bni">
                        <?php } elseif ($pembayaran->va_numbers[0]->bank == 'permata') { ?>
                            <img src="https://i0.wp.com/www.alamatbank.com/wp-content/uploads/2016/01/Logo-Bank-Permata-02.png?fit=583%2C276&ssl=1" width="100" alt="permata">
                        <?php } else { ?>
                            <img src="https://bri.co.id/o/bri-corporate-theme/images/bri-logo.png" width="100" alt="bri">
                        <?php } ?>

                        <br>
                        <br>

                        <b>Virtual Account : <?= $pembayaran->va_numbers[0]->va_number ?> </b> <br>
                        <b>Tagihan : <?= $pembayaran->currency ?> <?= number_format($pembayaran->gross_amount, 0) ?> </b><br>

                    <?php } elseif ($pembayaran->payment_type == 'gopay') { ?>
                        <img src="https://gopay.co.id/_nuxt/img/site-logo.3e08530.png" width="100" alt="gopay">
                        <br>
                        <br>
                        <b> QR CODE </b> :
                        <br>
                        <img src="https://api.sandbox.veritrans.co.id/v2/gopay/<?= $pembayaran->transaction_id ?>/qr-code" width="200" alt="gopay">
                    <?php } elseif ($pembayaran->payment_type == 'qris') { ?>
                        <img src="https://shopeepay.co.id/src/pages/home/assets/images/1-shopeepay-rectangle-orange1.png" width="100" alt="shopee">
                        <img src="https://qris.id/homepage/images/assets/pay/qris.id-3.png" width="100" alt="qris">
                        <br>
                        <br>
                        <b> QR CODE </b> :
                        <br>
                        <img src="https://api.sandbox.veritrans.co.id/v2/qris/<?= $pembayaran->transaction_id ?>/qr-code" width="200" alt="gopay">
                    <?php } else { ?>
                        <img src="https://indomaret.co.id/Assets/image/logo.png" width="100" alt="indomaret">
                        <br>
                        <br>
                        <b>Kode Bayar : <?= $pembayaran->payment_code ?> </b> <br>
                        <b>Tagihan : <?= $pembayaran->currency ?> <?= number_format($pembayaran->gross_amount, 0) ?> </b><br>
                    <?php } ?>

                </div>
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>Rp. <?= number_format($data_pesanan['transaksi'][0]->grand_total, 0) ?></td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    <td>Rp. <?= number_format($data_pesanan['transaksi'][0]->ongkir, 0) ?></td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td>Rp. <?= number_format($data_pesanan['transaksi'][0]->total_bayar, 0) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>


            <div class="row no-print">
                <div class="col-12">
                    <?php if ($pembayaran->payment_type == 'bank_transfer' || $pembayaran->payment_type == 'cstore') { ?>
                        <a href="<?= $result->pdf_url ?>" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                            <i class="fas fa-download"></i> Download
                        </a>
                    <?php } ?>

                    <a href="<?= base_url('pesanan_saya')  ?>" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Kembali </a>
                </div>
            </div>
        </div>

    </div>
</div>