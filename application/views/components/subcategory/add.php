<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Sub-Category</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category <span class="req">*</span></label>
                        <div class="col-md-7">
                            <select name="cat_id" class="form-control selectpicker" data-live-search="true">
                                <option value="" selected disabled>Select a Category</option>
                                <?php if(!empty($categories)) foreach($categories as $key=>$row) { ?>
                                    <option value="<?=($row->id)?>"><?=($row->category)?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label">Name <span class="req">*</span></label>
                        <div class="col-md-7">
                            <input type="text" name="subcategory" placeholder="Enter Sub-Category Name..." class="form-control" required>
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
</div>
