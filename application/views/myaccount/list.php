<h1 class="cat-judul text-center"><?php echo $title ?></h1>

<div class="container">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>
    <div class="row">
        <div class="col-md-3">
            <?php include "sidebar.php"; ?>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    Detail Akun
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="alert alert-success">
                                <h3><?php echo $user->nama; ?></h3>
                                <span class="text-muted"><?php echo $user->email; ?></span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="" value="<?php echo $user->nama; ?>">
                            </div>
                            <div class="form-group">
                                <label>No. Hp</label>
                                <input class="form-control" name="" value="<?php echo $user->telp; ?>">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>