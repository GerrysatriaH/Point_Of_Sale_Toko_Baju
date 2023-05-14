<?= $this->extend('auth/templates'); ?>
<?= $this->section('content'); ?>

    <!-- Alert Login -->
    <div class="alert <?= session()->getFlashdata('error') ? 'alert-error' : 'alert-success' ?>  shadow-lg">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('error') ?></span>
        </div>
    </div>
    
    <!-- Form Login -->
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md ring-2 ring-gray-800/50 lg:max-w-lg">
            <h1 class="text-3xl font-semibold text-center text-gray-700">Login</h1>
            <form action="/auth/process" method="post">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Username</span> <i class="fa-regular fa-bag-shopping"></i>
                    </label>
                    <input type="text" placeholder="Enter Username" name="username" class="w-full input input-bordered" />
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Enter Password" name="password" class="w-full input input-bordered" />
                </div>
                <div>
                    <button type="submit" class="btn btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>

<?= $this->endSection(); ?>