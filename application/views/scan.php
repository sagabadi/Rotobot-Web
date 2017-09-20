
<script type="text/javascript" src="<?php echo base_url();?>asset/new/qr-scan/vue.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>asset/new/qr-scan/instascan.min.js"></script>

  <div class="container-fluid ">


    <div class=" wrapper container-fluid">


      <div class="row feature-row">

        <h5> </h5>

        <div class="col-md-12">
    
            
      <!-- tabs bottom -->
      <div class="tabbable tabs-below">
        <div class="tab-content">
           <div id="app" class="panel">
            <div class="sidebar col-md-4">
              <section class="cameras">
                <ul>
                  <li v-for="camera in cameras">
                    
                  </li>
                </ul>
              </section>
              
            </div>
            
            <div class="scans">
            <div class="preview-container col-md-8">
              <video id="preview" width="155%"></video>
            </div>
                <transition-group name="scans" tag="ul">
                  <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ window.location = scan.content }}</li>
                </transition-group>
              </div>
          </div>
          <script type="text/javascript" src="<?php echo base_url();?>asset/new/qr-scan/app.js"></script></div>
         <div class="tab-pane" id="two_"></div>
        </div>
        <ul class="nav nav-tabs text-center" style="margin-left: 0%;border-bottom: 0px solid #fff;
}">        
        </ul>
      </div>
      <!-- /tabs -->
    </div>
  </div>
</div>
</div>
</div>