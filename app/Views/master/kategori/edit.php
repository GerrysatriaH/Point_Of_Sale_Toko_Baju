<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_kategori') ?>" method="post">
            <div class="card-body">
                <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : '' ?>">
                <div class="form-group">
                    <label for="nama">Kategori</label>
                    <input type="text" class="form-control" name="kategori" id="nama" value="<?= isset($data['kategori']) ? $data['kategori'] : '' ?>" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>