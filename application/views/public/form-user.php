<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4>Profile</h4>
            </div>
            <div class="card-body">
                <?php echo form_open_multipart('profile/update_profile', 'class="form"'); ?>

                    <?php if ($this->session->flashdata('errors')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('errors');?>
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Member</label>
                        <input type="text" class="form-control" id="nama" name="nama_member" value="<?php echo $nama; ?>" value required>
                    </div>

                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No HP</label>
                        <input type="tel" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir Member</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Member (unik)</label>
                        <input type="email" class="form-control" id="email" name="email_member" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin"  required>
                            <option value="L" <?php if ($jenis_kelamin ==="L"): ?> selected <?php endif; ?>>Pria</option>
                            <option value="W" <?php if ($jenis_kelamin ==="W"): ?> selected <?php endif; ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ktp" class="form-label">No KTP</label>
                        <input type="text" class="form-control" id="ktp" name="ktp" value="<?php echo $no_ktp; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                        <img src="<?php echo $foto; ?>" alt="Deskripsi Gambar" class="img rounded-1" style="width: 256px; height: 256px;">
                    </div>

                    

                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>