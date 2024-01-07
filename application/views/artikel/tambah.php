<!-- application/views/artikel/tambah.php -->

<div class="container">
    <h2>Formulir Tambah Artikel</h2>
    <form action="<?= base_url('artikel/tambah'); ?>" method="post">
        <!-- Tambahkan input fields sesuai dengan struktur tabel tbartikel -->
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea class="form-control" id="isi" name="isi" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Artikel</button>
    </form>
</div>
