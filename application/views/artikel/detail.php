<!-- application/views/artikel/detail.php -->

<div class="container">
    <h2><?= $artikel->judul; ?></h2>
    <p><?= $artikel->isi; ?></p>
    <a href="<?= base_url('artikel'); ?>" class="btn btn-secondary">Kembali ke Daftar Artikel</a>
</div>
