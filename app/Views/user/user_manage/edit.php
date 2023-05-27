<?= $this->extend('layout/templates') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="card">
        <form action="<?= base_url('user/save_changes_user/'.esc($data['id'])) ?>" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required value="<?= isset($data['username']) ? esc($data['username']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required value="<?= isset($data['email']) ? esc($data['email']) : '' ?>">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option disabled selected hidden>Pilih Status</option>
                        <option <?= isset($data['status']) && $data['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                        <option <?= isset($data['status']) && $data['status'] == 'non-aktif' ? 'selected' : '' ?>>Non-Aktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role" id="role">
                        <option disabled selected hidden>Pilih Role</option>
                        <?php foreach(esc($role) as $key => $value){?>
                            <option value="<?= esc($value->id); ?>" <?= isset($data['role_id']) && $data['role_id'] == esc($value->id) ? 'selected' : ''; ?>><?= esc($value->role); ?></option>
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