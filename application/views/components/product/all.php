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
