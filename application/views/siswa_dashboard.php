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

        <!-- FAVICON -->
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#00943f">
        <meta name="theme-color" content="#ffffff">
        <!-- END FAVICON -->

        <link href="asset/plugins/datatable/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="asset/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="asset/plugins/animate.css/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" href="asset/css/main.css">
    </head>
    <body onload="startTime()">
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
                        <a href="<?php echo base_url(); ?>Home" class="sidebar-link active">Dashboard</a>
                    </li> 
                    <li class="sidebar-item">
                        <a href="<?php echo base_url(); ?>Profil" class="sidebar-link">Profil</a>
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
                                    <li class="pull-right"><p class="navbar-text">Selamat datang, <a href="#" class="navbar-link"><?php echo $this->session->userdata('nama') ?></a></p></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- /Top Bar -->
                    <?php date_default_timezone_set("Asia/Jakarta");?>
                    <?php $day = date('D'); ?>
                    <?php
                    $jam = date('H:i');
                    $id = $this->session->userdata('ids');
                    $daylist = array(
                        'Sun' => 'Minggu',
                        'Mon' => 'Senin',
                        'Tue' => 'Selasa',
                        'Wed' => 'Rabu',
                        'Thu' => 'Kamis',
                        'Fri' => 'Jumat',
                        'Sat' => 'Sabtu'
                            )
                    ?>
                    <?php $jad = $this->db->query("Select hari,jam,rekomendasikelas from jadwal join detailsiswa using(id_siswa) where id_siswa = $id and hari = '$daylist[$day]'"); ?>
                    <?php $jads = $this->db->query("Select hari,jam,rekomendasikelas from jadwal join detailsiswa using(id_siswa) where id_siswa = $id and hari = '$daylist[$day]'"); ?>
                    <!-- Main Content -->
                    <div id="main-content">
                        <div class="row">
                            <div class="col-lg-4 box animated fadeInDown">
                                <p>Jadwal Kamu Hari Ini</p>
                                <div class="box-line"></div>
                                <div class="box-number">
                                    <?php
                                    if ($jad->num_rows() == 0) {
                                        echo '<span>Tidak Ada Kelas Hari Ini</span>
                                    <br>
                                    <p id="txt" class="red-text"></p>';
                                    } else {
                                        foreach ($jads->result() as $key) {
                                            echo $key->rekomendasikelas;
                                            echo ' Jam : ' . date("H:i", strtotime($key->jam));
                                            echo '
                                    <br>                                    
                                    <p id="txt" class="red-text">$result-></p>
                                    <a href="' . base_url('SiswaViewMateri') . '" type="button" class="btn custom2 table-button btn-grey btn-xs ">Lihat Materi</a>';
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
                            <?php $total = $this->db->query("Select * from absensiswa where id_siswa = $id")->num_rows(); ?>
                            <?php $level = $this->db->query("Select rekomendasikelas as level from detailsiswa where id_siswa = $id");?>
                            <?php foreach($level->result() as $key):?>
                            <?php $masuk = $this->db->query("Select * from absensiswa join detailsiswa using (id_siswa) where id_siswa = $id and rekomendasikelas='$key->level' group by tanggalmasuk")->num_rows(); ?>  
                            <?php endforeach;?> 
                            <?php
                            if ($masuk == 0) {
                                $presis = 0;
                            } else {
                                $presis = ($masuk / $total) * 100;
                            }
                            ?>
                            <div class="col-lg-4 box animated fadeInDown">
                                <div class="box-number">
                                    <p><?php echo $presis ?>%</p>
                                    <span>Ada total <span class="blue-text"><?php echo $masuk ?></span> jumlah kehadiran dari <span class="blue-text"><?php echo $total ?></span> jumlah pertemuan kelas.</span>
                                    <a href="#" data-toggle="modal" data-target="#modal_jadwal" type="button" class="btn custom2 table-button btn-success btn-xs ">Lihat Jadwal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main Content -->
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- MODAL: jadwal siswa -->
        <div class="modal fade" id="modal_jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="modal-title" id="myModalLabel">Jadwal Kursus</p>
                        <p class="text-muted m-b-0"><?php echo $this->session->userdata('nama'); ?></p>
                    </div>
                    <div class="modal-body">
                        <table id="tabel_jadwal" class="table table-bordered" data-paging="true" data-filtering="true" data-sorting="true">
                            <thead>
                                <tr role="row">
                                    <th>Hari</th>
                                    <th>Waktu Mulai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal->result() as $key): ?>
                                    <tr>
                                        <td><?php echo $key->hari ?></td>
                                        <td><?php echo date('H:i', strtotime($key->jam)) ?></td>
                                    <tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.MODAL -->

        <!-- MODAL : View Materi Pembelajaran -->
        <div class="modal fade" id="modal_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        <iframe src="pdf.pdf" width="100%" height="100%" frameborder="0" allowtransparency="true"></iframe>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.MODAL -->

        <!-- Scripts -->
        <script src="asset/plugins/jquery/jquery.min.js"></script>
        <script src="asset/plugins/bootstrap/bootstrap.min.js"></script>
        <script src="asset/plugins/datatable/js/jquery.dataTables.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        // DATATABLE

        jQuery(function ($) {
            $('#tabel_jadwal').footable({
                "useParentWidth": true,
                "columns": $.get('columns.json'),
                "rows": $.get('rows.json')
            });
        });

        function startTime()
        {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            // add a zero in front of numbers<10<br>
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
            t = setTimeout(function () {
                startTime()
            }, 500);
        }

        function checkTime(i)
        {
            if (i < 10)
            {
                i = "0" + i;
            }
            return i;
        }

        </script>

    </body>
</html>
