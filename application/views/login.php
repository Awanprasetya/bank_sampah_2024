<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>KRL - BANK SAMPAH ID </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        
        <!-- Fonts -->
        <!-- Lato -->
        <link rel="icon" href="<?php echo base_url().'assets/images/favicon.ico'?>" />
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- CSS -->

        <link rel="stylesheet" href="<?php echo base_url().'assets_1/css/bootstrap.min.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets_1/css/font-awesome.min.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets_1/css/owl.carousel.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets_1/css/animate.css'?>">
        <link rel="stylesheet" href="<?php echo base_url().'assets_1/css/main.css'?>">
        <!-- Responsive Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url().'assets_1/css/responsive.css'?>">
    </head>

    <body id="body">

    	<div id="preloader">
    		<div class="book">
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		  <div class="book__page"></div>
    		</div>
    	</div>

	    <!-- 
	    Header start
	    ==================== -->
	    <div class="navbar-default navbar-fixed-top" id="navigation">
	        <div class="container">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">
                        <img src="<?php echo base_url().'assets/images/logo.png'?>" alt="" width="50px">
                        
	                </a>
	            </div>

	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <nav class="collapse navbar-collapse" id="navbar">
	                <ul class="nav navbar-nav navbar-right" id="top-nav">
                    <div class="wow fadeInDown" data-wow-delay="0.3s">
	                        	<a class="btn btn-default btn-home" href="<?= base_url().'Login/index'?>" role="button">HOME</a>
	                        </div>
	                </ul>
	            </nav><!-- /.navbar-collapse -->
	        </div><!-- /.container-fluid -->
	    </div>
       
	    <section id="hero-area">
            
	        <div class="container">
            <img src="<?= base_url().'assets/images/umci1.png'?>" alt="" width="260px"> X <img src="<?= base_url().'assets/images/kecc.png'?>" alt="" width="260px">

        <div class="row">
            
            <div class="col-md-6">

                <div class="container">
			
 			<hr>
             <?php echo $this->session->flashdata('alert_1');?>
			 <?php echo $this->session->flashdata('alert_2');?>
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" action="<?php echo base_url().'Login/i_registrasi'?>">
						<fieldset>							
							<p class="text-uppercase pull-center"> REGISTRASI AKUN SEBAGAI NASABAH</p>	
							<div class="form-group">
								<input type="text" name="nama" id="nama" class="form-control input-lg" placeholder="Nama Lengkap" required>
							</div>
							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" required>
							</div>
 							<div class="form-group">
								<input type="text" name="user_name" id="user_name" class="form-control input-lg" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="num" name="no_hp" id="no_hp" class="form-control input-lg" placeholder="Nomor Handphone Aktif" required>
							</div>
							<div class="form-group">
								<select name="user_level" id="user_level">
									<option value="U_User">Nasabah</option>
								</select>
							</div>
							<div class="form-group">
								<select name="krl_id" id="krl_id">
									<?php foreach($krl_master as $k){?>
									<option value="<?php echo $k->krl_id?>"><?php echo $k->krl_nama?></option>
									<?php }?>
								</select>
							</div>
							<div class="form-group">
								<input type="text" name="user_id" id="user_id"  value="1" hidden>
							</div>
							<div class="form-group">
								<input type="text" name="status" id="status"  value="Draft" hidden>
							</div>
							<div class="form-check">
								<!-- <label class="form-check-label">
								  <input type="checkbox" class="form-check-input">
								  By Clicking register you're agree to our policy & terms
								</label> -->
							  </div>
 							<div>
 									  <input type="submit" class="btn btn-lg btn-primary ">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
                <form class="form-signin" method="post" action="<?php echo site_url('Login/masuk'); ?>">
						<fieldset>							
							<p class="text-uppercase"> Masuk dengan akun yang telah terdaftar </p>	
 								
							<div class="form-group">
								<input type="text" name="user_name" id="user_name" class="form-control input-lg" placeholder="username">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<input type="submit" class="btn btn-md" value="Sign In">
							</div>
								 
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
	               
                
                   
	            </div><!-- .row close -->
	        </div><!-- .container close -->
	    </section>
      
<section clas="wow fadeInUp">
        	<div class="map-wrapper">
        	</div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <p>Copyright &copy; <a href="http://www.Themefisher.com">Themefisher</a>| All right reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <!-- Js -->
        <script src="<?php echo base_url().'assets_1/js/vendor/modernizr-2.6.2.min.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/vendor/jquery-1.10.2.min.js'?>"></script>
        <script src="<?php echo base_url().'https://maps.googleapis.com/maps/api/js?sensor=false'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/jquery.lwtCountdown-1.0.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/owl.carousel.min.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/jquery.validate.min.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/jquery.form.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/jquery.nav.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/jquery.sticky.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/plugins.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/wow.min.js'?>"></script>
        <script src="<?php echo base_url().'assets_1/js/main.js'?>"></script>
        
    </body>
</html>
