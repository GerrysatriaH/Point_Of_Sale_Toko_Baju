<!DOCTYPE html>
<html lang="en">

    <?= $this->include('layout/header'); ?>
    <?= $this->renderSection('header') ?>
    
    <body class="h-screen bg-gray-100">

        <!-- Main content -->
        <div class="p-6">
            <?= $this->renderSection('content'); ?>
        </div>

        <script src="<?= base_url('js/app.min.js') ?>"></script>
        <script src="<?= base_url('assets/fontawesome/js/all.min.js') ?>"></script>
        
    </body>
</html>