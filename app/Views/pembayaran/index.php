<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<div class="container-fluid px-3">
    <form action="<?= base_url('pembayaran/addproduk') ?>" method="POST" id="form">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-3 col-form-label">Tanggal</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal" id="tanggal" readonly value="<?=date('Y-m-d')?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user" class="col-sm-3 col-form-label">Kasir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="user" id="user" readonly value="<?= session()->get('nama') ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pelanggan" class="col-sm-3 col-form-label">Pelanggan</label>
                            <div class="col-sm-9">
                                <select name="pelanggan" id="pelanggan" class="form-control">
                                    <?php foreach (esc($pelanggan) as $data): ?>
                                        <option value="<?= esc($data->id)?>"><?= esc($data->tipe);?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="barcode" class="col-sm-3 col-form-label">Kode Produk</label>
                            <div class="col-sm-7">
                                <div class="input-group">
                                    <select class="form-control select2" name="produk" id="produk" required>
                                        <option disabled selected hidden>-- Cari Produk --</option>
                                        <?php foreach(esc($produk) as $p){?>
                                            <option value="<?= esc($p->id); ?>"><?= esc($p->kode_produk).' | '. esc($p->nama_produk).' | stok: '. esc($p->stok); ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                            <div class="col-sm-7">
                                <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" placeholder="Masukan jumlah barang" required>
                            </div>
                            <div class="col-sm-4 pt-3">
                                <button type="submit" id="tambah" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- .row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline">
                <div class="p-0 table-responsive">
                    <table class="table table-bordered table-striped" id="tabel-keranjang" width="100%">
                        <colgroup>
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="15%">
                            <col width="20%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama Item</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($pembelian as $buy) : ?>
                                <tr>
                                    <td><?= $buy->kode_produk ?></td>
                                    <td><?= $buy->nama_produk ?></td>
                                    <td><?= 'Rp '.number_format($buy->harga, 0 , ',', '.') ?></td>
                                    <td><?= $buy->jumlah ?></td>
                                    <td id="total"><?= 'Rp '.number_format($buy->Total, 0 , ',', '.') ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= base_url('pembayaran/delete_pembelian/'.esc($buy->product_id)) ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded mx-1" title="Delete Data">
                                                <i class="fa fa-trash"></i> Delete Data
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
<!-- .row -->
<div class="row">
    <div class="col-md-4">      
        <form action="pembayaran/invoice" method="post">
            <div class="card card-outline">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="sub_total" class="col-sm-5 col-form-label">Sub Total</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control text-right" name="sub_total" id="sub_total" value="<?= $total ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="diskon" class="col-sm-5 col-form-label">Diskon (%)</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control text-right" name="diskon" id="diskon" value="<?= isset($pembelian[0]->discount) ? $pembelian[0]->discount : 0; ?>" min="0" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="total_akhir" class="col-sm-5 col-form-label">Total Akhir</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control text-right" name="total_akhir" id="total_akhir" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="tunai" class="col-sm-5 col-form-label">Tunai</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control text-right" name="tunai" min="0" id="tunai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kembalian" class="col-sm-5 col-form-label">Kembalian</label>
                        <div class="col-sm-7">
                            <input type="number" class="form-control text-right" name="kembalian" id="kembalian" value="0" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-outline">
                <div class="card-body">
                    <p><button class="btn btn-success" id="bayar"><i class="fas fa-paper-plane"></i> Proses Pembayaran</button></p>
                </form>
                    <a href="<?= base_url('pembayaran/emptytable') ?> "><button class="btn btn-warning" id="batal"><i class="fas fa-refresh"></i><span class="px-6">Reset</span></button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/pembayaran.js"></script>

<?= $this->endSection() ?>
