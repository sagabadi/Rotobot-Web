<!DOCTYPE html>
<html lang="en">
    <div class="modal-dialog modal-custom modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="modal-title pull-left">Detail Data Karyawan</p>
                <!-- <button class="btn btn-primary cetak_laporan_btn pull-right m-r-1">Cetak Laporan</button> -->
            </div>                
            <div class="modal-body p-t-15 row">
                <?php foreach ($marks->result() as $result): ?>
                    <dl class="col-md-6">
                        <dt>Nama Karyawan</dt>
                        <dd><?php echo $result->nama ?></dd>
                    </dl>
                    <?php
                    $birth = $result->tanggallahir;
                    $bday = new DateTime($birth);
                    $today = new DateTime();
                    $diff = $today->diff($bday);
                    ?>
                    <dl class="col-md-6">
                        <dt>TTL</dt>
                        <dd><?php echo $result->tempatlahir ?>, <?php echo date('d F Y', strtotime($result->tanggallahir)) ?></dd>
                    </dl>
                    <dl class="col-md-6">
                        <dt>Umur</dt>
                        <dd><?php echo $diff->y; ?> tahun</dd>
                    </dl>
                    <dl class="col-md-6">
                        <dt>Jenis Kelamin</dt>
                        <dd><?php echo $result->jeniskelamin ?></dd>
                    </dl>
                    <dl class="col-md-6">
                        <div class="col-xs-12 col-md-6 text-center">
                            <?php
                            if ($result->foto == '') {
                                echo '<img src="' . base_url() . 'asset/images/icons/icon-profile-placeholder.png" style="width: 10rem;">';
                            } else {
                                echo '<img  src="' . base_url('asset/images/Karyawan/' . $result->foto) . '" style="width: 10rem;">';
                            }
                            ?>
                        </div>    
                    </dl>
                    <div class="col-md-12 clearfix">
                        <hr>
                    </div>  
                    <dl class="col-md-6">
                        <dt>Username</dt>
                        <dd><?php echo $result->username ?></dd>
                    </dl>  
                    <dl class="col-md-6">
                        <dt>No HP</dt>
                        <dd><?php echo $result->hp ?></dd>
                    </dl>       
                    <dl class="col-md-6">
                        <dt>Email</dt>
                        <dd><?php echo $result->email ?></dd>
                    </dl>       
                    <dl class="col-md-12">
                        <dt>Alamat</dt>
                        <dd><?php echo $result->alamat ?></dd>
                    </dl>
                <?php endforeach; ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    <!-- Scripts -->
    <script src="<?php echo base_url(); ?>asset/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/plugins/bootstrap/bootstrap.min.js"></script>

</html>
