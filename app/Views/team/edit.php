<?= $this->extend('template') ?>


<?= $this->section('content') ?>
<table>

<h2>Ubah Tim</h2>
<?php if (! empty($errors)): ?>
    <div class="alert alert-warning" role="alert">
        <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form method="post">
    <div class="mb-3">
        <label for="code" class="form-label">Kode Tim</label>
        <input type="hidden" name="id" value="<?=$detail['id']?>">
        <input type="text" class="form-control" id="code" name="code" value="<?=$detail['code']?>">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Tim</label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$detail['name']?>">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary me-3">Simpan</button>
        <a href="<?=url_to('Team::index')?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<?= $this->endSection() ?>


