<div class="container-fluid">
    <div class="row">
        <!-- horizontal form -->
        <?php
            msg();
            $attribute = ['class' => 'form-horizontal'];
            echo form_open_multipart('', $attribute);
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Create New Profile</h1>
                </div>
            </div>

            <div class="panel-body no-padding">

                <div class="no-title">&nbsp;</div>
                <!-- left side -->
                <aside class="col-md-3">
                    <img id="img-view" src="<?php echo site_url("private/images/pic-male.png"); ?>"
                        alt="Photo not found!" class="img-responsive img-thumbnail" style="width: 100%;">

                    <div class="profile-upload">
                        <label class="btn btn-primary" style="display: block;" for="img-input"><i
                                class="fa fa-cloud-upload"></i> Upload</label>
                        <input type="file" name="image" required id="img-input" style="display: none;">
                    </div>
                    <br />
                </aside>

                <div class="col-md-9">
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Name<span class="req">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="text" name="f_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Mobile Number<span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="mobile" class="form-control">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Email<span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Username <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="username" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Password<span class="req">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Confirm Password<span class="req">*</span></label>
                        <div class="col-md-7">
                            <input class="form-control" type="password" name="confirmPassword">
                        </div>
                    </div>
                    <?php
                        $privilege = $this->session->userdata['privilege'];
                    ?>
                    <div class="form-group">
                        <label for="" class="col-md-3 control-label">Privilege<span class="req">*</span></label>
                        <div class="col-md-7">
                            <select name="privilege" class="form-control" required="">
                                <option value="" selected disabled>Select Privilege</option>
                                <?php if($privilege=='president' || $privilege=='super'){?>
                                <option value="super">Super Admin</option>
                                <?php } ?>
                                <option value="admin">Agent</option>
                                <option value="user">Deliveryman</option>
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
                                
                            ?>
                            <select name="zone[]" class="form-control selectpicker" data-live-search="true" multiple>
                                <option value="" selected disabled>Select Zone</option>
                                <option value="">None</option>
                                <?php 
                                    foreach($filter_zone as $key => $zone){
                                ?>
                                <option value="<?php echo $zone; ?>"><?php echo $zone; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-7">
                            <div class="btn-group pull-right">
                                <input class="btn btn-primary" type="submit" name="createProfileBtn" value="Save">
                                <input class="btn btn-danger" type="reset" value="Clear">
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