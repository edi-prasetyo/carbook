<h1 class="cat-judul text-center"><?php echo $title ?></h1>
<div class="container">

	      <ul class="breadcrumb">
	          <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
	          <li class="breadcrumb-item active"><?php echo $title ?></li>
	      </ul>



	<div class="card-login">
			<div class="col-md-5">

				<h4> Daftar Gratis!</h4>
				<p>Bagi anda yang ingin memasang iklan listing properti anda bisa pasang disini Gratis, Silahkan daftar sekarang juga</p>
				<hr>

<?php
//Error warning
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open(base_url('daftar'));
?>
<?php

if($this->session->flashdata('sukses')){
echo '<div class="alert alert-success">';
echo $this->session->flashdata('sukses');
echo '</div>';
}

?>

	  <input type="hidden" name="username">
		<input type="hidden" name="akses_level">

		<div class="form-group">
		  <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
		</div>

<div class="form-group">
  <input type="email" name="email" class="form-control" placeholder="Email">
</div>

<div class="form-group">
  <input type="text" name="password" class="form-control" placeholder="Password">
</div>

<button type="submit" class="btn btn-success">Daftar Sekarang</button>


<?php
//form close
echo form_close();

 ?>

</div>
</div>
</div>
