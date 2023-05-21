<!DOCTYPE html>
<html lang="en">

    <?= $this->include('layout/header') ?>
    <?= $this->renderSection('header') ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?= $this->include('component/navbar'); ?>
        <?= $this->include('component/sidebar'); ?>

        <div class="content-wrapper">

            <?= $this->include('component/breadscrums'); ?> 
            <?= $this->renderSection('content'); ?>

        </div>
        <?= $this->include('layout/footer'); ?>
    </div>
    <?= $this->include('layout/script'); ?>
</body>
</html>