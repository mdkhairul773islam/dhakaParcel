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
</style>
<div class="container-fluid">
    <div class="row">
		<div class="panel panel-default">
			<?php msg('msg'); ?>
			<div class="panel-heading">
				Social Media
			</div>

			<div class="panel-body">
				<form action="<?php echo base_url("themesettings/settings/social_media"); ?>" method="post" enctype="multipart/form-data">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td>Select Media</td>
								<td>Your Media Link</td>
								<td width="120">Action</td>
							</tr>
						</thead>
						<tbody  id="item_container">
							
						<?php 
							// if social media field not empty exicute if condition else exicute else condition
							if($settings_info != null && !empty($settings_info[0]->social_media) && $settings_info[0]->social_media != null){
								$social_media = json_decode($settings_info[0]->social_media, true);
								
								if($social_media != null){
								foreach ($social_media as $key => $value) {
						?>
								<tr>
									<td>
										<select name="media_name[]" class="form-control" required >
											<!-- here option value must be matched with fontawesome 4.7 icon -->
											<option disabled >--Select Media Type--</option>
											<option <?php if('facebook'   == $key){echo 'selected';} ?> value="facebook">Facebook</option>
											<option <?php if('twitter'    == $key){echo 'selected';} ?> value="twitter">Twitter</option>
											<option <?php if('google-plus'== $key){echo 'selected';} ?> value="google-plus">Google+</option>
											<option <?php if('youtube'    == $key){echo 'selected';} ?> value="youtube">Youtube</option>
											<option <?php if('linkedin'   == $key){echo 'selected';} ?> value="linkedin">Linkdin</option>
											<option <?php if('pinterest-p'== $key){echo 'selected';} ?> value="pinterest-p">Penterest</option>
											<option <?php if('instagram'  == $key){echo 'selected';} ?> value="instagram">Instagram</option>
											<option <?php if('skype'      == $key){echo 'selected';} ?> value="skype">Skype</option>
											<option <?php if('tumblr'     == $key){echo 'selected';} ?> value="tumblr">Tumblr</option>
										</select>
									</td>
									<td>
										<input type="text" name="media_link[]" value="<?php echo $value; ?>" class="form-control" required >
									</td>
									
									<td>
										<button type="button" class="btn btn-danger remove"><i class="fa fa-close"></i></button>
										<a class="btn btn-danger" onclick="return confirm('Are you sure to delete this data?')" href="<?php echo site_url('themesettings/settings/social_media_delete/'.$key); ?>">
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
						<?php }}}else{ ?>
							<tr>
								<td>
									<select name="media_name[]" class="form-control" required >
										<option selected disabled readonly >--Select Media Name--</option>
										<option value="facebook">Facebook</option>
										<option value="twitter">Twitter</option>
										<option value="google-plus">Google+</option>
										<option value="youtube">Youtube</option>
										<option value="linkedin">Linkdin</option>
										<option value="pinterest-p">Penterest</option>
										<option value="instagram">Instagram</option>
										<option value="skype">Skype</option>
										<option value="tumblr">Tumblr</option>
									</select>
								</td>
								<td>
									<input type="text" placeholder="Enter Your Link.." name="media_link[]" class="form-control" required >
								</td>
								
								<td>
									<button type="button" class="btn btn-danger remove"><i class="fa fa-close"></i></button>
								</td>
							</tr>
							<?php } ?>
						</tbody>
						
					</table>
					
					<input type="submit" name="save" class="btn btn-primary" value="<?php if($settings_info != null){echo 'Update';}else{echo 'Save';} ?>">
					<button  type="button" class="btn btn-success" id="add"><i class="fa fa-plus"></i></button>
					
				</form>
			</div>

			<div class="panel-footer">
				&nbsp;
			</div>
		</div>
	</div>
</div>


<script>
	/*select container*/
	var	item_container = document.getElementById("item_container"),
		clone          = item_container.lastElementChild,
		add_btn 	   = document.getElementById("add");

	add_btn.addEventListener("click", clone_function);

	function clone_function(){
		clone = clone.cloneNode(true);
		item_container.appendChild(clone);

		var lastChild_children      = item_container.lastElementChild.children,
			_length         		= lastChild_children.length-1,
			i              			= 0;

		for(i; i<_length; i++){
			lastChild_children[i].children[0].value='';
		}

		var remove = document.getElementsByClassName("remove"),
			removeL= remove.length;

		for(var i = 1; i<removeL; i++){
			remove[i].addEventListener("click", remove_parent);

			function remove_parent() {
				var parent = this.parentElement.parentElement;
					parent.setAttribute("id", "deleted");
				
				var child = document.getElementById("deleted");

				this.parentElement.parentElement.parentElement.removeChild(child);
			}
		}
	}

</script>	