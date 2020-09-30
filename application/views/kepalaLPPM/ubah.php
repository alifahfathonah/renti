<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-code"></i>
        </div>
        <div class="sidebar-brand-text mx-3">kepalaLPPM</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>kepalaLPPM">
        <i class="fas fa-envelope-square"></i> 
          <span>id penelitian</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-envelope-open"></i>
          <span>luaran penelitian</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-address-book"></i>
          <span>jtahun penelitina</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-envelope-open-text"></i>
          <span>sumber dana</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-file"></i>
          <span>jumlah dana</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-tag"></i>
          <span>History</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-folder"></i> 
          <span>lampiran</span></a>
      </li>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <li class="nav-item">
        <a class="nav-link" href="<?=base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?=base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h5 class="h3 mb-4 text-gray-800"><?=$judul; ?></h5>

          <style>
    .tengah{
    margin-top: 6px; margin-left: 350px;
    left: 55%;top: 20%;width: 900px;height: 120px;
    }
</style>

<div class="tengah">
<div class="container">

    <div class="row mt-12">
        <div class="col-md-6">

        <div class="card">
                <div class="card-header">
                <h6><?= $judul; ?></h6>
            </div>
                <div class="card-body">
                 <form action="<?= base_url('kepalaLPPM/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="penelitian">Id penelitian</label> 
                        <input type="text" name="penelitian" class="form-control"  id="penelitian" value="<?= $kepalaLPPM['penelitian']; ?>">
                        <input type="hidden" value="<?= $kepalaLPPM['rsuratid']; ?>" name="rsuratid">
                        <small class="form-text text-danger"><?= form_error('rsuratid'); ?></small>
                    </div>  
                    <div class="form-group">
                         <label for="luaran penelitian">id luaran penelitian</label>  
                        <input type="text" name="luaran penelitian" class="form-control" id="luaran penelitian" value="<?= $kepalaLPPM['luaran penelitian']; ?>">
                        <small class="form-text text-danger"><?= form_error('luaran penelitian'); ?></small>
                    </div> 
                    <div class="form-group">
                             <label for="judul_penelitian">judul penelitian</label>  
                            <option name="rs_sifat" class="form-control" id="judul_penelitian" value="<?= $kepalaLPPM['judul_penelitian']; ?>">
                            <div class="col-md-6">
                            <input type="radio" value="Rahasia">Rahasia
                            <input type="radio" value="Biasa">Biasa
                            </div>
                            </option>
                            <small class="form-text text-danger"><?= form_error('rs_sifat'); ?></small>
                    </div> 
                    <div class="form-group">
                         <label for="sumber_dana">sumber dana</label>
                        <input type="date" name="sumber_dana" class="form-control" id="sumber_dana" value="<?= $kepalaLPPM['rs_tgljam']; ?>">
                        <small class="form-text text-danger"><?= form_error('sumber_dana'); ?></small>
                    </div> 
                    <div class="form-group">
                         <label for="jumlah_dana">jumlah dana</label>
                        <input type="text" name="jumlah_dana" class="form-control" id="jumlah_dana" value="<?= $kepalaLPPM['rs_itansi']; ?>">
                        <small class="form-text text-danger"><?= form_error('jumlah_dana'); ?></small>
                    </div> 
                    <div class="form-group row">
                        <div class="col-sm-3">Lampiran</div>
                        <div class="col-sm-9">
                        <div class="row">
                        <div class="col-sm-4">
                        <img src="<?= base_url('assets/img/rs_lampiran/'); ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-8">
                        <div class="custom-file">
                        <input type="file" class="custom-file-input" id="rs_lampiran" name="rs_lampiran" value="<?= $kepalaLPPM['rs_lampiran']; ?>">
                        <label class="custom-file-label" for="rs_lampiran"><?= form_error('rs_lampiran'); ?>Choose file</label>
                        </div>
                        </div>
                        </div>
                        </div> 
                    <button type="submit" name="tambah" class="btn
                     btn-primary float-right"> Ubah</button>
                     <button type="reset" class="btn btn-md btn-warning mx-2">Reset</button>
                 </form>
                
         </div>
    </div>
    </div>

<footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <style>
          .bawah{
          position: absolute;margin-top: 50px;left: 40%; align: center; color: black;
          }
          </style>
          <div class="bawah">
            <span>Copyright &copy; TRIDHARMA UNIVBI <?=date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
