<!DOCTYPE html>
<html lang="en">

    <?= $this->include('layout/header'); ?>
    <?= $this->renderSection('header') ?>
    
    <body>
        
        <?= $this->renderSection('content') ?>

        <script src="<?= base_url('js/app.min.js') ?>"></script>
        <script src="<?= base_url('assets/fontawesome/js/all.min.js') ?>"></script>
    </body>
</html>