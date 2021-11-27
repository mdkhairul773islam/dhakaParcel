<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Create New Service Area Setting</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php msg(); ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Service Area <span class="req">*</span></label>
                                <select name="districts" class="form-control" data-live-search="true" required>
                                    <option value="" selected disabled>Select Service Area</option>
                                    <option value="0"></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Upto 1 kg <span class="req">*</span></label>
                                <input type="text" name="upto_kg_1" placeholder="Upto 1 kg" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">1 kg to 2 kg <span class="req">*</span></label>
                                <input type="text" name="upto_kg_2" placeholder="1 kg to 2 kg" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">2 kg to 3 kg <span class="req">*</span></label>
                                <input type="text" name="upto_kg_3" placeholder="2 kg to 3 kg" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">3 kg to 4 kg <span class="req">*</span></label>
                                <input type="text" name="upto_kg_4" placeholder="3 kg to 4 kg" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">4 kg to 5 kg <span class="req">*</span></label>
                                <input type="text" name="upto_kg_5" placeholder="4 kg to 5 kg" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">5 kg to 6 kg <span class="req">*</span></label>
                                <input type="text" name="upto_kg_6" placeholder="5 kg to 6 kg" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <input type="submit" value="Submit" class="btn btn-success">
                            <input type="reset" value="Reset" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>