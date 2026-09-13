<main id="main" class="members">
    <section class="breadcrumbs"><div class="container"><h1><?= esc($title) ?></h1></div></section>
    <section><div class="container"><div class="row justify-content-center"><div class="col-lg-6">
        <div class="site-panel">
            <?php if ($message = session('formSuccess')): ?><div class="alert alert-success" role="status"><?= esc($message) ?></div><?php endif; ?>
            <?php if ($message = session('formError')): ?><div class="alert alert-danger" role="alert"><?= esc($message) ?></div><?php endif; ?>
            <?php foreach ((array) session('formErrors') as $error): ?><div class="alert alert-danger" role="alert"><?= esc($error) ?></div><?php endforeach; ?>
            <form method="post" action="<?= base_url($mode === 'login' ? 'user/login' : 'user/register') ?>">
                <?= csrf_field() ?>
                <?php if ($mode === 'register'): ?>
                    <div class="form-group"><label for="name">Nama lengkap</label><input class="form-control" id="name" name="name" maxlength="100" value="<?= esc(old('name')) ?>" autocomplete="name" required></div>
                <?php endif; ?>
                <div class="form-group"><label for="email">Email</label><input class="form-control" id="email" type="email" name="email" maxlength="100" value="<?= esc(old('email')) ?>" autocomplete="email" required></div>
                <div class="form-group"><label for="password">Kata sandi</label><input class="form-control" id="password" type="password" name="password" autocomplete="<?= $mode === 'login' ? 'current-password' : 'new-password' ?>" minlength="<?= $mode === 'register' ? '10' : '1' ?>" required></div>
                <?php if ($mode === 'register'): ?>
                    <div class="form-group"><label for="password_confirm">Ulangi kata sandi</label><input class="form-control" id="password_confirm" type="password" name="password_confirm" autocomplete="new-password" minlength="10" required></div>
                <?php endif; ?>
                <button class="btn btn-learn-more" type="submit"><?= $mode === 'login' ? 'Masuk' : 'Buat akun' ?></button>
            </form>
            <p class="mt-4 mb-0"><?= $mode === 'login' ? 'Belum punya akun?' : 'Sudah punya akun?' ?>
                <a href="<?= base_url($mode === 'login' ? 'user/register' : 'user/login') ?>"><?= $mode === 'login' ? 'Daftar' : 'Masuk' ?></a>
            </p>
        </div>
    </div></div></div></section>
</main>
