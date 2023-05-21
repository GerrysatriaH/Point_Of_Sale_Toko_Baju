<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('/master/create_ukuran') ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                        <table class="table table-bordered table-striped">
                            <colgroup>
                                <col width="10%">
                                <col width="40%">
                                <col width="40%">
                            </colgroup>
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Ukuran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($ukuran) > 0): 
                                        $i = 1;
                                ?>
                                    <?php foreach($ukuran as $u) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $u->ukuran ?></td>
                                            <td class="align-middle text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url('/master/update_ukuran/'.$u->id) ?>" class="btn btn-warning text-light rounded mx-1" title="Edit Data">
                                                        <i class="fa fa-edit"></i> Edit Data
                                                    </a>
                                                    <a href="<?= base_url('/master/delete_ukuran/'.$u->id) ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded mx-1" title="Delete Data">
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