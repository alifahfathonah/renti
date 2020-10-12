<div class="container-fluid">

          <div class="row">

            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Penelitian</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Tahun</th>
                          <th>Sumber Dana</th>
                          <th>Jumlah Dana</th>
                          <th>Lampiran</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($riset as $ris) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $ris->judul_penelitian; ?></td>
                          <td><?= $ris->tahun_penelitian; ?></td>
                          <td><?= $ris->sumber_dana; ?></td>
                          <td><?= $ris->jumla_dana; ?></td>
                          <td>
                            <?php if ($ris->lampiran == 'nofiles.pdf'){?>
                            <a href="">FILES TIDAK ADA</a>
                            <?php }else{?>
                            <a href="<?= base_url("upload/penelitian/").$ris->lampiran;?>">DOWNLOAD FILES</a><?php } ?>
                          </td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
            </div>
            </div>
            </div>
            
            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Fakultas</th>
                          <th>Prodi</th>
                          <th>Nama</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Alamat</th>
                          <th>Telp</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($mahas as $mh) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $mh->nama_fakul; ?></td>
                          <td><?= $mh->nama_prodi; ?></td>
                          <td><?= $mh->nama_mahasiswa; ?></td>
                          <td><?= $mh->tempat_lahir; ?></td>
                          <td><?= $mh->tanggal_lahir; ?></td>
                          <td><?= $mh->alamat; ?></td>
                          <td><?= $mh->telp; ?></td>
                          <td><?= $mh->email; ?></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
          </div>
          </div>
        </div>
          <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Pengabdian Masyarakat</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Judul</th>
                          <th>Jenis</th>
                          <th>Tanggal Mulai</th>
                          <th>Tanggal Berakhir</th>
                          <th>Tahun</th>
                          <th>Lampiran</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no = 1;
                        foreach ($pengab as $pem) {
                         ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $pem->judul; ?></td>
                          <td><?= $pem->jenis; ?></td>
                          <td><?= $pem->tanggal_mulai; ?></td>
                          <td><?= $pem->tanggal_akhir; ?></td>
                          <td><?= $pem->tahun; ?></td>
                          <td>
                            <?php if ($pem->lampiran == 'nofiles.pdf'){?>
                            <a href="">FILES TIDAK ADA</a>
                            <?php }else{?>
                            <a href="<?= base_url("upload/pengabdian/").$pem->lampiran;?>">DOWNLOAD FILES</a><?php } ?>
                          </td>
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>        
              </table>
            </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Fakultas</h6>
                  </div>
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div>
                      <table class="table table-bordered table-responsive">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Fakultas</th>
                    <th scope="col">Nama Fakultas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Telp</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <?php 
                  $no = 1;
                  foreach ($fakul as $fk) {
                 ?>
                <tbody>
                  <td><?= $no++; ?></td>
                  <td><?= $fk->kode_fakul; ?></td>
                  <td><?= $fk->nama_fakul; ?></td>
                  <td><?= $fk->alamat_fakul; ?></td>
                  <td><?= $fk->telp_fakul; ?></td>
                  <td><?= $fk->email_fakul; ?></td>
                  
                </tbody>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
        <!-- /.container-fluid -->
      </div>
      