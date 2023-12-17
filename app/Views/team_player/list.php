<?= $this->extend('template') ?>


<?= $this->section('content') ?>
<table>

<h2>Detail Tim</h2>

<dl class="row">
    <dt class="col-sm-3">Kode Tim</dt>
    <dd class="col-sm-9"><?=$detail['code']?></dd>

    <dt class="col-sm-3">Nama Tim</dt>
    <dd class="col-sm-9"><?=$detail['name']?></dd>
</dl>


<h2>Daftar Pemain</h2>
<?php if( ! $is_max ) : ?>
<a href="<?=url_to('TeamPlayer::add', $detail['id'] )?>" class="btn btn-primary me-3">Tambah Pemain</a>
<?php endif ?>
<a href="<?=url_to('Team::index')?>" class="btn btn-secondary">Batal</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Posisi</th>
            <th>Nomor Punggung</th>
            <th>Kebangsaan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($players as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td><?= $item['position'] ?></td>
            <td><?= $item['number'] ?></td>
            <td><?= $item['nationality'] ?></td>
            <td><a href="<?=url_to('TeamPlayer::delete', $item['team_id'], $item['id'])?>" class="btn btn-secondary btn-sm">Hapus</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>


