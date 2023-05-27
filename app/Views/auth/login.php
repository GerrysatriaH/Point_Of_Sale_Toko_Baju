<?= $this->extend('auth/templates') ?>
<?= $this->section('auth') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center" style="font-weight: bold;">LOGIN</h4>
                    <hr>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('auth/auth_login'); ?>" method="POST" id="create-form">
                        <div class="form-group my-4">
                            <label for="Username">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group my-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group my-4">
                            <button class="btn btn-primary bg-gradient">Login</button>
                        </div>
                    </form>

                </div>

            </div>
            <div class="text-center mt-2">
                Belum punya akun? <a href="<?= base_url('auth/register'); ?>">Silakan daftar.</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>