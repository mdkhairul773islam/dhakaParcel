<style>
	.preview{
		display: inline-block;
		padding: 4px;
		border-radius: 6px;
		overflow: hidden;
		max-width: 200px;
		min-height: 100px;
		width: 100%;
		background: #eee;
	}
	.banner{
		max-width:600px;
		width: 100%;
		min-height: 50px;
	}
	.preview img{
		display: block;
		width:100%;
	}
	.mt-15{
		margin-top: 15px;
	}
</style>



<div class="container-fluid">
    <div class="row">
		<div class="panel panel-default">
			<?php msg('msg'); ?>
			<div class="panel-heading">
				Banner, Logo, Favicon
			</div>

			<div class="panel-body">
				<form action="<?php echo base_url("themesettings/settings"); ?>" method="post" enctype="multipart/form-data">				
					<!-- logo start -->
					<div class="col-md-12">
						<div class="row">
							<!-- header log start -->
							<div class="col-md-4">
								<div class="preview logo">
									<img id="header_logo" src="<?php if($settings_info!=null && isset($settings_info[0]->header_logo_path) && $settings_info[0]->header_logo_path != null){echo site_url($settings_info[0]->header_logo_path);}?>">
								</div>

								<div class="col-md-12">
									<div class="row">
										<label class="btn btn-warning">
											<i class="fa fa-upload" aria-hidden="true"></i>
											Upload Header Logo
											<input type="hidden" name="old_header_logo" value="<?php if($settings_info!=null && isset($settings_info[0]->header_logo_path) && $settings_info[0]->header_logo_path != null){echo $settings_info[0]->header_logo_path;}?>">
											<input type='file' name="header_logo" onchange="previewFile('header_logo',this)"  class="hidden row form-control" >
										</label>
									</div>
								</div>
							</div>
							<!-- header log end -->

							<!-- footer logo start -->
							<div class="col-md-4">
								<div class="preview logo">
									<img id="footer_logo" src="<?php if($settings_info!=null && isset($settings_info[0]->footer_logo_path) && $settings_info[0]->footer_logo_path != null){echo site_url($settings_info[0]->footer_logo_path);}?>">
								</div>

								<div class="col-md-12">
									<div class="row">
										<label class="btn btn-warning">
											<i class="fa fa-upload" aria-hidden="true"></i>
											Upload Footer Logo
											<input type="hidden" name="old_footer_logo" value="<?php if($settings_info!=null && isset($settings_info[0]->footer_logo_path) && $settings_info[0]->footer_logo_path != null){echo $settings_info[0]->footer_logo_path;}?>">
											<input type='file' name="footer_logo" onchange="previewFile('footer_logo',this)"  class="hidden row form-control" >
										</label>
									</div>
								</div>
							</div>
							<!-- footer logo end -->

							<!-- favicon start -->
							<div class="col-md-4">
								<div class="preview logo">
									<img id="footer favicon" src="<?php if($settings_info!=null && $settings_info[0]->favicon != null){echo site_url($settings_info[0]->favicon);}?>" alt="favicon">
								</div>

								<div class="col-md-12">
									<div class="row">
										<label class="btn btn-warning">
											<i class="fa fa-upload" aria-hidden="true"></i>
											Upload Favicon
											<input type="hidden" name="old_favicon" value="<?php if($settings_info!=null && isset($settings_info[0]->footer_logo_path) && $settings_info[0]->footer_logo_path != null){echo $settings_info[0]->footer_logo_path;}?>">
											<input type='file' name="favicon" onchange="previewFile('footer favicon',this)"  class="hidden row form-control" >
										</label>
									</div>
								</div>
							</div>
							<!-- favicon end -->

						</div>
					</div>
					<!-- logo end -->

					<div class="col-md-12">
						<br>
						<input type="submit" name="save" value="<?php if($settings_info!=null){echo 'Update';}else{echo 'Save';} ?>" class="btn btn-primary">
					</div>

				</form>
			</div>

			<div class="panel-footer">
				&nbsp;
			</div>
		</div>
	</div>
</div>



<div class="container-fluid">
    <div class="row">
		<div class="panel panel-default">
			<?php msg('msg2'); ?>
			<div class="panel-heading">
				Header & Footer Information
			</div>

			<div class="panel-body">
				<form action="<?php echo base_url("themesettings/settings/site_information"); ?>" method="post" enctype="multipart/form-data">				
					<!-- header_text, footer_text and site_name start -->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<label class="label_control mt-15">Site Name<span class="req"></span></label>
								<input type="text" name="site_name" class="form-control" value="<?php if($settings_info!=null && isset($settings_info[0]->site_name) && $settings_info[0]->site_name != null){echo $settings_info[0]->site_name;}?>" >
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<label class="label_control mt-15">Header Text<span class="req"></span></label>
								<textarea name="header_text" rows="6" class="form-control" ><?php if($settings_info!=null && isset($settings_info[0]->header_text) && $settings_info[0]->header_text != null){echo $settings_info[0]->header_text;}?></textarea>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<label class="label_control mt-15">Footer Text<span class="req"></span></label>
								<textarea name="footer_text" rows="6" class="form-control" ><?php if($settings_info!=null && isset($settings_info[0]->footer_text) && $settings_info[0]->footer_text != null){echo $settings_info[0]->footer_text;}?></textarea>
							</div>
						</div>
					</div>
					<!-- footer_text, footer_text and site_name end -->

					<div class="col-md-12">
						<br>
						<input type="submit" name="save" value="<?php if($settings_info!=null){echo 'Update';}else{echo 'Save';} ?>" class="btn btn-primary">
					</div>

				</form>
			</div>

			<div class="panel-footer">
				&nbsp;
			</div>
		</div>
	</div>
</div>


<script>
	// this script for img preview
	function previewFile(place,e) {
	  var preview = document.getElementById(place);
	  var file    = e.files[0];
	  var reader  = new FileReader();

	  reader.addEventListener("load", function () {
	    preview.src = reader.result;
	  }, false);

	  if (file) {
	    reader.readAsDataURL(file);
	  }
	}
</script>