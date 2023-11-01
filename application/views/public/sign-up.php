<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('regis/process', 'class="form"'); ?>

                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Member</label>
                        <input type="text" class="form-control" id="nama" name="nama_member" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir Member</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Member (unik)</label>
                        <input type="email" class="form-control" id="email" name="email_member" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ktp" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="ktp" name="ktp" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary">Daftar</button>
                    <p>Sudah punya akun? <a href="<?php echo base_url("login") ?>">Lewat sini</a></p>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>