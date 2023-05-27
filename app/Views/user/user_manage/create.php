<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('user/submit_changes_user') ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email : </label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input type="password" class="form-control" name="nama" id="nama" placeholder="Masukan Password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select class="form-control" name="role" id="role">
                        <option disabled selected hidden>Pilih Role</option>
                        <?php foreach(esc($role) as $r){?>
                            <option value="<?= esc($r->id); ?>"><?= esc($r->role); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>