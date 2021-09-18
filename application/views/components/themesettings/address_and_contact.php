<style>
	.preview{
		display: inline-block;
		padding: 4px;
		border-radius: 6px;
		overflow: hidden;
		max-width: 200px;
		min-height: 50px;
		width: 100%;
		background: #ccc;
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
				Address And Contact
			</div>

			<div class="panel-body">
				<form action="<?php echo base_url("themesettings/settings/address_and_contact"); ?>" method="post" enctype="multipart/form-data">
					
					<!-- address start -->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<label class="label-control mt-15">Address<span class="req"></span></label>
								<textarea name="address" class="form-control" ><?php if($settings_info!=null && $settings_info[0]->address != null){echo $settings_info[0]->address;}?></textarea>
							</div>
						</div>
					</div>
					<!-- address end -->

					<!-- phone start -->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<label class="label-control mt-15">Phone<span class="req"></span></label>
								<textarea name="phone" class="form-control" ><?php if($settings_info!=null && $settings_info[0]->phone != null){echo $settings_info[0]->phone;}?></textarea>
							</div>
						</div>
					</div>
					<!-- phone end -->

					<!-- email start -->
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<label class="label-control mt-15">E-mail<span class="req"></span></label>
								<textarea name="email" class="form-control" ><?php if($settings_info!=null && $settings_info[0]->email != null){echo $settings_info[0]->email;}?></textarea>
							</div>
						</div>
					</div>
					<!-- email end -->

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
