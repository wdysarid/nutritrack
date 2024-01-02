<?php $this->load->view($header);?>
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

                    <form class="row g-3 needs-validation" method="post" action="<?= base_url('auth/prosesregister') ?>" novalidate>
                        <div class="col-12">
                        <label for="nama_lengkap" class="form-label ">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                        <div class="invalid-feedback">Please, enter your name!</div>
                        </div>

                        <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group has-validation">
                            <input type="text" name="username" class="form-control" id="username" required>
                            <div class="invalid-feedback">Please choose a username.</div>
                        </div>

                        <div class="col-12">
                        <label for="email" class="form-label mt-3">Email</label>
                        <input type="email" name="email" class="form-control" id="yourEmail" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div> 
                        <div class="col-12">
                          <label for="gender" class="form-label mt-3">Jenis Kelamin</label>
                          <div class="d-flex">
                            <div class="form-check me-3">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan">
                              <label class="form-check-label" for="female">Perempuan</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="jenis_kelamin" id="lakilaki" value="lakilaki">
                              <label class="form-check-label" for="male">Laki-Laki</label>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                        <label for="tgl_lahir" class="form-label mt-3">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                        </div>

                        <div class="col-12">
                        <label for="password" class="form-label mt-3">Password</label>
                        <input type="password" name="password" class="form-control" id="Password" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                        </div>

                        <div class="col-12 mt-4 mb-3">
                        <button class="btn btn-primary w-100" type="submit">Daftar Akun</button>
                        </div>

                        <div class="col-12 text-center">
                        <p class="small mb-0"><a href="<?= base_url('auth/lupaPassword') ?>">Lupa Password?</a></p>
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
    <?php $this->load->view($footer);?>