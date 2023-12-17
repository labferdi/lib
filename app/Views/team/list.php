<?= $this->extend('template') ?>


<?= $this->section('content') ?>

<table>

<h2>Daftar Tim</h2>

<a href="<?=url_to('Team::add')?>" class="btn btn-primary">Tambah Tim Baru</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['code'] ?></td>
            <td><?= $item['name'] ?></td>
            <td>
                <a href="<?=url_to('Team::edit', $item['id'])?>" class="btn btn-secondary btn-sm">Ubah</a>
                <a href="<?=url_to('TeamPlayer::index', $item['id'])?>" class="btn btn-info btn-sm">Registrasi Pemain</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>