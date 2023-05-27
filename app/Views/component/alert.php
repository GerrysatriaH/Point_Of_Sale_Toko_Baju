<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (session()->has('success')) : ?>
            Swal.fire({
                icon: 'success',
                title: '<?= session('success'); ?>'
            })
        <?php elseif (session()->has('error')) : ?>
            Swal.fire({
                icon: 'error',
                title: '<?= session('error'); ?>'
            })
        <?php endif; ?>

    <?php session()->remove('success'); ?>
    <?php session()->remove('error'); ?>
});
</script>