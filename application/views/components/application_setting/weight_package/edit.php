<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Weight Package</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>

                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" name="name" value="<?= $weight_package->name; ?>"
                                    placeholder="Weight Package Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Title </label>
                                <input type="text" name="title" value="<?= $weight_package->title; ?>"
                                    placeholder="Weight Package Title" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Weight Type </label>
                                <select name="weight_type" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Weight Type</option>
                                    <option <?= ($weight_package->weight_type=='kg' ? 'selected' : ''); ?> value="kg"
                                        selected>KG</option>
                                    <option <?= ($weight_package->weight_type=='cft' ? 'selected' : ''); ?> value="cft">
                                        CFT
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Details </label>
                                <textarea name="details" class="form-control" placeholder="Weight Package Details"
                                    required><?= $weight_package->details; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">Rate </label>
                                <input type="number" name="rate" value="<?= $weight_package->rate; ?>"
                                    placeholder="Weight Package Rate" class="form-control" required>
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