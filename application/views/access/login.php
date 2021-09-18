<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1"><meta charset="UTF-8">

        <meta name="Keywords" content="<?php echo isset($meta_keyword) ? $meta_keyword : ''; ?>">
        <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : ''; ?>">
        <title><?php echo $meta_title. ' | Login' ; ?></title>
        <!-- favicon -->
        <link rel="icon" href="<?php echo site_url($lab_favicon); ?>" type="image/x-icon" />

		<!--========================Library Style Sheet========================-->
		<link href="<?php echo site_url('private/css/font-awesome.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo site_url('private/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<!--========================Library Style Sheet========================-->
		<!--========================Main Style Sheet========================-->
		<link href="<?php echo site_url('private/css/login.css'); ?>" rel="stylesheet">
		<link href="<?php echo site_url('private/css/alert.css'); ?>" rel="stylesheet">
		<!--========================Main Style Sheet========================-->

		<!--========================Script library========================-->
		<script type="text/javascript" src="<?php echo base_url('private/js/jquery.js');?>"></script>
		<!--========================Script library========================-->
		<style>
			h3 {display: none !important;}
			.alert {
				padding: 0 !important;
				margin: 0 !important;
			}
		</style>
	</head>

	<body>
		<section class="container-fluid form-container col-xs-12">
			<div class="row form-wrapper">
				<?php
					$attr = array('class'=>'login-form form-horizontal');
					echo form_open('access/users/login',$attr);
				?>
				<div class="form-border">
					<div class="lock-border">
						<div class="lock">
							<i class="fa fa-lock"></i>
						</div>
					</div>

					<div class="l-form-group no-border">
						<p><?php msg(); ?></p>
					</div>

					<div class="l-form-group">
						<label class="l-control-label" for="username"><i class="fa fa-user"></i></label>
						<div class="input-holder">
							<input type="text" class="l-form-control" id="username" name="username" placeholder="Username">
						</div>
					</div>

					<div class="l-form-group">
						<label class="l-control-label" for="password"><i class="fa fa-key"></i></label>
						<div class="input-holder">
							<input type="password" class="l-form-control" id="password" name="password" placeholder="Password">
						</div>
					</div>

					<div class="l-form-group no-border">
						<label class="l-text" >Remember</label>
						<input type="checkbox" id="remember_me" name="remember_me" value="remember_true"/>
						<div class="slide-btn">
							<span id="remember_me_trigger"></span>
						</div>
					</div>

					<div class="l-form-group">
						<input type="submit" name="submit_login" class="btn col-xs-12" value="Login"/>
					</div>

					<div class="l-form-group no-border">
						<a class="l-text" href="<?php echo base_url(); ?>">Go to the home page.</a>
						<a class="r-text" href="forgetPassword.html">Forgot password?</a>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</section>

		<script>
			$(document).ready(function(){
			    $("#remember_me_trigger").on("click", function(){
			    	if ($("#remember_me").attr('checked') == null) {
				    	$(this).animate({left:'25px'});
				    	$(this).parent().css({background:'#749927'});
				    	$("#remember_me").attr('checked','checked');
				    } else {
				    	$(this).animate({left:'0'});
				    	$(this).parent().css({background:'#F44D26'});
				    	$("#remember_me").removeAttr('checked');
				    }
			    });
			});
		</script>
	</body>
</html>
