<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

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
                          <th>Aksi</th>
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
                          <td>
                              <a href="" data-toggle="modal" data-target="#editpengab" data-id="<?= $pem->id; ?>">
                              <span class="badge badge-success">Edit</span>
                              </a>
                              <a href="<?= base_url("pengabdian/hapus/").$pem->id;?>">
                              <span class="badge badge-danger">Hapus</span>
                              </a>
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

            <div class="col-lg-4 mb-4">

              <!-- Illustrations -->
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Instructions</h6>
                  </div>
                  <div class="card-body">
                    <p>Untuk menambahkan klik tombol berikut</p>
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#pengabdian">
                      <span class="icon text-white-50">
                          <i class="fas fa-arrow-right"></i>
                      </span>
                      <span class="text">Tambah Data</span>
                    </a>
                    
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <div class="modal fade" id="pengabdian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengabdian Masyarakat</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("pengabdian/add");?>" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" class="form-control"  name="judul">
                </div>
                <div class="form-group">
                  <label>Jenis</label>
                  <input type="text" class="form-control"  name="jenis">
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" class="form-control"  name="tg_mulai">
                </div>
                <div class="form-group">
                  <label>Tanggal Berakhir</label>
                  <input type="date" class="form-control"  name="tg_akhir">
                </div>
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="text" class="form-control"  name="tahun">
                </div>
                <div class="form-group">
                    <label>Tipe file .pdf maksimal ukuran 2MB</label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="berkas" required>
                      <label class="custom-file-label" for="customFile">Lampiran</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Save Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade" id="editpengab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengabdian</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("pengabdian/update")?>" enctype="multipart/form-data">
              <div class="modal-data"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Edit Pengabdian</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#editpengab').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("pengabdian/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'pengab='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>