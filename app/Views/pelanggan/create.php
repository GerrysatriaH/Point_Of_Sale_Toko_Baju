<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('/pelanggan/submit_changes_pelanggan') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="tipe">Tipe : </label>
                    <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Masukkan Nama Tipe Pelanggan" required>
                    <span class="label label-text-alt text-error"><?= session()->getFlashdata('not_valid')['tipe'] ?? ' ' ?></span>
                </div>
                <div class="form-group">
                    <label for="nama">Penawaran Diskon : </label>
                    <input type="text" step="0.1" min="0" class="form-control" name="discount" id="discount" placeholder="Masukkan Penawaran Discount" required>
                    <span class="label label-text-alt text-error"><?= session()->getFlashdata('not_valid')['discount'] ?? ' ' ?></span>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>