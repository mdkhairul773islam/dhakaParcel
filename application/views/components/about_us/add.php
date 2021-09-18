<style media="screen">
    @media screen and (min-width: 992px) {
        .about_img {
            width: calc(100% - 30px);
            position: absolute;
            left: 15px;
        }
    }
    .about_img img {
        max-width: 100%;
        width: auto;
    }
</style>


<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>About Us</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photos &nbsp;</label>
                        <div class="col-md-7">
                            <input type="file" name="img" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <div class="about_img">
                                <?php if($about && $about->path){ ?>
                                    <img src="<?=site_url($about->path)?>" alt="">
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Description <span class="req">*</span></label>
                        <div class="col-md-7">
                            <textarea  name="description" rows="15"  placeholder="Enter Description..." class="form-control" id="mytextarea"><?=($about ? $about->description : '')?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="pull-right">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
</div>
