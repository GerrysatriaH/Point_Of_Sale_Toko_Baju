<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_produk') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Kode Produk : </label>
                    <input type="text" class="form-control" name="kode_produk" id="kode_produk" placeholder="Masukan Kode Produk" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk : </label>
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukan Nama Produk" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;">
                        <option disabled selected hidden>Pilih Kategori</option>
                        <?php foreach(esc($kategori) as $k){?>
                            <option value="<?= esc($k->id); ?>"><?= esc($k->kategori); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ukuran">Ukuran : </label>
                    <select class="form-control select2" name="ukuran" id="ukuran" style="width: 100%;">
                        <option disabled selected hidden>Pilih Ukuran</option>
                        <?php foreach(esc($ukuran) as $u){?>
                            <option value="<?= esc($u->id); ?>"><?= esc($u->ukuran); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="supplier">Supplier : </label>
                    <select class="form-control select2" name="supplier" id="supplier" style="width: 100%;">
                        <option disabled selected hidden>Pilih Supplier</option>
                        <?php foreach(esc($supplier) as $s){?>
                            <option value="<?= esc($s->id); ?>"><?= esc($s->nama); ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Produk : </label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukan Harga Produk" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok Produk : </label>
                    <input type="number" class="form-control" name="stok" id="stok" placeholder="Masukan Stok Produk" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>