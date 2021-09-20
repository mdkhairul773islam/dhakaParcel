
<div class="container-fluid none" <?php echo $subMenu; ?> style="margin-bottom: 10px;">
    <div class="row">
        <?php if(ck_action("sms_menu","send-sms")){ ?>
		<a href="<?php echo site_url('sms/sendSms'); ?>" class="btn btn-default" id="send-sms">			
		    Send SMS
		</a>
		<?php } ?>
		
		<?php if(ck_action("sms_menu","custom-sms")){ ?>
		<a href="<?php echo site_url('sms/sendSms/send_custom_sms'); ?>" class="btn btn-default" id="custom-sms">
			Custom SMS
		</a>
		<?php } ?>
		
        <?php if(ck_action("sms_menu","sms-report")){ ?>
		<a href="<?php echo site_url('sms/sendSms/sms_report'); ?>" class="btn btn-default" id="sms-report">
			SMS Report
		</a>
		<?php } ?>
    </div>
</div>