<style>
    .bootstrap-select.btn-group .dropdown-menu li {max-width: 420px;}
    .btn {
        padding-right: 12px;
        padding-left: 12px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Prodcut</h1>
                </div>
            </div>
            <div class="panel-body">
                <?php /*
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[id]" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabled>Select Product</option>
                                    <?php if(!empty($all_product)) foreach($all_product as $row){ ?>
                                    <option value="<?=($row->id)?>"><?=($row->title)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[cat_id]" ng-model="cat_id" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabled>Select Category</option>
                                    <?php if(!empty($categories)) foreach($categories as $row){ ?>
                                    <option value="<?=($row->id)?>"><?=($row->category)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[sub_cat_id]" id="sub_cat_id" class="form-control" data-live-search="true">
                                    <option value="" selected disabled>Select Sub-Category</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Filter">
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                */ ?>
                <?php msg(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th width="40">SL</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th width="150" class="text-right">Action</th>
                    </tr>

                    <?php if(!empty($all_product)){ foreach($all_product as $key => $row){ ?>
                    <tr>
                        <td><?=(++$key)?></td>
                        <td><?=($row->title)?></td>
                        <td><?=($row->category)?></td>
                        <td><?=($row->subcategory)?></td>
                        <td class="text-right">
                            <a class="btn btn-danger" onclick="return confirm('Are your sure to proccess this action ?')"  href="<?php echo site_url("product/product/trash/".$row->id); ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <a class="btn btn-success"  href="<?php echo site_url("/product/product/edit/".$row->id) ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } } ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
