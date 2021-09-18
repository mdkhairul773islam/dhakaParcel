<style>
    .form-group {
        margin-bottom: 0;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title">
                    <h1 class="pull-left"><?=(!empty($edit) ? 'Edit' : 'Add')?> District</h1>
                    <button class="btn btn-primary pull-right" type="button" data-toggle="modal" data-target=".modal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
            </div>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="gridSystemModalLabel"><?=(!empty($edit) ? 'Edit' : 'Add')?> District</h4>
                        </div>
                        <div class="modal-body" style="min-height: 120px;">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">District Name <span class="req">*</span></label>
                                            <input type="text" name="name" placeholder="District Name" value="<?=(!empty($edit) ? $edit->name : '')?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="control-label">&nbsp;</label>
                                            <input type="submit" class="btn btn-info" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php msg(); if(empty($edit)){ ?>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">District Name <span class="req">*</span></label>
                                <select name="id" class="form-control selectpicker" data-live-search="true" required>
                                    <option value="" selected disabled>Select District</option>
                                    <?php
                                        $allDistrict = readTable('districts', [], ['orderBy'=>['name', 'ASC']]);
                                        if($allDistrict) foreach ($allDistrict as $row) {
                                    ?>
                                        <option value="<?=($row->id)?>"><?=($row->name)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1 pl-1">
                            <div class="btn-group">
                                <label>&nbsp;</label>
                                <input type="submit" class="btn btn-info" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>District Name</th>
                        <th width="160" class="text-right">Action</th>
                    </tr>
                    <?php if($districts) foreach($districts as $key=>$row){ ?>
                    <tr>
                        <td><?=(++$key)?></td>
                        <td><?=($row->name)?></td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?=site_url('district/District/edit/'.$row->id)?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure Delete This Data??')" href="<?=site_url('district/District/delete/'.$row->id)?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            <?php } ?>
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