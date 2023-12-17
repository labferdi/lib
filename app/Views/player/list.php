<?= $this->extend('template') ?>


<?= $this->section('content') ?>

<table>

<h2>Daftar Pemain</h2>

<a href="<?=url_to('Player::add')?>" class="btn btn-primary">Tambah Pemain Baru</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Kebangsaan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= $item['date_birth'] ? date('d/m/Y', strtotime($item['date_birth']) ) : '' ?></td>
            <td><?= $item['nationality'] ?></td>
            <td><a href="<?=url_to('Player::edit', $item['id'])?>" class="btn btn-secondary btn-sm">Ubah</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>