<main id="main"><section class="breadcrumbs"><div class="container d-flex justify-content-between align-items-center"><div><h1>Pengelolaan konten</h1><p class="mb-0">Masuk sebagai <?= esc(session('admin_email')) ?></p></div><a href="<?= base_url('admin/logout') ?>">Keluar</a></div></section>
<section><div class="container"><div class="row">
    <?php foreach ($counts as $type => $count): ?>
        <div class="col-sm-6 col-lg-4 mb-4"><a class="site-panel d-block h-100" href="<?= base_url('admin/content/' . $type) ?>"><span class="text-muted">Kelola</span><h2><?= esc(ucfirst($type)) ?></h2><strong><?= number_format($count) ?> item</strong></a></div>
    <?php endforeach; ?>
</div></div></section></main>
