<?php
session_start();
if (!(isset($_SESSION['id'])))
{
  header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $title; ?></title>
  <link href="img/switch2.png" rel="icon">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/default.css">

  <!-- Data tables -->
  <!-- <link rel="stylesheet" href="/css/jquery.dataTables.min.css"> -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav blue sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon">
          <img src="img/switch2.png" style="max-width: 90px !important;" class="logo" alt="SWITCH LOGO">
        </div>
        <!-- <div class="sidebar-brand-text" style="font-size: 24px">AUTOMALL</div> -->
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

        <!-- Riders -->
        <li class="nav-item">
          <a class="nav-link" href="invoice.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Invoice</span>
          </a>
        </li>
<!--         <li class="nav-item">
          <a class="nav-link" href="products.php">
            <i class="fas fa-fw fa-tags"></i>
            <span>Product</span>
          </a>
        </li> -->

        <!-- Companies -->
<!--       <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span></a>
      </li> -->


        <!-- Employment -->
<!--         <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-list"></i>
            <span>Employment</span>
          </a>
          <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="login.html">Employment Requests</a>
              <a class="collapse-item" href="register.html">History</a>
              <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a> -->
<!--             </div>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-list"></i>
            <span>Employment</span></a>
          </li> -->

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="record.php">
              <i class="fas fa-fw fa-table"></i>
              <span>Sales Record</span></a>
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
                <span>Welcome <?php print $_SESSION['username']; ?></span>
                <ul class="navbar-nav ml-auto">
                  <!-- Reqest Alerts -->
                  <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bell fa-fw"></i>
                      <!-- Counter - Alerts -->
                      <span class="badge badge-danger badge-counter" id="request-alert"></span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                      <h6 class="dropdown-header blue">
                        Alerts Center
                      </h6>
                      <span id="alert-list">

                      </span>
                      <a class="dropdown-item blue text-center small text-gray-500" href="#">Show All Alerts</a>
                    </div>
                  </li>
                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="logout.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
<!--                       <a class="dropdown-item" href="../index.php">
                        <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                        Home
                      </a>
                      <a class="dropdown-item" href="#">
                      <i class="fas fa-store fa-sm fa-fw mr-2 text-gray-400"></i>
                        Shop
                      </a> -->
                      <!-- <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                      </a> -->
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <!-- End of Topbar -->
          <div class="container-fluid">
