<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Kategori</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master/create_kategori') ?>" method="POST">
                    <div class="form-group">
                        <label for="kategori">Kategori : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                            </div>
                            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukan Kategori Baru" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus"></i> Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Kategori</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(count(esc($kategori)) > 0): 
                            $i = 1;
                    ?>
                        <?php foreach(esc($kategori) as $k) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= esc($k->kategori) ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= base_url('master/edit_kategori/'.esc($k->id)) ?>" class="btn btn-warning text-light rounded mx-1" title="Edit Data">
                                            <i class="fa fa-edit"></i> Edit Data
                                        </a>
                                        <a href="<?= base_url('master/delete_kategori/'.esc($k->id)) ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded mx-1" title="Delete Data">
                                            <i class="fa fa-trash"></i> Delete Data
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>