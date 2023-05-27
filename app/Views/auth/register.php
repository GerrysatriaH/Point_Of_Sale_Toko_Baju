<?= $this->extend('auth/templates') ?>
<?= $this->section('auth') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center" style="font-weight: bold;">REGISTER</h4>
                    <hr>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr />
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url(); ?>/register/process">
                        <?= csrf_field(); ?>
                        <div class="form-group my-4">
                            <label for="name">Username</label>
                            <input type="text" name="name" class="form-control" placeholder="Masukan"required>
                        </div>
                        <div class="form-group my-4">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukan"required>
                        </div>
                        <div class="form-group my-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan"required>
                        </div>
                        <div class="form-group my-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="text-center mt-2">
                Sudah punya akun? <a href="<?= base_url('auth/login'); ?>">Silakan login.</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>