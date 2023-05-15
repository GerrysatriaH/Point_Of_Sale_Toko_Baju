<?= $this->extend('auth/templates'); ?>
<?= $this->section('content'); ?>

    <!-- Form Login -->
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-96 p-6 m-auto bg-white rounded-md shadow-md ring-2 ring-gray-800/50 lg:max-w-lg">
            <h1 class="text-3xl font-semibold text-center text-gray-700 mb-3">Login</h1>
            <!-- Alert Login -->
            <div>
                <div class="alert rounded-md <?= session()->getFlashdata('error') ? 'alert-error' : 'hidden' ?>">
                    <span class=" text-white font-semibold"><?= session()->getFlashdata('error') ?></span>
                </div>
            </div>
            <form action="/auth/auth_login" method="post">
                <div>
                    <label class="label text-base label-text">Username</label>
                    <input type="text" placeholder="Enter Username" name="username" class="w-full input input-bordered" value="<?= old('username') ?>"/>
                    <span class="label label-text-alt text-error"><?= session()->getFlashdata('not_valid')['username'] ?? ' ' ?></span>
                </div>
                <div>
                    <label class="label text-base label-text">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" class="w-full input input-bordered"/>
                    <span class="label label-text-alt text-error"><?= session()->getFlashdata('not_valid')['password'] ?? ' ' ?></span>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection(); ?>