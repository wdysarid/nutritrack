<?php $this->load->view($header);?>
<main>
        <div class="container" >
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
            <div class="row justify-content-center" >
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3" >
                    <div class="card-body" >

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>                    
                    </div>
                    
                    <?php if ($this->session->flashdata('pesan')) { ?>
                        <div class="alert alert-succes" role="alert">
                            <?= $this->session->flashdata('pesan') ?>
                            </div>
                    <?php } ?>

                    <form class="row g-3 needs-validation" method="post" action="<?= base_url('auth/reset_password  . $token'); ?>">

                        <div class="col-12">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" id="new_password" required >
                        </div>

                        <div class="col-12">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" id="confirm_password" required >
                        </div>

                        <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                        </div>

                        <div class="col-12 text-center">
                        <p class="small mb-0"><a href="<?= base_url('auth/login') ?>">Kembali Login</a></p>
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