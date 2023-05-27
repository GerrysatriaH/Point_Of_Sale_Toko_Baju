<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Ukuran</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('master/submit_changes_ukuran') ?>" method="POST">
                    <div class="form-group">
                        <label for="ukuran">Ukuran : </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-arrows-alt-h"></i></span>
                            </div>
                            <input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="Masukan Ukuran Baru" required>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Ukuran</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <colgroup>
                                <col width="10%">
                                <col width="40%">
                                <col width="40%">
                            </colgroup>
                            <thead class="bg-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Ukuran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count(esc($ukuran)) > 0): 
                                        $i = 1;
                                ?>
                                    <?php foreach(esc($ukuran) as $u) : ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= esc($u->ukuran) ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url('/master/update_ukuran/'.esc($u->id)) ?>" class="btn btn-warning text-light rounded mx-1" title="Edit Data">
                                                        <i class="fa fa-edit"></i> Edit Data
                                                    </a>
                                                    <a href="<?= base_url('/master/delete_ukuran/'.esc($u->id)) ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded mx-1" title="Delete Data">
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
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-md m-0 mx-auto">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>