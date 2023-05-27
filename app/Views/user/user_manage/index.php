<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Data Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('user/create_user') ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                        <table class="table table-bordered table-striped">
                            <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="20%">
                                <col width="15%">
                                <col width="15%">
                                <col width="20%">
                            </colgroup>
                            <thead class="bg-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count(esc($users)) > 0): 
                                        $i = 1;
                                ?>
                                    <?php foreach(esc($users) as $us): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= esc($us->username) ?></td>
                                            <td><?= esc($us->email) ?></td>
                                            <td><?= esc($us->status) ?></td>
                                            <td><?= esc($us->role) ?></td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= base_url('user/update_user/'.esc($us->id)) ?>" class="btn btn-warning text-light rounded mx-1" title="Edit Data">
                                                        <i class="fa fa-edit"></i> Edit Data
                                                    </a>
                                                    <a href="<?= base_url('user/delete_user/'.esc($us->id)) ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded mx-1" title="Delete Data">
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
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>