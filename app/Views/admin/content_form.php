<main id="main"><section class="breadcrumbs"><div class="container"><h1><?= $row === null ? 'Tambah' : 'Edit' ?> <?= esc(ucfirst($type)) ?></h1><a href="<?= base_url('admin/content/' . $type) ?>">← Kembali ke daftar</a></div></section>
<section><div class="container"><div class="row justify-content-center"><div class="col-lg-9"><div class="site-panel">
    <?php if ($message = session('formError')): ?><div class="alert alert-danger" role="alert"><?= esc($message) ?></div><?php endif; ?>
    <?php foreach ((array) session('formErrors') as $error): ?><div class="alert alert-danger" role="alert"><?= esc($error) ?></div><?php endforeach; ?>
    <?php $action = $row === null ? base_url('admin/content/' . $type . '/create') : base_url('admin/content/' . $type . '/' . $row->{$definition['id']} . '/update'); ?>
    <form method="post" enctype="multipart/form-data" action="<?= $action ?>"><?= csrf_field() ?>
        <?php foreach ($fields as $field => $label): $value = old($field, $row->{$field} ?? ''); $multiline = in_array($field, ['isi', 'spesifikasi', 'keunggulan', 'pencapaian', 'kategori', 'teknologi', 'address', 'bio'], true); ?>
            <div class="form-group"><label for="<?= esc($field) ?>"><?= esc($label) ?></label>
                <?php if ($multiline): ?><textarea class="form-control" id="<?= esc($field) ?>" name="<?= esc($field) ?>" rows="<?= $field === 'isi' ? '8' : '3' ?>"><?= esc($value) ?></textarea>
                <?php else: ?><input class="form-control" id="<?= esc($field) ?>" name="<?= esc($field) ?>" type="<?= $field === 'jadwal_tgl' ? 'date' : ($field === 'jadwal_time' ? 'time' : 'text') ?>" value="<?= esc($value) ?>" <?= str_starts_with($field, 'judul_') ? 'required maxlength="100"' : '' ?>><?php endif; ?>
            </div>
        <?php endforeach; ?>
        <div class="form-group"><label for="image">Unggah gambar baru (opsional, JPG/PNG/GIF/WebP · maks 5 MB)</label><input class="form-control-file" id="image" type="file" name="image" accept="image/jpeg,image/png,image/gif,image/webp"></div>
        <button class="btn btn-learn-more" type="submit">Simpan</button>
    </form>
</div></div></div></div></section></main>
