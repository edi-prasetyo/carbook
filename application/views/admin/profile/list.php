  <div class="tile col-lg-7">
                  <div class="bs-component">
                    <ul class="nav nav-tabs">
                      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#profile">Profile</a></li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#updateprofile">Ubah Profile dan Password</a></li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade active show" id="profile">
                        <p>

                          <div class="row">
                            <div class="col-md-4">
                              <a href="#"><img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/upload/image/'.$user->foto_user) ?>"></a>
                              </div>
                              <div class="col-md-8">
                                <div class="content">
                                  <h5><a href="#"><?php echo $user->nama ?></a></h5>
                                  <p><b>Update Terakhir Tanggal :</b> <?php echo date('d M Y',strtotime( $user->tanggal)) ?></p>
                                  <p><b>Email : </b><?php echo $user->email ?></p>
                                  <p><b>Akses Level : </b><?php echo $user->akses_level ?></p>
                                  <p><b>Telepon : </b><?php echo $user->telp ?></p>
                                </div>
                              </div>

                          </div>

                      </p>
                      </div>

                      <div class="tab-pane fade" id="updateprofile">
                        <p>
                          <?php
                          //Notifikasi
                          if($this->session->flashdata('sukses'))
                          {
                            echo '<div class="alert alert-success alert-custom">';
                            echo $this->session->flashdata('sukses');
                            echo '</div>';
                          }
                          //Error warning
                          echo validation_errors('<div class="alert custom-alert">','</div>');
                          //Atribut
                          $attribut = 'class="alert alert-link"';
                          // Form Open
                          echo form_open_multipart(base_url('admin/profile'));
                          ?>

                          <div class="row">

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Nama </label>
                              <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>" required>
                            </div>
                            </div>


                            <div class="col-md-12">
                            <div class="form-group">
                              <label>Telp </label>
                              <input type="text" name="telp" class="form-control" placeholder="Telp" value="<?php echo $user->telp ?>" required>
                            </div>
                          </div>

                            <div class="col-md-5">
                            <div class="form-group">
                              <label>Email </label>
                              <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>" readonly>
                            </div>
                          </div>

                          <!-- <div class="col-md-7">
                            <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly>
                            </div>
                            </div> -->

                          <div class="col-md-5">
                            <div class="form-group">
                              <label>Level Akses</label>
                                <input type="text" name="akses_level" class="form-control" value="<?php echo $user->
                                      akses_level ?>" readonly>
                            </div>
                          </div>

                            <div class="col-md-12">
                            <div class="form-group">
                              <label>Password</label>
                              <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
                            </div>
                          </div>


                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Upload Foto</label><br>
                              <input type="file" name="foto_user"><br><br>

                              <img src="<?php echo base_url('assets/upload/image/thumbs/'.$user->foto_user) ?>" width="15%"
                                class="img img-thumbnail">

                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan">
                            </div>
                          </div>


                          </div>

                          <?php
                          //form Close
                          echo form_close();
                          ?>
                        </p>
                      </div>







                    </div>
                  </div>
                </div>
