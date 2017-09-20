<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/favicon.png">
        <title>Rotobot - Sistem Manajemen Course</title>
        <link href="<?php echo base_url(); ?>asset/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>asset/plugins/animate.css/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/main.css">
    </head>
    <body class="login-page">
        <div class="container">
            <div class="row login">
                <div class="col-md-offset-4 col-md-4">
                    <a href="http://www.rotobot.org">
                        <img class="animated fadeInDown" src="<?php echo base_url(); ?>asset/images/Logo.png" class="center-block img-responsive" alt="Sistem Informasi Sertifikasi Produk">
                    </a>

                    <!-- Login -->
                    <div class="login-top-base">
                        <h4>Selamat Datang!</h4>
                        <p>Silahkan masukan data secara benar</p>
                    </div>
                    <div class="login-base clearfix">
                        <form role="form" class="form" action="<?php echo base_url(); ?>login/cekLogin" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="email" placeholder="Username" required name="username">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Kata sandi" required name="password">
                            </div>
                            <div class="form-group">
                                <label for="notif" class="red-text"><?php echo $this->session->userdata('salah'); ?></label>
                            </div>
                            <div class="form-group">
                                <?php if ($this->session->userdata('bayar') != '') { ?>
                                    <label for="notif" class="red-text"><?php echo $this->session->userdata('bayar') ?> <a href="#" data-toggle="modal" data-target="#modal_pembayaran">disini</a></label>
                                <?php } ?>
                            </div>  
                            <button type="submit" class="btn custom btn-primary pull-right">Masuk</button>
                            <?php $this->session->sess_destroy();?>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <img class="pull-left" src="<?php echo base_url(); ?>asset/images/rotobot.jpg" alt="Rotobot">
                        <p>
                            <strong>Rotobot Robotic School </strong><br>Jalan Kopral Sayom No.23, Klaten Utara – Klaten 57415. Jawa Tengah Indonesia <br>Copyright &copy; 2017
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="modal fade" id="modal_pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p class="modal-title" id="myModalLabel">Form Pembayaran</p>
                    </div>
                    <?php echo form_open_multipart('insertPembayaranEmail/send'); ?>
                    <div class="modal-body">
                        <div class="modal-body p-t-15 row">              
                            <div class="form-group col-md-8">
                                <label for="tambah_username">Username</label>
                                <input id="tambah_username" type="search" id="autocomplete1" name="username" class="form-control">
                            </div>    
                            <div class="form-group col-md-8">
                                <label for="tambah_nama">Nama Siswa</label>
                                <input id="tambah_nama" type="text" id="v_jurusan" name="" class="form-control" disabled>
                            </div>         
                            <div class="form-group col-md-8">
                                <label for="tambah_norek">No Rekening Pengirim</label>
                                <input id="tambah_norek" type="text" name="norek" class="form-control">
                            </div>             
                            <div class="form-group col-md-8">
                                <label for="tambah_nama_pengirim">Nama Pengirim</label>
                                <input id="tambah_nama_pengirim" type="text" name="namapengirim" class="form-control">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="tambah_nominal">Nominal Pembayaran</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2">Rp</span>
                                    <input type="number" name="bayar" id="total_bayar" class="form-control" placeholder="" aria-describedby="basic-addon2">
                                </div>
                            </div> 
                            <div class="form-group col-md-12">
                                <label for="tambah_keterangan">Keterangan Pembayaran</label>
                                <textarea id="tambah_keterangan" name="keterangan" class="form-control"></textarea>
                            </div>  
                            <div class="form-group col-md-6">
                                <label for="tambah_file">Bukti Pembayaran</label>
                                <input type="file" name="foto" accept=".jpg,.gif,.png" multiple/>
                            </div>  
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Close</button>
                        <button type="submit" id="tambah_submit" class="btn btn-primary btn-lg btn-bold pull-right">Simpan</button>
                    </div>
                    <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.MODAL -->
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery-1.8.2.min.js'></script>
        <script type='text/javascript' src='<?php echo base_url(); ?>assets/js/jquery.autocomplete.js'></script>

        <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
        <link href='<?php echo base_url(); ?>assets/js/jquery.autocomplete.css' rel='stylesheet' />

        <!-- Memanggil file .css autocomplete_ci/assets/css/default.css -->
        <link href='<?php echo base_url(); ?>assets/css/default.css' rel='stylesheet' />

        <script type='text/javascript'>
            var site = "<?php echo base_url(); ?>";
            $(function () {
                $('.autocomplete').autocomplete({
                    // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                    serviceUrl: site + '/autocomplete/search',
                    // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                    onSelect: function (suggestion) {
                        $('#v_jurusan').val('' + suggestion.jurusan); // membuat id 'v_jurusan' untuk ditampilkan
                    }
                });
            });
        </script>
        <!-- Scripts -->
        <script src="<?php echo base_url(); ?>asset/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>asset/plugins/bootstrap/bootstrap.min.js"></script>
    </body>
</html>
