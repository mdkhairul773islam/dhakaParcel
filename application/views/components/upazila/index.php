<style>
    .modal .control-label {text-align: right;}
    .modal .form-group {
        display: inline-block;
        margin-bottom: 10px;
        width: 100%;
    }
    .form-group {margin-bottom: 0;}
</style>
<?php $allUpazillas = readTable('upazillas', [], ['orderBy'=>['name', 'ASC']]); ?>
<?php $allDistricts = readTable('districts', [], ['orderBy'=>['name', 'ASC']]); ?>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?=(!empty($edit) ? 'Edit' : 'All')?> Upazila</h1>
                    <button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target=".modal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel"><?=(!empty($edit) ? 'Edit' : 'Add')?> Upazila</h4>
                        </div>
                        <div class="modal-body" style="min-height: 120px;">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">Upazila Name <span class="req">*</span></label>
                                                <div class="col-xs-8">
                                                    <input class="form-control" type="text" name="name" value="<?=((!empty($edit) ? $edit->name : ''))?>" placeholder="Upazila Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-xs-4 control-label">District Name <span class="req">*</span></label>
                                                <div class="col-xs-8">
                                                    <select class="form-control selectpicker"  name="district_id" data-live-search="true" required>
                                                        <option value="" selected disabled>Select District</option>
                                                        <?php if($allDistricts) foreach ($allDistricts as $row) { ?>
                                                        <option value="<?=($row->id)?>" <?=(!empty($edit) ? ($row->id==$edit->district_id?'selected':'') : '')?>><?=($row->name)?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Shipping Cost </label>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="shipping_cost" value="<?=((!empty($edit) ? $edit->shipping_cost : 0))?>" placeholder="Shipping cost" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group text-right">
                                            <input type="submit" class="btn btn-info" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <?php msg(); ?>

                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Upazila <span class="req">*</span></label>
                                <select name="id" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="" selected disabled>Select District</option>
                                    <?php if($allUpazillas) foreach ($allUpazillas as $row) { ?>
                                    <option value="<?=($row->id)?>"><?=($row->name)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="btn-group">
                                <label>&nbsp;</label>
                                <input type="submit" class="btn btn-info" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <?php if(empty($edit)){ ?>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>Upazila</th>
                        <th>District</th>
                        <th>Shipping</th>
                        <th width="160" class="text-right">Action</th>
                    </tr>
                    <?php if($upazillas) foreach($upazillas as $key=>$row) { ?>
                    <tr>
                        <td><?=(++$key)?></td>
                        <td><?=($row->name)?></td>
                        <td><?=($row->district_name)?></td>
                        <td><?=($row->shipping_cost)?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?=site_url('upazila/Upazila/edit/'.$row->id)?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger"  href="<?=site_url('upazila/Upazila/delete/'.$row->id)?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <?php } ?>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<?php if(isset($edit)){ ?>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>
<?php } ?>
