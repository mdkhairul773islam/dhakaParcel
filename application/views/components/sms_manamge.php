<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>SMS</h1>
                </div>
            </div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Total: </th>
                        <td><?=config_item('total_sms')?></td>
                        
                        <th> Total Send: </th>
                        <td>
                            <?php
                            
                            $total_sms      = config_item("total_sms");
                            $total_send_sms = $this->db->query("SELECT COUNT(*) AS total_send_sms FROM sms_record WHERE delivery_report=1")->row();
                            $total_send_sms = (!empty($total_send_sms->total_send_sms) ? $total_send_sms->total_send_sms : 0);
                            
                             echo $total_send_sms;
                            ?>
                        </td>
                        <th>Remaining: </th>
                        <td><?=($total_sms - $total_send_sms)?></td>
                    </tr>
                </table>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>