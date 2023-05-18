<!DOCTYPE html>
<html lang="en">

    <?= $this->include('layout/header') ?>
    <?= $this->renderSection('header') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

    <?= $this->include('component/navbar'); ?>
    <?= $this->include('component/sidebar'); ?>

    <div class="content-wrapper">

        <?= $this->include('component/breadscrums'); ?> 

        <?= $this->renderSection('content'); ?>
        
        <?= $this->include('layout/footer'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>

    <?= $this->include('layout/script'); ?>
    
</body>
</html>