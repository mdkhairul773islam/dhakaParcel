<div class="panel panel-default">
    <div class="panel-heading panal-header">
        <div class="panal-header-title pull-left">
            <h1>Add Payment Method</h1>
        </div>
    </div>

    <div class="panel-body">
        <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-md-3 control-label">Method Name<span class="req">&nbsp;*</span></label>
                <div class="col-md-5">
                    <input type="text" name="method" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Number </label>
                <div class="col-md-5">
                    <input type="text" name="number" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Method Type</label>

                <div class="col-md-5">
                    <select name="type" class="form-control">
                        <option value="personal">Personal</option>
                        <option value="agent">Agent</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Method Logo</label>

                <div class="col-md-5">
                    <input type="file" id="img" onchange="fileLoadFn(this)" name="img">    
                </div>
            </div>     

            <div class="col-md-8">
                <div class="btn-group pull-right">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </div>
        </form>           
    </div>

    <div class="panel-footer">&nbsp;</div>
</div>