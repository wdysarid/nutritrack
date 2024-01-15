<?php $this->load->view($header);?>
<main>

    <div class="container">
        <h2>Forgot Password</h2>

        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php echo $this->session->flashdata('pesan'); ?>

        <?php echo form_open('auth/forgot_password'); ?>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>

            <button type="submit" class="btn btn-primary">Reset Password</button>

        <?php echo form_close(); ?>
    </div>

    </main><!-- End #main -->
    <?php $this->load->view($footer);?>