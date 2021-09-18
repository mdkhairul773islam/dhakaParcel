<div class="container-fluid none" style="margin-bottom: 10px;">
    <div class="row">	
		<a href="<?php echo site_url('system_aside_menu/actionMenuController/add'); ?>" class="btn btn-default create">
			Create
		</a>
		<a href="<?php echo site_url('system_aside_menu/actionMenuController'); ?>" class="btn btn-default list">
    		List
		</a>
		<a href="<?php echo site_url('system_aside_menu/actionMenuController/trash_list'); ?>" class="btn btn-default trash_list">
    		Trash List
		</a>
        <a href="<?php echo site_url('system_aside_menu/actionMenuController/alignment');?>" class="btn btn-default alignment">
            <i class="fa fa-angle-right"></i>
            Alignment
        </a>
    </div>
</div>

<script>
    // this script activate the nav and aside dropdown menu
    var nav_active = "<?php echo $menu_dropdown_selector; ?>";
    nav_active     = document.querySelectorAll('.'+nav_active);
    nav_active.forEach((value, index)=>{
        value.classList.add('active');
    });
</script>