<style>
    .tengah{
    position: absolute;margin-top: -100px;margin-left: -200px;
    left: 35%;top: 20%;width: 1300px;height: 220px;
    }
</style>

<div class="tengah">
<div class="container">

    <div class="row mt-12">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Input data penelitian
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_penelitian">Id penelitian</label>
                            <input type="text" name="penelitin" class="form-control" id="penelitian">
                            <small class="form-text text-danger"><?= form_error('penelitian'); ?></small>
                        </div> 
                        <div class="form-group">
                             <label for="id_luaranpenelitian">id luaranpenelitian</label>
                            <input type="text" name="id_luaranpenelitian" class="form-control" id="id_luaranpeneliyian">
                            <small class="form-text text-danger"><?= form_error('id_luaranpenelitian'); ?></small>
                        </div>  
                        <div class="form-group">
                             <label for="judul_penelitian">judul penelitian</label>
                            <input type="text" name="judul_penelitian" class="form-control" id="judul_penelitian">
                            <small class="form-text text-danger"><?= form_error('judul_penelitian'); ?></small>
                        </div> 
                        <div class="form-group">
                             <label for="tahun_penelitian">tahun penelitian</label>
                            <input type="text" name="tahun_penelitian" class="form-control" id="tahun_penelitian">
                            <small class="form-text text-danger"><?= form_error('tahun_penelitian'); ?></small>
                        </div> 
                        <div class="form-group">
                             <label for="sumber_dana">sember dana</label>
                            <input type="text" name="sumber_dana" class="form-control" id="sumber_dana">
                            <small class="form-text text-danger"><?= form_error('sumber_dana'); ?></small>
                        </div> 
                        <div class="form-group">
                             <label for="jumlah_dana">jumlah dana</label>
                            <input type="text" name="jumlah_dana" class="form-control" id="jumlah_dana">
                            <small class="form-text text-danger"><?= form_error('jumlah_dana'); ?></small>
                        </div> 
                        <div class="form-group row">
                            <div class="col-sm-3">Lampiran</div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                             <img src="<?= base_url('assets/img/lampiran/'); ?>" class="img-thumbnail">
                                        </div>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                             <input type="file" class="custom-file-input" id="lampiran" name="lampiran">
                                             <label class="custom-file-label" for="lampiran"><?= form_error('lampiran'); ?>Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <div>
                            <button type="reset" class="btn btn-md btn-warning mx-2">Reset</button>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary"> save </button>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</div>

