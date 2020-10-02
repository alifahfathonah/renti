<div class="container-fluid">

          <div class="row">

            <div class="col-lg-8 mb-4">

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
                    <th scope="col">Aksi</th>
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
                  <td>
                    <a href="" data-toggle="modal" data-target="#editfk" data-id="<?= $fk->id_fakultas; ?>">
                    <span class="badge badge-success">Edit</span>
                    </a>
                    <a href="<?= base_url("fakultas/hapus/").$fk->id_fakultas;?>">
                    <span class="badge badge-danger">Hapus</span>
                    </a>
                  </td>
                </tbody>
                <?php } ?>
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
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#fakultas">
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
      <div class="modal fade" id="fakultas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Fakultas</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="user" method="post" action="<?= base_url("fakultas/add");?>">
                <div class="form-group">
                  <label>Kode Fakultas</label>
                  <input type="text" class="form-control"  name="kd_fak">
                </div>
                <div class="form-group">
                  <label>Nama Fakultas</label>
                  <input type="text" class="form-control"  name="nm_fak">
                </div>
                <div class="form-group">
                  <label>Telp</label>
                  <input type="text" class="form-control"  name="telp">
                </div>
                 <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control"  name="email">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="alamat" rows="5"></textarea>
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
      <div class="modal fade" id="editfk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Prodi</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="prodi" method="post" action="<?= base_url("fakultas/update")?>">
              <div class="modal-data"></div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary btn-user">Edit Prodi</button>
            </div>
            </form>
          </div>
        </div>
      </div>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#editfk').on('show.bs.modal', function (e) {
            var userDat = $(e.relatedTarget).data('id');
            /* fungsi AJAX untuk melakukan fetch data */
            $.ajax({
                type : 'post',
                url : '<?= base_url("fakultas/praedit") ?>',
                /* detail per identifier ditampung pada berkas detail.php yang berada di folder application/view */
                data :  'fakul='+ userDat,
                /* memanggil fungsi getDetail dan mengirimkannya */
                success : function(data){
                $('.modal-data').html(data);
                /* menampilkan data dalam bentuk dokumen HTML */
                }
            });
         });
    });
  </script>