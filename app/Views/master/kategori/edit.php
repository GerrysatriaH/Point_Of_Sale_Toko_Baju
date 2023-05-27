<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/submit_changes_kategori') ?>" method="post">
            <div class="card-body">
                <input type="hidden" name="id" value="<?= isset($data['id']) ? esc($data['id']) : '' ?>">
                <div class="form-group">
                    <label for="nama">Kategori</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-tag"></i></span>
                        </div>
                        <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukan Kategori Baru" required value="<?= isset($data['kategori']) ? $data['kategori'] : '' ?>">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>