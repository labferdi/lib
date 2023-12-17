<?= $this->extend('template') ?>


<?= $this->section('style') ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?= $this->endsection() ?>


<?= $this->section('content') ?>
<table>

<h2>Tambah Liga Baru</h2>
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
        <label for="name" class="form-label">Nama Liga</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="date_start" class="form-label">Tanggal Mulai</label>
        <input type="text" class="form-control datepicker" id="date_start" name="date_start">
    </div>
    <div class="mb-3">
        <label for="date_end" class="form-label">Tanggal Selesai</label>
        <input type="text" class="form-control datepicker" id="date_end" name="date_end">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary me-3">Simpan</button>
        <a href="<?=url_to('League::index')?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

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


