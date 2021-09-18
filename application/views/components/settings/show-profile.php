<div class="container-fluid">
    <div class="row">

        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                  <h1>
                     <?php
                       if($profile[0]->privilege == "super"){
                         echo ucwords($profile[0]->privilege)." Admin Profile";
                       }else{
                         echo ucwords($profile[0]->privilege)." Profile";
                       }
                       ?>
                  </h1>
                </div>
            </div>

            <div class="panel-body">

                <h3 style="padding: 0 15px; margin: 15px 0;">
                    Profile : <strong><?php echo $profile[0]->name; ?></strong>
                </h3>
                <br>

                <!-- left side -->
                <aside class="col-md-3">
                    <div class="border-top">&nbsp;</div>
                    <figure class="profile-pic">
                          <img style="margin-bottom: 0;" src="<?php echo site_url($profile[0]->image)?>" alt="Photo not found!" class="img-responsive img-thumbnail" style="width: 100%;">
                    </figure>
                    <br/>
                </aside>


                <div class="col-md-9">

                      <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                      </ul>
                  <!-- Tab panes -->

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="col-xs-12 profile-title no-padding">
                                <div class="col-sm-10 col-xs-9">
                                    <h3 style="margin-bottom: 20px;"><i class="glyphicon glyphicon-user" style="font-size: 30px;"></i> &nbsp; About</h3>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Name </label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile[0]->name; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">User Name </label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile[0]->username; ?></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Email</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile[0]->email; ?></p>
                                    </div>
                                </div>


                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Mobile Number</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile[0]->mobile; ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <label class="control-label col-xs-5">Privilege</label>
                                    <div class="col-xs-7">
                                        <p><?php echo $profile[0]->privilege; ?></p>
                                    </div>
                                </div>

                                

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
