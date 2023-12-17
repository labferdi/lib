<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<table>

<h2>Detail Liga</h2>
<dl class="row">
    <dt class="col-sm-3">Nama Liga</dt>
    <dd class="col-sm-9"><?=$league['name']?></dd>

    <dt class="col-sm-3">Tanggal Mulai</dt>
    <dd class="col-sm-9"><?=$league['date_start']?></dd>

    <dt class="col-sm-3">Tanggal Selesai</dt>
    <dd class="col-sm-9"><?=$league['date_end']?></dd>
</dl>

<h2>Tambah Tim ke Liga</h2>
<form action="" method="post">
    <?php foreach ($teams as $item): ?>
    <?php if( in_array($item['id'], $ids) ) continue; ?>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" name="team[]" type="checkbox" value="<?=$item['id']?>" id="<?=$item['id']?>">
            <label class="form-check-label" for="<?=$item['id']?>">
                <?=$item['name']?>
            </label>
        </div>
    </div>
    <?php endforeach ?>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary me-3">Simpan</button>
        <a href="<?=url_to('LeagueTeam::index', $league['id'])?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->endSection() ?>



