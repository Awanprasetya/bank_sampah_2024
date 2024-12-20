<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BANK SAMPAH</title>
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="icon" href="<?php echo base_url().'assets/images/favicon.ico'?>" />

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.7.0/dt-2.0.8/fc-5.0.1/fh-4.0.1/sp-2.3.1/datatables.min.css" rel="stylesheet">

 



</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-0">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $this->session->userdata('nama')?></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'dashboard/index'?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Data Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-folder-open "></i>
          <span>Menu</span>
        </a>
        <?php if($this->session->userdata('user_level')==='SA_SuperAdmin'){?>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List</h6>
            <a class="collapse-item" href="<?php echo base_url().'c_setor/index'?>">Setor Sampah</a>
			      <a class="collapse-item" href="<?= base_url().'c_tarik_saldo/index'?>">Penarikan Saldo</a>
            <a class="collapse-item" href="<?= base_url().'c_saldo_krl/index'?>">Data Saldo Per KRL</a>
            <a class="collapse-item" href="<?php echo base_url().'c_saldo_nasabah/index'?>">Data Saldo Per Nasabah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_nasabah/index'?>">Data Akun Nasabah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_registrasi/index'?>">Data Akun Registrasi</a>
            <a class="collapse-item" href="<?php echo base_url().'c_report/v_tarik'?>">Riwayat Transaksi</a>
          </div>
        </div>
        <?php }elseif($this->session->userdata('user_level')==='AK_AdminKec'){?>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List</h6>
            <a class="collapse-item" href="<?php echo base_url().'c_setor/index'?>">Setor Sampah</a>
			      <a class="collapse-item" href="<?= base_url().'c_tarik_saldo/index'?>">Penarikan Saldo</a>
            <a class="collapse-item" href="<?= base_url().'c_saldo_krl/index'?>">Data Saldo Per KRL</a>
            <a class="collapse-item" href="<?php echo base_url().'c_saldo_nasabah/index'?>">Data Saldo Per Nasabah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_nasabah/index'?>">Data Akun Nasabah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_registrasi/index'?>">Data Akun Registrasi</a>
            <a class="collapse-item" href="<?php echo base_url().'c_report/v_tarik'?>">Riwayat Transaksi</a>
          </div>
        </div>
          <?php }elseif($this->session->userdata('user_level')==='AB_AdminBank'){?>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List</h6>
            <a class="collapse-item" href="<?php echo base_url().'c_setor/index'?>">Setor Sampah</a>
			      <a class="collapse-item" href="<?= base_url().'c_tarik_saldo/index'?>">Penarikan Saldo</a>
            <a class="collapse-item" href="<?= base_url().'c_saldo_krl/index'?>">Data Saldo Per KRL</a>
            <a class="collapse-item" href="<?php echo base_url().'c_saldo_nasabah/index'?>">Data Saldo Per Nasabah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_nasabah/index'?>">Data Akun Nasabah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_registrasi/index'?>">Data Akun Registrasi</a>
            <a class="collapse-item" href="<?php echo base_url().'c_report/v_tarik'?>">Riwayat Transaksi</a>
          </div>
        </div>
            <?php }else{?>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List</h6>
            <a class="collapse-item" href="<?php echo base_url().'c_setor/index'?>">Setor Sampah</a>
			      <a class="collapse-item" href="<?= base_url().'c_tarik_saldo/index'?>">Penarikan Saldo</a>
            <a class="collapse-item" href="<?php echo base_url().'c_report/v_tarik'?>">Riwayat Transaksi</a>
            <a class="collapse-item" href="<?php echo base_url().'c_data_nasabah/v_detail/'.$this->session->userdata('registrasi_id')?>">Informasi Akun</a>
          </div>
        </div>
              <?php }?>
      </li>
      <?php if($this->session->userdata('user_level')==='SA_SuperAdmin'){ ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-database "></i>
          <span>Master Data</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">List Master Data </h6>
            <a class="collapse-item" href="<?php echo base_url().'c_jenis_sampah/index'?>">Data Jenis Sampah</a>
            <a class="collapse-item" href="<?php echo base_url().'c_krl_master/index'?>">Data KRL</a>
          </div>
        </div>
      </li>
<?php }else{}?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
	  <?php if($this->session->userdata('user_level')==='SA_SuperAdmin'){ ?>
      <div class="sidebar-heading">
        Options <!-- visible only for admin -->
      </div>

      <!-- Nav Item - User Management -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'c_user/index'?>">
          <i class="fas fa-fw fa-user"></i>
          <span>User Management</span></a>
      </li>

      <!-- Nav Item - Activity Log -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-list"></i>
          <span>Activity Log</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
	  <?php } else { } ?>

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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" id="">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">2</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2020</div>
                    <span class="font-weight-bold">Your custom notification</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2020</div>
                    Your Account was just signed in to from a new device!
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Notifications</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?><br><?php echo $this->session->userdata('user_level'); ?></span>
                <?php if($this->session->userdata('user_level')=='U_User'){?>
                <img class="img-profile rounded-circle"  src="<?php echo base_url().'assets/foto/'.$this->session->userdata('photo_path'); ?>">
                <?php }else{?>
                  <img class="img-profile rounded-circle"  src="<?php echo base_url().'assets/user.png' ?>">
                  <?php }?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Edit Profile
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
         