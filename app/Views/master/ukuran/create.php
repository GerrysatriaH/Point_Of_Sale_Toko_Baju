<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_ukuran') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Ukuran</label>
                    <input type="text" class="form-control" name="ukuran" id="nama" placeholder="Masukkan Ukuran Baru" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>