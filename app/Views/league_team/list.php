<?= $this->extend('template') ?>


<?= $this->section('style') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?= $this->endsection() ?>


<?= $this->section('content') ?>
<table>

<h2>Detail Liga</h2>

<dl class="row">
    <dt class="col-sm-3">Nama Liga</dt>
    <dd class="col-sm-9"><?=$detail['name']?></dd>

    <dt class="col-sm-3">Tanggal Mulai</dt>
    <dd class="col-sm-9"><?=$detail['date_start']?></dd>

    <dt class="col-sm-3">Tanggal Selesai</dt>
    <dd class="col-sm-9"><?=$detail['date_end']?></dd>
</dl>


<h2>Daftar Tim</h2>
<a href="<?=url_to('LeagueTeam::add', $detail['id'] )?>" class="btn btn-primary me-3">Tambah Tim</a>
<a href="<?=url_to('League::index')?>" class="btn btn-secondary">Batal</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($teams as $item): ?>
        <tr>
            <td><?= $item['code'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><a href="<?=url_to('LeagueTeam::delete', $item['league_id'], $item['id'])?>" class="btn btn-secondary btn-sm">Hapus</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?= $this->endSection() ?>



<?= $this->section('script') ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
<script>
    $( ".datepicker" ).datepicker({
        dateFormat: "dd/mm/yy",
        changeMonth: true,
        changeYear: true,
    });
</script>
<?= $this->endSection() ?>


