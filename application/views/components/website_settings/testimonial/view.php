<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>All Testimonial</h1>
                </div>
                <a href="<?= get_url('/website_settings/testimonial/index'); ?>" class="pull-right btn btn-success m-0" style="font-size: 12px;">
                    <i class="fa fa-pencil "></i> Add Testimonial
                </a>
            </div>
            <div class="panel-body">
                 <?php msg(); ?>
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th width="300">Description</th>
                        <th width="115" class="text-right">Action</th>
                    </tr>

                    <?php if($testimonial){ foreach($testimonial as $key => $value){ ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><img src="<?=(site_url($value->path))?>" alt="" height="35" width="40"></td>
                        <td><?php echo isset($value->name) ? $value->name : ''; ?></td>
                        <td><?php echo isset($value->designation) ? $value->designation : ''; ?></td>
                        <td><?php echo isset($value->description) ? substr($value->description,0,40) : ''; ?>..</td>
                        <td class="text-right">
                            <a class="btn btn-warning" href="<?php echo get_url("website_settings/testimonial/edit/{$value->id}"); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a class="btn btn-danger" href="<?php echo get_url("website_settings/testimonial/delete/{$value->id}"); ?>" onclick="return confirm('Are your sure to proccess this action ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php }} ?>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
