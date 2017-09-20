<!DOCTYPE html>

<html>

<head>

   <title>Upload Gambar</title>

   <link rel="stylesheet" href="<?php echo base_url('asset/css/foundation.min.css'); ?> />

</head>

<body>

   <div class="row">

      <div class="large-8 columns">

         <h3>Upload File</h3>

         <?php echo form_open_multipart('upload/upload'); ?>

         <div class="row">

            <div class="large-12 columns">

               <label>Pilih File</label>

               <input type="file" name="foto" />

            </div>

         </div>

         <div class="row">

            <div class="large-12 columns">

               <label>Keterangan</label>

               <input type="text" placeholder="keterangan" name="keterangan" />

            </div>

        </div>

        <button type="submit" class="button" name="upload">Upload</button>

        <?php echo form_close(); ?>

     </div>

   </div>

   <div class="row">

      <table class="large-8 columns">

         <thead>

            <tr>

               <th>#</th>

               <th>Gambar</th>

               <th>Keterangan</th>

            </tr>

          </thead>

          <tbody>

             <?php if ($file->result() == null) { ?>

             <tr>

                <td colspan="3"><h4>Belum ada data</h4></td>

             </tr>

             <?php

             } else {

                $i = 1;

                foreach ($file->result() as $key) {

                    echo '<tr>';

                    echo '<td>'.$i++.'</td>';

                    echo '<td><img src="'.base_url('asset/images/'.$key->gambar).'" width="50px" height="50px"></td>';

                    echo '<td>'.$key->keterangan.'</td>';

                    echo '</tr>';

                }

             }

             ?>

          </tbody>

       </table>

    </div>

    <script type="text/javascript" src="<?php echo base_url('asset/js/vendor/jquery.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('asset/js/foundation.min.js'); ?>"></script>

</body>

</html>