<!DOCTYPE html>
<html lang="en">

    <?= $this->include('layout/header') ?>
    <?= $this->renderSection('header') ?>

<body>
    <div class="mx-auto login-page">
        <?= $this->renderSection('auth') ?>
    </div>

    <?= $this->include('layout/script') ?>

</body>
</html>