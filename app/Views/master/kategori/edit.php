<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/update_kategori/'.$data['id']) ?>" method="post">
            <div class="card-body">
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