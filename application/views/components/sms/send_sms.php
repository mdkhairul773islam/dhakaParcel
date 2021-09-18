<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" />
<style>
    blockquote ol li {margin-bottom: 5px !important;}
    .clearfix {margin-bottom: 8px;}
    .right {
        display: inline-block;
        float: right;
    }
    p span .sms {
        margin-left: 5px;
        width: 50px;
        outline: none;
    }
    textarea {resize: vertical;}
    @media screen and (min-width: 992px) {
        .horizantal_button {margin-top: 25px;}
    }
    .table_group {
        max-height: 215px;
        overflow: auto;
    }
</style>

<div class="container-fluid" ng-controller="CustomSMSCtrl">
    <div class="row">
       <?php msg(); ?>
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Select SMS</h1>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <form action="" method="POST">
                        <div class="col-md-5 col-sm-6">
                            <label class="control-label">Select Menu</label>
                            <div class="form-group">
                                <select name="select" class="form-control selectpicker" data-show-subtext="true" data-live-search="true" required>
                                    <option selected disable>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6">
                            <label class="control-label">Sub Select</label>
                            <div class="form-group">
                                <div class="form-group">
                                    <select name="sub_select" class="form-control" required>
                                        <option selected disable>Select</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6">
                            <div class="form-group horizantal_button">
                                <input type="submit" value="Show" name="show" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Send SMS</h1>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('sms/sendSms/send_sms?system_id=NTZfMTA5');?>" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">SMS Address <span class="req">*</span></label>
                            <div class="form-group table_group">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                    </tr>
                                    <?php foreach ($members as $key => $value) { ?>
                                    <tr>
                                        <td><?php echo ucfirst($value->name); ?></td>
                                        <td>
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="mobile[]" value="<?php echo $value->mobile_no; ?>" checked /><?php echo $value->mobile_no; ?></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <label class="control-label">Message <span class="req">*</span></label>
                            <div class="form-group">
                                <textarea name="message" ng-model="msgContant" class="form-control" cols="30" rows="10" placeholder="Type your message" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="clearfix">
                                <p class="right">
                                    <span><strong>Total Characters : </strong>
                                        <input name="total_characters" ng-model="totalChar" class="sms text-right" type="text" >
                                    </span>
                                    &nbsp;
                                    <span><strong>Total Messages : </strong>
                                        <input class="sms text-right" name="total_messages" ng-model="msgSize" type="text" >
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <div class="btn-group">
                                <input type="submit" name="sendSms" value="Send SMS" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(function(){
        $('input[name="type"]').on('change', function(event) {
            if($(this).val()=="member"){
                $('#member_name').slideDown();
            }else{
                $('#member_name').slideUp();
            }
        });
    });

    $(function(){
        $('.selectpicker').selectpicker();
    });
</script>
<script>
(()=>{
    window.addEventListener('load', ()=>{
        let group_id          = document.querySelector('#group_id');
        let field_officer_id    = document.querySelector('#field_officer_id');

        field_officer_id.addEventListener('change', ()=>{
             var option = `<option value="" disable="true">--অন্য ফিল্ড অফিসার নির্বাচন করুন--</option>`;
            if(field_officer_id.value != ''){

                var formData = new FormData();
                formData.append('table', 'field_officers');
                formData.append('tableTo', 'groups');
                formData.append('join_condition', 'field_officers.id=groups.field_officer_id');
                formData.append('where', JSON.stringify({'field_officers.id':field_officer_id.value}));

                var oReq = new XMLHttpRequest();
                oReq.open("post", window.location.origin+'/Ajax/joinTable');
                oReq.send(formData);

                oReq.onload = function(){
                    setOption(JSON.parse(this.responseText));
                }

                function setOption(x){
                    option2 = '';
                    if(x)
                    x.forEach((value)=>{
                        option2 += `<option value="${value.id}">${value.name}</option>`;
                    });
                    group_id.innerHTML = (option2 != '' ? option2 : option);
                }
            }
        });

    });
})()
</script>
