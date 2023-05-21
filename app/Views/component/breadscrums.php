<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-1 text-semibold"><?= esc($title); ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right p-2">
                    <?php foreach ($breadcrumbs as $breadcrumb) : ?>
                        <?php if (isset($breadcrumb['url'])) : ?>
                            <li class="breadcrumb-item"><a href="<?php echo $breadcrumb['url']; ?>"><?php echo $breadcrumb['title']; ?></a></li>
                        <?php else : ?>
                            <li class="breadcrumb-item active"><?php echo $breadcrumb['title']; ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
