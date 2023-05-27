<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('/supplier/submit_changes_supplier') ?>" method="post">
            <div class="card-body">
                <input type="hidden" name="id" value="<?= isset($data['id']) ? esc($data['id']) : '' ?>">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" required value="<?= isset($data['nama']) ? esc($data['nama']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="nama">No.Telp/WA</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Telepon" required value="<?= isset($data['no_telp']) ? esc($data['no_telp']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" required value="<?= isset($data['alamat']) ? esc($data['alamat']) : '' ?>">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>