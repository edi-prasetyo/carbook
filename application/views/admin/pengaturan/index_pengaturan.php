<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <?php echo $email_register->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_register->id); ?>" class="btn btn-info btn-sm">Update Email Register</a>
            </div>
            <div class="card-body">
                <?php echo $email_register->name; ?><br>
                <?php echo $email_register->protocol; ?><br>
                <?php echo $email_register->smtp_host; ?><br>
                <?php echo $email_register->smtp_port; ?><br>
                <?php echo $email_register->smtp_user; ?><br>
                <?php echo $email_register->smtp_pass; ?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                <?php echo $email_order->name; ?>
                <a href="<?php echo base_url('admin/pengaturan/update/' . $email_order->id); ?>" class="btn btn-info btn-sm">Update Email Order</a>
            </div>
            <div class="card-body">
                <?php echo $email_order->name; ?><br>
                <?php echo $email_order->protocol; ?><br>
                <?php echo $email_order->smtp_host; ?><br>
                <?php echo $email_order->smtp_port; ?><br>
                <?php echo $email_order->smtp_user; ?><br>
                <?php echo $email_order->smtp_pass; ?>
            </div>
        </div>
    </div>
</div>