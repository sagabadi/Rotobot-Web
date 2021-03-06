<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="asset/images/favicon.png">
    <title>Rotobot - Sistem Manajemen Course</title>
    <link href="asset/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="asset/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="asset/plugins/animate.css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/main.css">
  </head>
<body>
<!-- wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="animated">
        <ul class="sidebar-nav sidebar-group">
            <li class="sidebar-brand">
                <a href="#">
                    Rotobot - Sistem Manajemen Course
                </a>
            </li>
            <li class="sidebar-item sidebar-text"><p>navigasi</p></li>
            <li class="sidebar-item">
              <a href="<?php echo base_url();?>Home" class="sidebar-link">Dashboard</a>
            </li> 
            <li class="sidebar-item">
              <a href="<?php echo base_url();?>Profil" class="sidebar-link">Profil</a>
            </li> 
            <li class="sidebar-item">
              <a href="<?php echo base_url();?>SiswaReport" class="sidebar-link active">Report Activity</a>
            </li> 
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Toggle Button -->
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><i class="fa fa-bars"></i></a>
    <!-- /Toggle Button -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
          <!-- Top Bar -->
            <div class="row">
              <nav id="top-menu-bar" class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                  <ul class="nav navbar-nav navbar-right" id="top-menu-item">
                    <li class="pull-right"><a href="<?php echo base_url(); ?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                    <li class="pull-right"><p class="navbar-text divider">|</p></li>
                    <li class="pull-right"><p class="navbar-text">Selamat datang, <a href="<?php echo base_url(); ?>Profil" class="navbar-link"><?php echo $this->session->userdata('nama') ?></a></p></li>
                  </ul>
                </div>
              </nav>
            </div>
          <!-- /Top Bar -->
          
          <!-- Main Content -->
            <div id="main-content">
                <!-- breadcrumb -->
                <div class="row" >
                    <ol class="breadcrumb">
                      <li><a href="<?php echo base_url();?>Home">Dashboard</a></li>
                      <li class="active">Activity Report</li>
                    </ol>
                </div>
                <!-- breadcrumb -->

                <div class="row">
                        
                </div>
                <!-- /.row -->

            </div>
          <!-- Main Content -->
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Scripts -->
<script src="asset/plugins/jquery/jquery.min.js"></script>
<script src="asset/plugins/bootstrap/bootstrap.min.js"></script>
<script src="asset/plugins/datatable/js/jquery.dataTables.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    /* Datatable Absensi*/
    var tabel_absensi = $('#tabel_absensi').DataTable({
        'info': true,
        'language': {
            'info': 'Menampilkan _START_-_END_ dari _TOTAL_ data absensi'
        },
    })
</script>

</body>
</html>
