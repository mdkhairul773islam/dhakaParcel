<div class="container-fluid">
    <div class="row">
        <?php
        msg();
        $attribute = array('class' => 'form-horizontal');
        echo form_open_multipart('settings/editProfile?id='.$this->input->get('id'), $attribute);
    ?>
        <input type="hidden" name="img_url" value="<?php echo $profile[0]->image; ?>">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Account</h1>
                </div>
            </div>

            <div class="panel-body">
                <h2 style="padding: 0 15px; margin: 15px 0;">
                    Profile: <strong><?php echo $profile[0]->name; ?></strong>
                </h2>
                <br>

                <!-- left side -->
                <aside class="col-md-3">
                    <img id="img-view" src="<?php echo site_url($profile[0]->image); ?>" alt="Photo not found!" class="img-responsive img-thumbnail" style="width: 100%;">
                    <div class="profile-upload">
                        <label class="btn btn-primary" style="display: block;" for="img-input"><i
                                class="fa fa-cloud-upload"></i> Upload</label>
                        <input type="file" name="image" id="img-input" style="display: none;">
                    </div><br/>
                </aside>


                <div class="col-md-9">
                    <div class="form-group">
                        <label for="" class="col-sm-3 col-xs-12 control-label">Name </label>
                        <div class="col-sm-7 col-xs-10">
                            <input type="text" name="f_name" class="form-control"
                                value="<?php echo $profile[0]->name; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 col-xs-12 control-label">Mobile Number </label>
                        <div class="col-sm-7 col-xs-10">
                            <input type="text" name="mobile" value="<?php echo $profile[0]->mobile; ?>"
                                class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 col-xs-12 control-label">Email</label>
                        <div class="col-sm-7 col-xs-10">
                            <input type="email" name="email" value="<?php echo $profile[0]->email; ?>"
                                class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-3 col-xs-12 control-label">User Name </label>
                        <div class="col-sm-7 col-xs-10">
                            <input type="text" name="username" value="<?php echo $profile[0]->username; ?>" readonly
                                class="form-control" placeholder="username">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Privilege</label>
                        <div class="col-md-7">
                            <select name="privilege" class="form-control">
                                <option value="">Select Privilege</option>
                                <option value="super" <?php if($profile[0]->privilege=='super'){echo "selected"; } ?>>Super Admin</option>
                                <option value="admin" <?php if($profile[0]->privilege=='admin'){echo "selected"; } ?>>Agent</option>
                                <option value="user" <?php if($profile[0]->privilege=='user'){echo "selected"; } ?>>Delivery Man</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Zone<span class="req">*</span></label>
                        <div class="col-md-7">
                            <?php 

                                $zone_list = get_result('upazilas', '', 'name as zone', '', 'name', 'ASC');
                                $alredy_zone_has_list = get_result('user_zones', '', 'zone','zone');

                                $zone = [];
                                foreach($alredy_zone_has_list as $row){
                                    $zone [] = $row->zone;
                                }
                                $filter_zone = [];
                                foreach($zone_list as $row){
                                    $filter_zone [] = $row->zone;
                                }
                                foreach($zone as $zone_name){
                                    unset($filter_zone[array_search($zone_name, $filter_zone)]);
                                }


                                $zone_list_orginal = get_result('upazilas', '', 'name', '', 'name', 'ASC');
                                $get_user_zone_list = get_result('user_zones', ['user_id'=> $profile[0]->id], 'zone', '', 'zone', 'ASC');
                                
                                $user_zone = [];
                                foreach($get_user_zone_list as $zone){
                                    $user_zone[] = $zone->zone;
                                }
                            ?>
                            <select name="zone[]" class="form-control selectpicker" data-live-search="true" multiple>
                                <option value="" selected disabled>Select Zone</option>
                                <option value="">None</option>
                                <?php
                                    $zone_list_zone = [];
                                    foreach($zone_list_orginal as $key => $row){
                                        if(in_array($row->name, $user_zone)){
                                ?>
                                <option <?php 
                                        echo (in_array($row->name, $user_zone) ? 'selected' : '');    
                                    ?> value="<?php echo $row->name; ?>"><?php echo $row->name; ?></option>
                                <?php } }?>

                                <?php 
                                    foreach($filter_zone as $key => $zone){
                                ?>
                                <option value="<?php echo $zone; ?>"><?php echo $zone; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-xs-12 control-label"></label>
                        <div class="col-sm-7 col-xs-10">
                            <div class="btn-group pull-right">
                                <input class="btn btn-success" type="submit" name="profileEditBtn" value="Update">
                                <!--input class="btn btn-danger" type="reset" value="Clear"-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>

        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var reader = new FileReader();
        $("#img-input").change(function(ev) {
            var file = ev.target.files[0];
            if (file) {
                reader.readAsDataURL(file);
            }
            $(reader).load(function() {
                var imgURL = reader.result;
                $("#img-view").attr({
                    src: imgURL
                });
            });
        });
    });
</script>