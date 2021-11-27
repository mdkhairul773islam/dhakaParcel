<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Item</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Item category<span class="req">*</span></label>
                                <select name="item_category_name" class="form-control selectpicker"
                                    data-live-search="true">
                                    <option value="" selected disabled>Select Category</option>
                                    <?php 
                                        if(!empty($categoryList)){
                                            foreach($categoryList as $key => $row){
                                    ?>
                                    <option
                                        <?= ($item_data->item_category_name == $row->category_code ? 'selected': '')?>
                                        value="<?= $row->category_code; ?>">
                                        <?= $row->category_name; ?>
                                    </option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Item Name<span class="req">*</span></label>
                                <input type="text" name="item_name" value="<?= $item_data->item_name; ?>"
                                    placeholder="Item Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Unit<span class="req">*</span></label>
                                <select name="unit" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabeld>Select Unit</option>
                                    <?php 
                                        if(!empty($unitList)){
                                            foreach($unitList as $row){
                                    ?>
                                    <option <?= ($item_data->unit == $row->name ? 'selected': '')?>
                                        value="<?= $row->name; ?>"><?= $row->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">OD Rate<span class="req">*</span></label>
                                <input type="text" name="od_rate" value="<?= $item_data->od_rate; ?>"
                                    placeholder="OD Rate" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">HD Rate<span class="req">*</span></label>
                                <input type="text" name="hd_rate" value="<?= $item_data->hd_rate; ?>"
                                    placeholder="HD Rate" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Transit OD <span class="req">*</span></label>
                                <input type="text" name="transit_od" value="<?= $item_data->transit_od; ?>"
                                    placeholder="Transit OD" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Transit HD<span class="req">*</span></label>
                                <input type="text" name="transit_hd" value="<?= $item_data->transit_hd; ?>"
                                    placeholder="Transit HD" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" name="update" value="Update" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>