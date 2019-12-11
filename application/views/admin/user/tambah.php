<div class="tile col-md-8">
    <div class="tile-title-w-btn">
        <h3 class="title">Tambah Data User</h3>
    </div>

<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');
//Atribut
$attribut = 'class="alert alert-link"';
// Form Open
echo form_open_multipart(base_url('admin/user/tambah'),$attribut);
?>

<div class="row">

<div class="col-md-12">
  <div class="form-group">
    <label>Nama User</label>
    <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo set_value('nama') ?>" required>
  </div>
</div>
<div class="col-md-7">
  <div class="form-group">
    <label>Email User</label>
    <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required>
  </div>
</div>
<div class="col-md-5">
  <div class="form-group">
    <label>Level Akses User</label>
      <select name="akses_level" class="form-control form-control-chosen">
        <option value="">Pilih Level</option>
        <option value="Superadmin">Superadmin</option>
        <option value="Admin">Admin</option>
      </select>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Upload Foto</label><br>
    <input type="file" name="foto_user" required>
  </div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Simpan User</button>
  </div>
</div>

</div>
</div>

<?php
//form Close
echo form_close();
?>
