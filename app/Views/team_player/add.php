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

<h2>Tambah Pemain</h2>
<form action="" method="post">
    <div class="mb-3">
        <label for="position" class="form-label">Nama Pemain</label>
        <select class="form-select" aria-label="Pilih pemain" name="player_id">
            <?php foreach($players as $item) : ?>
            <option value="<?=$item['id']?>"><?=$item['name']?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Posisi</label>
        <select class="form-select" aria-label="Pilih posisi" name="position">
            <option value="goalkeeper">GoalKeeper</option>
            <option value="defender">Defender</option>
            <option value="midfielder">Midfielder</option>
            <option value="forward">Forward</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="number" class="form-label">Nomor Punggung</label>
        <input type="number" min="1" max="99" class="form-control" id="number" name="number">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary me-3">Simpan</button>
        <a href="<?=url_to('TeamPlayer::index', $detail['id'])?>" class="btn btn-secondary">Batal</a>
    </div>
</form>    

<?= $this->endSection() ?>

