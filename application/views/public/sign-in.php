<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <?php echo form_open('login/check', 'class="form"'); ?>

                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Login</button>

                    <p>Belum punya akun? <a href="<?php echo base_url("regis") ?>">Daftar sekarang</a></p>

                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>