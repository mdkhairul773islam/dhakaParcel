<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit Service Area</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" name="name" value="<?= $service_area->name; ?>"
                                    placeholder="Service Area Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">COD Charge % </label>
                                <input type="number" name="cod_charge" value="<?= $service_area->cod_charge; ?>"
                                    placeholder="COD Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Default Charge </label>
                                <input type="number" name="default_charge" value="<?= $service_area->default_charge; ?>"
                                    placeholder="Default Charge" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Weight Type </label>
                                <select name="weight_type" class="form-control selectpicker" data-live-search="true"
                                    required>
                                    <option value="" selected disabled>Weight Type</option>
                                    <?php 
                                        if(!empty($unitList)){
                                            foreach($unitList as $unit){
                                    ?>
                                    <option <?= ($service_area->weight_type==$unit->name ? 'selected' : '') ?>
                                        value="<?= $unit->name; ?>"><?= $unit->name; ?></option>
                                    <?php } }?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Details </label>
                                <textarea name="details" class="form-control" placeholder="Service Area Details"
                                    required><?= $service_area->details; ?></textarea>
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