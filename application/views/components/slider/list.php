<style>
    .img_grid {
        margin-right: -10px;
        margin-left: -10px;
    }
    .img_grid > .col,
    .img_grid > [class*=col-] {
        padding-right: 10px;
        padding-left: 10px;
    }
    .img_box {
        border: 2px solid #eee;
        position: relative;
        height: 220px;
        overflow: hidden;
        margin-bottom: 15px;
    }
    .img_box img {
        object-fit: cover;
        height: 100%;
        width: 100%;
    }
    .img_box .img_cover {
        position: absolute;
        text-align: right;
        padding: 8px;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Slider</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <div class="row img_grid">
                    <?php if($slider){ foreach($slider as $key => $value){ ?>
                    <div class="col-lg-3 col-sm-4 col-xs-6">
                        <div class="img_box">
                            <img src="<?=site_url($value->path)?>" alt="">
                            <div class="img_cover">
                                <?php if($action_menus){
                                    foreach($action_menus as $action_menu){
                                        if($user_data['privilege']=='president' xor (!empty($aside_action_menu_array) && in_array($action_menu->id,$aside_action_menu_array) && $user_data['privilege']!=='president')){
                                        if(strtolower($action_menu->name) == "delete" ){?>
                                            <a class="btn btn-<?php echo $action_menu->type;?>" onclick="return confirm('Are your sure to proccess this action ?')"  href="<?php echo get_url($action_menu->controller_path."/".$value->id); ?>"><i class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                        <?php }else{ ?>
                                            <a class="btn btn-<?php echo $action_menu->type;?>"  href="<?php echo get_url($action_menu->controller_path."/".$value->id) ;?>"><i class="<?php echo $action_menu->icon;?>" aria-hidden="true"></i></a>
                                       <?php }}
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
