<style>
    .file-upload {
        width: 100%;
        margin-bottom: 12px;
    }
    .file-upload .image-upload-wrap {
        padding: 20px 20px 25px;
        border: 2px dashed #ccc;
        position: relative;
        width: 100%;
        height: 175px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    .file-upload .image-upload-wrap input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100% !important;
        height: 100% !important;
        outline: none;
        opacity: 0;
        left: 0;
        top: 0;
        cursor: pointer;
    }
    .file-upload .image-upload-wrap h5 {
        text-transform: uppercase;
        color: #232323;
        margin-bottom: 0;
        font-size: 14px;
    }
    .file-upload .image-upload-wrap i {
        font-size: 45px;
        line-height: 40px;
        color: #00A8FF;
    }
    .file-upload .file-upload-content {
        padding: 2px;
        border: 2px dashed #ccc;
        height: 175px;
        display: none;
        position: relative;
        text-align: center;
    }
    .file-upload .file-upload-content img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .file-upload .file-upload-content .remove-image {
        cursor: pointer;
        line-height: 32px;
        height: 32px;
        width: 32px;
        text-align: center;
        position: absolute;
        top: 2px;
        right: 2px;
        font-size: 20px;
        color: #fff;
        background: #00A8FF;
        transition: all 0.2s ease;
        outline: none;
        border: none;
    }
    .file-upload .file-upload-btn {
        cursor: pointer;
        width: 100%;
        height: 40px;
        line-height: 36px;
        font-weight: 500;
        color: #00A8FF;
        background: none;
        font-size: 14px;
        border: 2px dashed #ccc;
        transition: all 0.2s ease;
        outline: none;
        text-transform: uppercase;
        margin-top: 3px;
    }
    input[type=checkbox] {
        vertical-align: middle;
        margin: 0;
        display: inline-block;
    }
    .edit_img {
        position: absolute;
        object-fit: cover;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Slider</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg();?>
                <?php $id = isset($slider[0]->id) ? $slider[0]->id : ''; ?>
                <form action="<?php echo get_url("slider/slider_controller/edit_process/$id"); ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <label class="control-label">Photos <span class="req">*</span> Image Size (1660X720)</label>
                            <div class="form-group">
                                <div class="file-upload">
                                    <div class="image-upload-wrap">
                                        <input type="hidden" name="old_img" value="<?php echo isset($slider[0]->path) ? $slider[0]->path : ''; ?>" >
                                        <input class="file-upload-input" type="file" name="img" accept="image/*" required>
                                        <img class="edit_img" src="<?php echo site_url($slider ? $slider[0]->path : '')?>" alt="">
                                        <div class="title">
                                            <i class="fa fa-upload"></i>
                                            <h5>Drag files to upload</h5>
                                            <h5>Or</h5>
                                            <h5>Click here</h5>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image" src="#" alt="your image">
                                        <button type="button" class="remove-image"><i class="fa fa-close"></i></button>
                                    </div>
                                    <button class="file-upload-btn" type="button">Click here</button>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>

<script>
    function cl(x){
        return document.getElementsByClassName(x);
    }
    /* image upload script start */
    var file_upload_input  = document.getElementsByClassName('file-upload-input'),
    file_upload_inputL = file_upload_input.length,
    i                  = 0;

    for(i; i<file_upload_inputL; i++){
        file_upload_input[i].setAttribute('onchange', "set_for_upload("+i+",this)");
        cl('remove-image')[i].setAttribute('onclick', "removeUpload("+i+")");
        cl('file-upload-btn')[i].setAttribute('onclick', "file_upload_btn("+i+")");
    }

    // this event for file upload btn
    function file_upload_btn(index){
        file_upload_input[index].click();
    }

    function set_for_upload(index,e){
        var file                                       = URL.createObjectURL(e.files[0]);
        cl('file-upload-image')[index].src             = file;
        cl('image-upload-wrap')[index].style.display   = 'none';
        cl('file-upload-content')[index].style.display = 'block';
    }

    function removeUpload(index) {
        cl('file-upload-input')[index].value           = null;
        cl('file-upload-content')[index].style.display = "none";
        cl('image-upload-wrap')[index].style.display   = 'block';
    }
</script>
