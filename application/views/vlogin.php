<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.min.css">
		<style>
			body{
			    height: 100vh;
			    display: flex;
			    align-items: center;
			    justify-content: center;
			}
			.panel-heading{
		        padding: 5px 15px;
		     }
		     .panel-footer{
		        padding: 5px 15px;
		     }
		     .panel-footer{
		       padding: 5px 15px;
		       color: #A0A0A0;
		    }
		    .profile-img{
		      width: 96px;
		      height: 96px;
		      margin: 0 auto 10px;
		      display: block;
		      -moz-border-radius: 50%;
		      -webkit-border-radius: 50%;
		      border-radius: 50%;
		   }
		</style>
	</head>
<body>

	<div class="container">
        <div class="row">
          <div class="col-sm12 col-md-4"></div>
          <div class="col-sm12 col-md-4">
            <div class="panel panel-default">
              	<div class="panel-heading text-center">
               		<strong>Login Form Bootstrap</strong>
              	</div>
	            <div class="panel-body">
	               <form role="form" action="<?php echo base_url(); ?>login/cekLogin" method="POST">
	                  <fieldset>
	                      <div class="row">
	                         <div class="center-block">
	                           <img class="profile-img" src="<?php echo base_url(); ?>asset/img/photo.jpg" alt="">
	                        </div>
	                     <div class="row">
	                        <div class="col-sm-12 col-md-10 col-md-offset-1 ">
	                            <div class="form-group">
	                                  <div class="input-group">
	                                    <span class="input-group-addon">
	                                      <i class="glyphicon glyphicon-user"></i>
	                                    </span>
	                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
	                                  </div>
	                           </div>
	                           <div class="form-group">
	                                <div class="input-group">
	                                   <span class="input-group-addon">
	                                      <i class="glyphicon glyphicon-lock"></i>
	                                   </span>
	                                   <input class="form-control" placeholder="Your Password" name="password" type="password" autofocus>
	                               </div>
	                           </div>
	                           <div class="form-group">
	                             <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
	                           </div>
	                        </div>
	                     </div>
	                 </div>
	               </fieldset>
	          </form>
	       </div>
	      </div>
	    </div>	    
        <div class="col-sm12 col-md-4"></div>
	  </div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>