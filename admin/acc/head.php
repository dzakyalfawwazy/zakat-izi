<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rumah Singgah Pasien| IZI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header text-sm bg-success navbar navbar-expand navbar-white navbar-dark border-bottom-0 mr-1">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     <?php $nproses =mysqli_num_rows(mysqli_query($conn,"select * from tb_booking,tb_pasien,tb_kamar where tb_booking.id_kamar=tb_kamar.id_kamar and tb_pasien.id_pasien=tb_booking.id_pasien and status<> 'selesai' order by id_booking")); $notif = $nproses ?>
     <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <?php if($notif > 0) { ?>
            <span class="badge badge-warning navbar-badge"><?= $notif ?></span>
          <?php } else {} ?>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header"><?= $notif ?> Notifications</span>
            <?php if($notif > 0){ ?>
            <div class="dropdown-divider"></div>
            <a href="index.php?p=6" class="dropdown-item">
              <i class="fas fa-user mr-2"></i> Ada <?= $nproses ?> Proses Booking Kamar
            </a>
            <div class="dropdown-divider"></div>
          <?php } else {} ?>
          </div>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php" title="Logout">
          <i class="fas fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar text-sm sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="..\hanb\img\capture2.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RSP IZI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?p=9" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <li class="nav-header">Menu Bar</li>
          <li class="nav-item has-treeview">
            <a href="index.php?p=6" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Proses Booking
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?p=7" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-right"></i>
              <p>
                Proses Check In
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="index.php?p=8" class="nav-link">
              <i class="nav-icon fas fa-arrow-circle-left"></i>
              <p>
                Proses Check Out
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?p=1" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=2" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=3" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kamar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=4" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kunjungan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?p=5" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rekap</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Beranda</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">