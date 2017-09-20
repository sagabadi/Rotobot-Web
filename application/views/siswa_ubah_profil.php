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
              <a href="<?php echo base_url(); ?>Home" class="sidebar-link">Dashboard</a>
            </li> 
            <li class="sidebar-item">
              <a href="<?php echo base_url(); ?>Profil" class="sidebar-link active">Profil</a>
            </li> 
            <li class="sidebar-item">
              <a href="<?php echo base_url(); ?>SiswaReport" class="sidebar-link">Report Activity</a>
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
                        <li><a href="<?php echo base_url(); ?>Home">Dashboard</a></li>
                      <li class="active">Profil</li>
                    </ol>
                </div>
                <!-- breadcrumb -->

                <div class="row">
                        <div class="main-title clearfix">
                            <h1>Ubah Profil</h1>
                        </div>
                            
                        <hr>

                        <form class="form form-custom" method="POST" action="<?php echo base_url(); ?>UbahProfilSiswa/Update">
                            <div class="col-md-6 p-l-0">
                                <div class="form-group col-md-4">
                                    <label>ID</label>
                                    <input id="ubah_id_karyawan" type="text" disabled name="" class="form-control" value="<?php echo $this->session->userdata('ids') ?>">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-8 has-error">
                                    <label>Nama</label>
                                    <input id="ubah_nama_karyawan" type="text" name="nama" class="form-control" value="<?php echo $this->session->userdata('nama') ?>">
                                    <span class="help-block">Field Nama Harus di Isi</span>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Bagian</label> 
                                    <input id="ubah_bagian" type="text" name="" class="form-control" value="Siswa" disabled>
                                </div>
                                <div class="col-md-12 clearfix">
                                    <hr>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Alamat</label>
                                    <textarea id="ubah_alamat" name="alamat" class="form-control resize-y"><?php echo $this->session->userdata('alamat') ?></textarea>
                                </div>
                                <div class="col-md-12 clearfix">
                                    <hr>
                                </div>
                                <div class="form-group col-md-8">
                                    <label>Email</label>
                                    <input id="ubah_email" type="text" name="email" class="form-control" value="<?php echo $this->session->userdata('email') ?>">
                                </div>                        
                                <div class="form-group col-md-8 has-error">
                                    <label for="ubah_sandi">Kata Sandi</label>
                                    <input id="ubah_sandi" type="password" name="pass1" class="form-control" value="">
                                    <span class="help-block">Kata Sandi Tidak Sama</span>
                                </div>                               
                                <div class="form-group col-md-8 has-error">
                                    <label for="ubah_sandi2">Ketik Ulang Kata Sandi</label>
                                    <input id="ubah_sandi2" type="password" name="pass2" class="form-control" value="">
                                    <span class="help-block">Kata Sandi Tidak Sama</span>
                                </div>    

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <span class="btn btn-default btn-file col-md-6">
                                            <input type="file" accept=".jpg,.gif,.png" multiple/>
                                        </span>
                                    </div>

                                    <div class="col-sm-10">
                                       <a href="#" type="button" class="btn custom1 btn-warning btn-sm">Upload</a>
                                    </div>
                                </div> 

                                <div class="col-xs-12 clearfix">
                                    <hr>
                                </div>  

                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-lg btn-bold pull-left">Simpan</button>
                                </div>       

                            </div>  
                        </form>
                    </div>
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
