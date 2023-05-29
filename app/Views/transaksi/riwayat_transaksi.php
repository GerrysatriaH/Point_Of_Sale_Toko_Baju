<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Riwayat Penjualan</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama Kasir</th>
                            <th>Sub Total</th>
                            <th>Diskon</th>
                            <th>total_akhir</th>
                            <th>Pembayaran Tunai</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(count(esc($transaksi)) > 0){
                            $i = 1;
                    ?>
                        <?php foreach(esc($transaksi) as $t) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= esc($t->tanggal_transaksi) ?></td>
                                <td><?= esc($t->nama_kasir) ?></td>
                                <td><?= 'Rp '.number_format(esc($t->sub_total), 0 , ',', '.') ?></td>
                                <td><?= number_format(esc($t->diskon)).' %' ?></td>
                                <td><?= 'Rp '.number_format(esc($t->total_akhir), 0 , ',', '.') ?></td>
                                <td><?= 'Rp '.number_format(esc($t->tunai), 0 , ',', '.') ?></td>
                                <td><?= 'Rp '.number_format(esc($t->kembalian), 0 , ',', '.') ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('penjualan/cetak/'.$t->id) ?>" class="btn btn-primary text-light rounded mx-1" title="Print Invoice">
                                            <i class="nav-icon fa fa-print"></i> Print Invoice
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="8" class="text-center">tidak ada data</td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>