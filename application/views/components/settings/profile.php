<style>
    .message{
        border: 1px solid #ddd;
        border-radius: 10px;
        display: none;
        background: #E99126;
        color: #fff;
        padding: 15px;
        margin-top: 15px;
        text-align: center;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>
                       <?php
                         if($this->data['privilege'] == "super"){
                           echo ucwords($this->data['privilege'])." Admin Profile";
                         }else{
                           echo ucwords($this->data['privilege'])." Profile";
                         }
                         ?>
                      </h1>
                </div>
            </div>

            <div class="panel-body no-padding">

                <h3 style="padding: 0 15px; margin: 15px 0;">
                    Profile : <strong><?php echo $profile_info[0]->name; ?></strong>
                </h3>
                <br>            

                <!-- left side -->
                <aside class="col-md-3">
                    <div class="border-top">&nbsp;</div>
                    <figure class="profile-pic">
                        <img style="margin-bottom: 0;" src="<?php echo site_url($profile_info[0]->image)?>" alt="Photo not found!" class="img-responsive img-thumbnail" style="width: 100%;">
                    </figure>
                    <br>
                </aside>


                <div class="col-md-9">

                      <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile </a></li>
                    </ul>

                  <!-- Tab panes -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="col-xs-12 profile-title no-padding">
                                <div class="col-xs-6">
                                    <h3 class="pull-left" style="margin-bottom: 20px;">
                                    <i class="glyphicon glyphicon-user" style="font-size: 30px;"></i> &nbsp;
                                    About
                                    </h3>
                                </div>
                            </div>



                            <!-- Pop Up Edit Password -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel"> Change Password</h4>
                                    </div>

                                    <div class="model-body" style="margin-top: 20px;">

                                        <form action="" id="edit_form" class="form-horizontal">

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Old Password  <span class="req">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="password" name="current_pass" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">New Password<span class="req">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="password" name="new_pass" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Confirm Password<span class="req">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="password" name="conf_pass" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="pull-right">
                                                        <input class="btn btn-primary" type="submit" value="Save">
                                                    </div>
                                                </div>
                                            </div>

                                        </form>

                                        
                                        
                                        <div class="col-md-12">
                                            <div class="message"></div>
                                        </div>
                                    </div>

                                    <div class="model-footer">&nbsp;</div>
                                </div>
                              </div>
                            </div>
                            <!-- End Edit Password-->




                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Name</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile_info[0]->name; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Username </label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile_info[0]->username; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Email</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile_info[0]->email; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Mobile Number</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile_info[0]->mobile; ?></p>
                                    </div>
                                </div>

                                 <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Privilege</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile_info[0]->privilege; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Showroom</label>
                                    <div class="col-xs-7">
                                        <p><?php echo filter($profile_info[0]->branch); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 7px;margin-left: 13px;">
                                <a class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" href="#"><i class="fa fa-pencil"></i>&nbsp; Edit Password</a>
                                <a class="btn btn-primary"  href="<?php echo site_url("settings/editProfile?id=".$this->session->userdata()['user_id']);?>"><i class="fa fa-pencil"></i>&nbsp; Edit Profile</a>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="projects">2</div>

                        <div role="tabpanel" class="tab-pane" id="photos">
                            <div>
                              <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
                              <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
                              <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
                              <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="friends">4</div>
                        <div role="tabpanel" class="tab-pane" id="groups">5</div>
                  </div>
                </div>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('submit','#edit_form', function(ev){
            var New_pass=$('input[name="new_pass"]').val();
            var conf_pass=$('input[name="conf_pass"]').val();
            var Current_pass=$('input[name="current_pass"]').val();
            $.ajax({
                url: '<?php echo base_url("settings/profile/edit_password"); ?>',
                type: 'POST',
                data: {new_pass: New_pass,conf_pass: conf_pass,current_pass: Current_pass}
            })
            .done(function(response){
                $(".message").fadeIn();
                $(".message").html(response);
                $('input[name="new_pass"]').val("");
                $('input[name="conf_pass"]').val("");
                $('input[name="current_pass"]').val("");
                console.log(response);

            });
             ev.preventDefault();
        });


        });


</script>
