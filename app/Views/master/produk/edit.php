<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_produk') ?>" method="post">
            <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Kode Produk : </label>
                    <input  type="text" class="form-control" name="kode_produk" id="kode_produk" 
                            placeholder="Masukan Kode Produk" required value="<?= isset($data['kode_produk']) ? $data['kode_produk'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Produk : </label>
                    <input  type="text" class="form-control" name="nama_produk" id="nama_produk" 
                            placeholder="Masukan Nama Produk" required value="<?= isset($data['nama_produk']) ? $data['nama_produk'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori:</label>
                    <select class="form-control select2" name="kategori" id="kategori">
                        <option disabled selected hidden>Pilih Kategori</option>
                        <?php foreach($kategori as $key => $value){?>
                            <option value="<?= $value->id; ?>" <?= isset($data['id_kategori']) && $data['id_kategori'] == $value->id ? 'selected' : ''; ?>><?= $value->kategori; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Ukuran : </label>
                    <select class="form-control select2" name="ukuran" id="ukuran">
                        <option disabled selected hidden>Pilih Ukuran</option>
                        <?php foreach($ukuran as $key => $value){?>
                            <option value="<?= $value->id; ?>" <?= isset($data['id_ukuran']) && $data['id_ukuran'] == $value->id ? 'selected' : ''; ?>><?= $value->ukuran; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Supplier : </label>
                    <select class="form-control select2" name="supplier" id="supplier">
                        <option disabled selected hidden>Pilih Supplier</option>
                        <?php foreach($supplier as $key => $value){?>
                            <option value="<?= $value->id; ?>" <?= isset($data['id_supplier']) && $data['id_supplier'] == $value->id ? 'selected' : ''; ?>><?= $value->nama; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga Produk : </label>
                    <input  type="number" class="form-control" name="harga" id="harga" 
                            placeholder="Masukan Harga Produk" required value="<?= isset($data['harga']) ? $data['harga'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="stok">Stok Produk : </label>
                    <input  type="number" class="form-control" name="stok" id="stok" 
                            placeholder="Masukan Stok Produk" required value="<?= isset($data['stok']) ? $data['stok'] : '' ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>