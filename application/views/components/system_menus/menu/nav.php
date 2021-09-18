<div class="container-fluid none" style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('system_aside_menu/menuController/add'); ?>" class="btn btn-default create">
			Create
		</a>
		<a href="<?php echo site_url('system_aside_menu/menuController'); ?>" class="btn btn-default list">
    		List
		</a>
		<a href="<?php echo site_url('system_aside_menu/menuController/trash_list'); ?>" class="btn btn-default trash_list">
    		Trash List
		</a>
		<a href="<?php echo site_url('system_aside_menu/menuController/alignment'); ?>" class="btn btn-default alignment">
    		Alignment
		</a>
    </div>
</div>

<script>
    // this script activate the nav and aside dropdown menu
    var nav_active = "<?php echo $menu_dropdown_selector; ?>";
    nav_active     = document.querySelectorAll("a."+nav_active);
    nav_active.forEach((value, index)=>{
        value.classList.add('active');
    });
</script>