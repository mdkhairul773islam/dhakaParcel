<script src="<?php echo site_url('private/js/ng-controller/addProductFn.js'); ?>"></script>
<div class="container-fluid" ng-controller="addProductFn">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Add Product</h1>
                </div>
            </div>
            <div class="panel-body" ng-cloak>
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Title <span class="req">*</span></label>
                                <input type="text" name="title" placeholder="Enter Product Title..."
                                       class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Category <span class="req">*</span></label>
                                <select name="cat_id" ng-model="cat_id" class="form-control selectpicker"
                                        data-live-search="true" required>
                                    <option value="" selected disabled>Select Category</option>
                                    <?php if (!empty($categories)) foreach ($categories as $row) { ?>
                                        <option value="<?= ($row->id) ?>"><?= ($row->category) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Sub-Category <small style="display: none">(<span
                                                id="total_cat">0</span>)</small></label>
                                <select name="sub_cat_id" class="form-control" id="sub_cat_id" data-live-search="true">
                                    <option value="" selected disabled>Select Sub-Category</option>
                                    <option value="0" >NAN</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
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

