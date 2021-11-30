<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Edit District</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Name </label>
                                <input type="text" name="name" value="<?= $district->name; ?>"
                                    placeholder="District Name" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Service Area </label>
                                <select name="service_area_code" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Service Area</option>
                                    <?php
                                        if(!empty($service_area)){
                                            foreach($service_area as $area){
                                    ?>
                                    <option
                                        <?= ($district->service_area_code==$area->service_area_code ? 'selected': ''); ?>
                                        value="<?= $area->service_area_code;?>"><?= $area->name; ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Home Delivery </label>
                                <select name="home_delivery" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Delivery</option>
                                    <option <?= ($district->home_delivery=='No' ? 'selected': ''); ?> value="No"
                                        selected>No</option>
                                    <option <?= ($district->home_delivery=='Yes' ? 'selected': ''); ?> value="Yes">Yes
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Lock Down Service </label>
                                <select name="lock_down_service" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Delivery</option>
                                    <option <?= ($district->lock_down_service=='No' ? 'selected': ''); ?> value="No"
                                        selected>No</option>
                                    <option <?= ($district->lock_down_service=='Yes' ? 'selected': ''); ?> value="Yes">
                                        Yes
                                    </option>
                                </select>
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