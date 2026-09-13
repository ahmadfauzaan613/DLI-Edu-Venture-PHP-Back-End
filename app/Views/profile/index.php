<main id="main"><section class="breadcrumbs"><div class="container"><h1>Profil anggota</h1><p class="text-muted">Perbarui informasi yang tampil pada akun Anda.</p></div></section>
<section><div class="container"><div class="row justify-content-center"><div class="col-lg-8"><div class="site-panel">
    <?php if ($message = session('profileSuccess')): ?><div class="alert alert-success" role="status"><?= esc($message) ?></div><?php endif; ?>
    <?php foreach ((array) session('formErrors') as $error): ?><div class="alert alert-danger" role="alert"><?= esc($error) ?></div><?php endforeach; ?>
    <form method="post" action="<?= base_url('profile') ?>"><?= csrf_field() ?>
        <div class="form-group"><label for="name">Nama</label><input class="form-control" id="name" name="name" maxlength="100" value="<?= old('name', $user['name']) ?>" required></div>
        <div class="form-group"><label for="email">Email</label><input class="form-control" id="email" value="<?= esc($user['email']) ?>" disabled></div>
        <div class="form-group"><label for="phone">Telepon</label><input class="form-control" id="phone" name="phone" maxlength="30" value="<?= old('phone', $user['phone'] ?? '') ?>" autocomplete="tel"></div>
        <div class="form-group"><label for="address">Alamat</label><textarea class="form-control" id="address" name="address" rows="2"><?= old('address', $user['address'] ?? '') ?></textarea></div>
        <div class="form-group"><label for="bio">Tentang Anda</label><textarea class="form-control" id="bio" name="bio" rows="3"><?= old('bio', $user['bio'] ?? '') ?></textarea></div>
        <button class="btn btn-learn-more" type="submit">Simpan profil</button>
    </form>
</div></div></div></div></section></main>
