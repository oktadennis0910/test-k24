<div class="row justify-content-center mt-5">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Member</h4>
                    <a href="<?php echo base_url("member/tambah")?>" class="btn btn-primary float-end">Tambah</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Member</th>
                            <th>No HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>No KTP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_member as $member): ?>

                        <tr>
                            <td><?php echo $member->nama ?></td>
                            <td><?php echo $member->no_hp ?></td>
                            <td><?php echo $member->tanggal_lahir ?></td>
                            <td><?php echo $member->email ?></td>
                            <td><?php echo $member->jenis_kelamin ?></td>
                            <td><?php echo $member->no_ktp ?></td>
                            <td>
                                <a href="<?php echo base_url()."member/edit/".$member->id ?>" class="btn btn-primary">Edit</a>
                                <a href="<?php echo base_url()."member/hapus/".$member->id ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                        <!-- Isi data lainnya di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>