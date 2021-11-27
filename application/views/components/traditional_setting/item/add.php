<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Item</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Item category<span class="req">*</span></label>
                                <select name="category" class="form-control">
                                    <option value="" selected disabeld>Select Category</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Item Name<span class="req">*</span></label>
                                <input type="text" name="item_name" placeholder="Item Name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Unit<span class="req">*</span></label>
                                <select name="unit" class="form-control">
                                    <option value="" selected disabeld>Select Unit</option>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">OD Rate<span class="req">*</span></label>
                                <input type="text" name="od_rate" placeholder="OD Rate" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">HD Rate<span class="req">*</span></label>
                                <input type="text" name="hd_rate" placeholder="HD Rate" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Transit OD <span class="req">*</span></label>
                                <input type="text" name="transit_od" placeholder="Transit OD" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Transit HD<span class="req">*</span></label>
                                <input type="text" name="transit_hd" placeholder="Transit HD" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Save" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>