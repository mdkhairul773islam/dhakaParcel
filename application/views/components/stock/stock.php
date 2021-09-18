<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Stock</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[id]"  class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabled>Select Product</option>
                                    <?php if(!empty($allProducts)) foreach($allProducts as $row){ ?>
                                        <option value="<?=($row->id)?>"><?=($row->title)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[brand_id]" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabled>Select Brand</option>
                                    <?php if(!empty($brands)) foreach($brands as $row){ ?>
                                        <option value="<?=($row->id)?>"><?=($row->brand)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[cat_id]" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabled>Select Category</option>
                                    <?php if(!empty($categories)) foreach($categories as $row){ ?>
                                        <option value="<?=($row->id)?>"><?=($row->category)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="search[sub_cat_id]" class="form-control selectpicker" data-live-search="true">
                                    <option value="" selected disabled>Select Sub-Category</option>
                                    <?php if(!empty($subcategories)) foreach($subcategories as $row){ ?>
                                        <option value="<?=($row->id)?>"><?=($row->subcategory)?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Search">
                            </div>
                        </div>
                    </div>
                </form>

                <hr style="margin-top: 0;"/>

                <table class="table table-bordered">
                    <tr>
                        <th width="50" class="text-center">SL</th>
                        <th>Product</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>SubCategory</th>
                        <th>Purchase Price</th>
                        <th>Sale Price</th>
                        <th>Quantity</th>
                    </tr>
                    <?php
                        $total_qty = 0;
                        if(!empty($stock)) foreach($stock as $key=>$row){
                            $total_qty += $row->quantity;

                    ?>
                    <tr>
                        <td class="text-center"><?=(++$key)?></td>
                        <td><?=($row->title)?></td>
                        <td><?=($row->brand)?></td>
                        <td><?=($row->category)?></td>
                        <td><?=($row->subcategory ? $row->subcategory : 'M/A')?></td>
                        <td><?=($row->purchase_price)?></td>
                        <td><?=($row->sale_price)?></td>
                        <td><?=($row->quantity)?></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="7" class="text-right">Total</th>
                        <th><?=number_format($total_qty,2)?></th>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
