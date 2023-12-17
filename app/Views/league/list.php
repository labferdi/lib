<?= $this->extend('template') ?>


<?= $this->section('content') ?>

<table>

<h2>Daftar Liga</h2>

<a href="<?=url_to('League::add')?>" class="btn btn-primary">Tambah Liga Baru</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= $item['date_start'] ? date('d/m/Y', strtotime($item['date_start']) ) : '' ?></td>
            <td><?= $item['date_end'] ? date('d/m/Y', strtotime($item['date_end']) ) : '' ?></td>
            <td>
                <a href="<?=url_to('League::edit', $item['id'])?>" class="btn btn-secondary btn-sm me-3">Ubah</a>
                <a href="<?=url_to('LeagueTeam::index', $item['id'])?>" class="btn btn-info btn-sm">Registrasi Tim</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>