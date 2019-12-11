<main class="app-content">
      <div class="app-title">
              <div>
                <h4><?php echo $title ?></h4>

              </div>
              <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dasbor') ?>"> Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/'.$this->uri->segment(2)) ?>">
                  <?php echo ucfirst(str_replace('_',' ', $this->uri->segment(2))) ?>
                </a></li>
                <li class="breadcrumb-item active"><?php echo $title ?></li>
              </ul>
            </div>
