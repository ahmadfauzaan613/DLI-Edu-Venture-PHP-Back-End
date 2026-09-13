<main id="main"><section class="breadcrumbs"><div class="container d-flex justify-content-between align-items-center"><div><h1>Kelola <?= esc(ucfirst($type)) ?></h1><a href="<?= base_url('admin/dashboard') ?>">← Dashboard</a></div><a class="btn btn-learn-more" href="<?= base_url('admin/content/' . $type . '/new') ?>">Tambah</a></div></section>
<section><div class="container"><div class="site-panel">
    <?php if ($message = session('adminMessage')): ?><div class="alert alert-success" role="status"><?= esc($message) ?></div><?php endif; ?>
    <div class="table-responsive"><table class="table"><thead><tr><th>Judul</th><th>Terakhir diubah</th><th>Aksi</th></tr></thead><tbody>
        <?php foreach ($rows as $row): ?><tr><td><?= esc($row->{$definition['title']}) ?></td><td><?= esc($row->modified ?? $row->created ?? '—') ?></td><td>
            <a class="btn btn-sm btn-outline-primary" href="<?= base_url('admin/content/' . $type . '/' . $row->{$definition['id']} . '/edit') ?>">Edit</a>
            <form class="d-inline" method="post" action="<?= base_url('admin/content/' . $type . '/' . $row->{$definition['id']} . '/delete') ?>" onsubmit="return confirm('Hapus konten ini?')"><?= csrf_field() ?><button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button></form>
        </td></tr><?php endforeach; ?>
        <?php if ($rows === []): ?><tr><td colspan="3" class="text-muted">Belum ada konten.</td></tr><?php endif; ?>
    </tbody></table></div>
</div></div></section></main>
