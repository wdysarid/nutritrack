<!-- application/views/artikel/index.php -->

<div class="container">
    <h2>Daftar Artikel</h2>
    <div class="row">
        <?php foreach ($artikel_list as $artikel): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Pastikan untuk menggunakan properti yang benar -->
                    <h5 class="card-title"><?= $artikel->judul; ?></h5>
                    <!-- ... -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
