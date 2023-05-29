<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3><?= $produk ?></h3>
                        <p>Jumlah Produk</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-cube"></i>
                    </div>
                    <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        <a href="<?= base_url('master/produk') ?>" class="small-box-footer">Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3><?= $supplier ?></h3>
                        <p>Jumlah Supplier</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        <a href="<?= base_url('supplier') ?>" class="small-box-footer">Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3><?= $pelanggan ?></h3>
                        <p>Tipe Pelanggan</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <?php if(session()->get('role_id') == 1 || session()->get('role_id') == 2) { ?>
                        <a href="<?= base_url('pelanggan') ?>" class="small-box-footer">Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?= $pengguna ?></h3>
                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <?php if(session()->get('role_id') == 1) { ?>
                        <a href="<?= base_url('user') ?>" class="small-box-footer">Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>#1</h3>
                        <p>Transaksi Pembayaran</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <a href="<?= base_url('pembayaran') ?>" class="small-box-footer">Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>#2</h3>
                        <p>Riwayat Pembayaran</p>
                    </div>
                    <div class="icon">
                    <i class="fas fa-receipt"></i>
                    </div>
                    <a href="<?= base_url('penjualan/riwayat') ?>" class="small-box-footer">Selengkapnya... <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>