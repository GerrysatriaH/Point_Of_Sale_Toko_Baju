<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<?= $this->include('component/alert') ?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Produk</h3>
            </div>
            <div class="card-body">
                <a href="<?= base_url('master/create_produk') ?>" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php   if(count(esc($produk)) > 0): 
                                $i = 1;
                        ?>
                            <?php foreach(esc($produk) as $pr) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= esc($pr->kode_produk) ?></td>
                                    <td><?= esc($pr->nama_produk) ?></td>
                                    <td><?= esc($pr->kategori) ?></td>
                                    <td><?= 'Rp '.number_format(esc($pr->harga), 0 , ',', '.') ?></td>
                                    <td><?= esc($pr->stok) ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= base_url('master/update_produk/'.esc($pr->id)) ?>" class="btn btn-warning text-light rounded mx-1" title="Edit Data">
                                                <i class="fa fa-edit"></i> Edit Data
                                            </a>
                                            <a href="<?= base_url('master/view_produk'.esc($pr->id)) ?>" class="btn btn-primary text-light rounded mx-1" title="View Data"> 
                                                View Data
                                            </a>
                                            <a href="<?= base_url('master/delete_produk/'.esc($pr->id)) ?>" onclick="if(confirm('Are you sure to delete this data?') === false) event.preventDefault()" class="btn btn-danger rounded mx-1" title="Delete Data">
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