<!DOCTYPE html>
<html lang="en">

    <?= $this->include('layout/header') ?>
    <?= $this->renderSection('header') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?= $this->renderSection('auth'); ?>

    <?= $this->include('layout/script'); ?>
</body>
</html>