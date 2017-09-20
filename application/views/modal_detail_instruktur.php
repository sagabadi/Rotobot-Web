<?php
if (isset($_POST["id_karyawan"])) {
    $output .= '';
    $query = $this->db->query("Select * from karyawan where");
    $output = ' 
                        <div class = "table-responsive">
                        <table class = "table table-bordered>';
    $output .= ' 
                    <tr>
                        <td>Nama Instruktur</td>
                        <td><?php echo $result->nama?></td>
                    <tr>
                    <dl class="col-md-6">
                        <dt>TTL</dt>
//                        
                    </dl>
                    <dl class="col-md-6">
                        <dt>Umur</dt>
                        <dd>20 tahun</dd>
                    </dl>
                    <dl class="col-md-6">
                        <dt>Jenis Kelamin</dt>
                        <dd><?php echo $result->jeniskelamin?></dd>
                    </dl>
                    <dl class="col-md-6">
                        <div class="col-xs-12 col-md-6 text-center">
                            <img src="asset/images/icons/icon-profile-placeholder.png" style="width: 10rem;">
                        </div>    
                    </dl>
                    <div class="col-md-12 clearfix">
                        <hr>
                    </div>  
                    <dl class="col-md-6">
                        <dt>Username</dt>
                        <dd><?php echo $result->username?></dd>
                    </dl>  
                    <dl class="col-md-6">
                        <dt>No HP</dt>
                        <dd><?php echo $result->hp?></dd>
                    </dl>       
                    <dl class="col-md-6">
                        <dt>Email</dt>
                        <dd><?php echo $result->email?></dd>
                    </dl>       
                    <dl class="col-md-12">
                        <dt>Alamat</dt>
                        <dd><?php echo $result->alamat?></dd>
                    </dl>';
    $output .= "</table></div>";
echo $output;
    }

?>       <!-- Scripts -->

