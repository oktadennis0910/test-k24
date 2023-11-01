<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Password</h4>
            </div>
            <div class="card-body">
                <?php echo form_open('password/update', 'class="form"'); ?>

                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="password_lama" class="form-label">Password Lama</label>
                        <input type="text" class="form-control" id="password_lama" name="password_lama" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_baru" class="form-label">Password Baru</label>
                        <input type="text" class="form-control" id="password_baru" name="password_baru" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>