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
                    Ubah Password
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>

                    <div class="form-group">
                        <input type="button" class="btn btn-primary btn-block" name="password" value="Submit">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>