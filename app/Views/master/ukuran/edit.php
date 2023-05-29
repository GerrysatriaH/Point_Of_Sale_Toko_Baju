<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('master/update_ukuran/'.$data['id']) ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Ukuran :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-arrows-alt-h"></i></span>
                        </div>
                        <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukan Ukuran Baru" required value="<?= isset($data['ukuran']) ? $data['ukuran'] : '' ?>">
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