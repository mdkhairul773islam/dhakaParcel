<style>
    .gallery_area {position: relative;}
    .gallery_content {
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
    }
    .gallery_content iframe,
    .gallery_content img {
        border: none;
        width: 100%;
    }
    .gallery_content .image_box {
        border: 1px solid #ccc;
        margin-bottom: 40px;
        position: relative;
    }
    .gallery_content .img_cover {
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
        text-align: right;
    }
    .mce-edit-area {border-width: thin !important;}
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Pages</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <label class="control-label mb-1">Pages <span class="req">*</span></label>
                            <select name="title" id="page" class="form-control">
                                <option value="">Select A Option</option>
                                <option value="terms_condition">Terms and Condition</option>
                                <option value="privacy_policy">Privacy Policy</option>
                                <option value="loan_policy">Loan Policy</option>
                                <option value="return_policy">Return Policy</option>
                                <option value="help_support">Help and Support</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="gallery_area">
                                <div class="gallery_content">
                                    <div class="hide img_show">
                                        <div class="image_box">
                                            <img class="img_path" src="" alt="">
                                            <div class="img_cover">
                                                <a class="btn btn-danger img_delete"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-8">
                            <label class="control-label mb-1">Description <span class="req">*</span></label>
                            <textarea id="mytextarea" name="description"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="0" id="page_id" >
                    <div class="row">
                        <div class="col-md-10 text-right">
                            <input type="submit" id="submit_btn"  class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: '#mytextarea',
        height : "300"
    });

    (()=>{
        var page = read('#page');
        page.addEventListener('change', ()=>{
            axios.post(url+'website_settings/pages/getContent', makeFormData({title:page.value}))
            .then(response=>{
                if((response.data).length){
                    console.log(response.data);
                    tinymce.get('mytextarea').setContent(response.data[0].description);
                }
                else {
                   tinymce.get('mytextarea').setContent(''); 
                }
            })
            .catch(err=>console.log(err));
        });
    })()
</script>