<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contoh Halaman Website dengan Bootstrap 5</title>
</head>
<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <a class="navbar-brand" href="#">Website Saya</a>
            
            <?php if ($this->session->userdata('role') === "0" || $this->session->userdata('role') === "1"): ?>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <?php if ($this->session->userdata('role') === "1"): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url('member/index/'); ?>">Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('member/index/1'); ?>">Admin</a>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('profile'); ?>">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('password'); ?>">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()."logout" ?>">Logout</a>
                    </li>
                </ul>
            </div>
            

            <?php endif; ?>
            </div>
        </nav>

        <div class="container">
            <?php echo $view ?>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>