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
          <span>Mengelola data penelitian</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">


      <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-address-book"></i>
          <span>Mengelolah data luaran penelitian</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
        <i class="fas fa-envelope-open-text"></i>
          <span>Mengelolah data pengabdian masyarakat</span></a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-file"></i>
          <span>Mengelolah laporan</span></a>
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
          <h1 class="h3 mb-4 text-gray-800"><?=$judul; ?></h1>

          <div class="container" style="margin-top: 40px">
        <?php echo $this->session->flashdata('notif') ?>
        <a href="<?php echo base_url() ?>kepalaLPPM/tambah" class="btn btn-md btn-success">Tambah data penelitian</a>
        <hr>
        <!-- table -->

        <div class="row">
        <div class="col-md-5">
        <form action="<?= base_url('kepalaLPPM'); ?>" method="post">
        <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search keyword.." name="keyword" autocomplete="off" autofocus>
        <div class="input-group-append">
        <input class="btn btn-primary" type="submit" name="submit">
        </div>
        </div>
        </form>
        </div>
        </div>

        <div class="table-tridharma">
        <h5>Show : <?= $total_rows; ?></h5>
        <table id="table" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                  <th>No</th>
                    <th>Id penelitian</th>
                    <th>id luaranpenelitian</th>
                    <th>judul penelitian</th>
                    <th>tahun penelitian</th>
                    <th>sumber dana</th>
                   <th>jumlah dana</th>
                   <th>Lampiran</th>
                  </tr>
                </thead>
                <tbody>

                <?php if (empty($kepalaLPPM)) : ?>
                <tr>
                <td colspan="9">
                <div class="alert alert-danger" role="alert">
                Data not found !!
                </div>
                </td>
                </tr>
                <?php endif; ?>

                <?php
                    foreach($kepalaLPPM as $hms){ 
                ?>

                  <tr>
                    <td><?= ++$start; ?></td>
                    <td><?= $hms['id_penelitian']; ?></td>
                    <td><?= $hms['id_luaranpenelitian']; ?></td>
                    <td><?= $hms['judul_penelitian']; ?></td>
                    <td><?= $hms['tahun_penelitian']; ?></td>
                    <td><?= $hms['sumber_dana']; ?></td>   
                    <td><?= $hms['jumlah_dana']; ?></td>
                    <td align="center"><img src="<?php echo base_url() . '/rs_lampiran/' . $hms['rs_lampiran']; ?>" width="70px">
                    </td>
                    <td>
                    <div>
                        <a href="<?= base_url(); ?>kepalaLPPM/hapus/<?= $hms['id_penelitian']; ?>"
                        class="badge badge-danger float-right mx-2" onclick="return confirm('yakin?');">Hapus</a>
                        <a href="<?= base_url(); ?>kepalaLPPM/ubah/<?= $hms['id_penelitian']; ?>"
                        class="badge badge-success float-right">Ubah</a>
                 </div>
                    </td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>

              <?= $this->pagination->create_links(); ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <style>
          .bawah{
          color: black;
          }
          </style>
          <div class="bawah">
            <span>Copyright &copy; Tridharma univbi <?=date('Y'); ?></span>
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
