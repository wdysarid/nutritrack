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
                            <h5 class="card-title text-center pb-0 fs-4">Login</h5>                    
                        </div>
                        
                        <?php if ($this->session->flashdata('pesan')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('pesan') ?>
                                </div>
                        <?php } ?>

                        <form class="row g-3 needs-validation" method="post" action="<?= base_url('auth/forgot_password'); ?>">

                            <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required >
                            </div>


                            <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                            </div>

                            <div class="col-12 text-center">
                            <p class="small mb-0"><a href="<?= base_url('auth/login') ?>">Login</a></p>
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