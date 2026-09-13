<main id="main"><section class="breadcrumbs"><div class="container"><h1>Admin</h1><p>Masuk untuk mengelola konten situs.</p></div></section>
<section><div class="container"><div class="row justify-content-center"><div class="col-lg-5"><div class="site-panel">
    <?php if ($message = session('formError')): ?><div class="alert alert-danger" role="alert"><?= esc($message) ?></div><?php endif; ?>
    <?php foreach ((array) session('formErrors') as $error): ?><div class="alert alert-danger" role="alert"><?= esc($error) ?></div><?php endforeach; ?>
    <form method="post" action="<?= base_url('admin/login') ?>"><?= csrf_field() ?>
        <div class="form-group"><label for="email">Email</label><input class="form-control" id="email" type="email" name="email" autocomplete="username" required></div>
        <div class="form-group"><label for="password">Kata sandi</label><input class="form-control" id="password" type="password" name="password" autocomplete="current-password" required></div>
        <button class="btn btn-learn-more" type="submit">Masuk</button>
    </form>
</div></div></div></div></section></main>
