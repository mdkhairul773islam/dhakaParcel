<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Service</h1>
                </div>
            </div>
            <div class="panel-body">
                 <?php msg(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th width="50">SL</th>
                        <th>Img</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="115">Action</th>
                    </tr>
                    <?php if($services){ foreach($services as $key => $value){ ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><img src="<?=(site_url($value->path))?>" alt="" height="35" width="40"></td>
                        <td><?php echo isset($value->title) ? $value->title : ''; ?></td>
                        <td><?php echo isset($value->description) ? substr($value->description,0,40) : ''; ?>..</td>
                        <td>
                            <a class="btn btn-warning" href="<?php echo get_url("service/service/edit/{$value->id}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="<?php echo get_url("service/service/delete/{$value->id}"); ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }} ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>