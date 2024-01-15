<?php $this->load->view($header); ?>
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                                </div>
                                <?php if ($this->session->flashdata('pesan')) : ?>
                                    <div class="alert alert-<?= $this->session->flashdata('color'); ?> alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('pesan'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <form class="row g-3 needs-validation" method="post" action="<?= base_url('auth/prosesregister') ?>" novalidate>
                                    <div class="col-12">
                                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="nama_lengkap" class="form-control <?= (form_error('nama_lengkap')) ? 'is-invalid' : ''; ?>" id="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" required>
                                        <div class="invalid-feedback"><?php echo form_error('nama_lengkap'); ?></div>
                                    </div>

                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" id="username" value="<?= set_value('username'); ?>" required>
                                            <div class="invalid-feedback"><?= form_error('username'); ?></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" value="<?= set_value('email'); ?>" required>
                                      <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>                                    
                                      </div>

                                    <div class="col-12"> 
                                        <label for="gender" class="form-label mt-3 mb-3">Jenis Kelamin</label>
                                        <div class="d-flex">
                                            <div class="form-check me-5">
                                                <input type="radio" name="jenis_kelamin" class="form-check-input <?= (form_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="perempuan" value="perempuan" required>
                                                <label class="form-check-label" for="female">Perempuan</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="jenis_kelamin" class="form-check-input <?= (form_error('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="laki-laki" value="laki-laki" required>
                                                <label class="form-check-label" for="male">Laki-Laki</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback"><?= form_error('jenis_kelamin'); ?></div>
                                    </div>

                                    <div class="col-12">
                                        <label for="tgl_lahir" class="form-label mt-3">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" class="form-control <?= (form_error('tgl_lahir')) ? 'is-invalid' : ''; ?>" id="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" required>
                                        <div class="invalid-feedback"><?= form_error('tgl_lahir'); ?></div>
                                    </div>

                                    <div class="col-12">
                                        <label for="berat_badan" class="form-label mt-3">Berat Badan (cm) </label>
                                        <input type="text" name="berat_badan" class="form-control <?= (form_error('berat_badan')) ? 'is-invalid' : ''; ?>" id="berat_badan" value="<?= set_value('berat_badan'); ?>" required>
                                        <div class="invalid-feedback"><?= form_error('berat_badan'); ?></div>
                                    </div>

                                    <div class="col-12">
                                        <label for="tinggi_badan" class="form-label mt-3">Tinggi Badan</label>
                                        <input type="text" name="tinggi_badan" class="form-control <?= (form_error('tinggi_badan')) ? 'is-invalid' : ''; ?>" id="tinggi_badan" value="<?= set_value('tinggi_badan'); ?>" required>
                                        <div class="invalid-feedback"><?= form_error('tinggi_badan'); ?></div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" value="<?= set_value('password'); ?>" required>
                                        <div class="invalid-feedback"><?= form_error('password'); ?></div>
                                    </div>

                                    <div class="col-12 mt-4 mb-3">
                                        <button class="btn btn-primary w-100" type="submit">Daftar Akun</button>
                                    </div>

                                    <div class="col-12 text-center">
                                        <p class="small mb-0"><a href="<?= base_url('auth/fotgot_password') ?>">Lupa Password?</a></p>
                                    </div>

                                    <div class="col-12 text-center">
                                        <p class="small mb-0">Sudah punya akun? <a href="<?= base_url('auth/login'); ?>">Login</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main><!-- End #main -->
<?php $this->load->view($footer); ?>
