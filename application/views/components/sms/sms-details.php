<!-- one column page main container start here -->
<div class="column global-pad">
    <div class="row">
        <table>
        	<tr>
        		<th>S.L</th>
        		<th> Date</th>
        		<th> Time</th>
        		<th>Receiver</th>
        		<th>Message</th>
        		<th>SMS Length</th>
        		<th>Delivery Report</th>
        	</tr>
        	<tr>
        		<th colspan="7">&nbsp;</th>
        	</tr>
        	<tr>
        		<td>1</td>
        		<td><?php echo $details[0]->delivery_date; ?></td>
        		<td><?php echo $details[0]->delivery_time; ?></td>
        		<td><?php echo $details[0]->mobile; ?></td>
        		<td><?php echo str_replace('%0A',' ',$details[0]->message); ?></td>
        		<td><?php echo $details[0]->total_characters; ?> Characters </td>
        		<td>
        		<?php
        		 $status_arr=json_decode($details[0]->delivery_report,TRUE);        		
        		 $status_arr['result']['status'];
        		 if($status_arr['result']['status']==0)
        		 {
        		  echo "Successfully Send SMS.";
        		 }
        		 else
        		 {
        		  echo"Error";

                         }        		
                        ?>
        		</td>
        	</tr>
        	<tr>
        		<th colspan="7">&nbsp;</th>
        	</tr>
        	<tr>
        		<td colspan="5">&nbsp;</td>
        		<td>Total SMS</td>
        		<td><?php echo $details[0]->total_messages;?></td>
        		
        	</tr>
        	<tr>
        		<td colspan="5">&nbsp;</td>
        		<td>Total Cost</td>
        		<td> 
        		  <?php 
        		      $total=($details[0]->total_messages * 0.60);
        		      echo $details[0]->total_messages ." X 0.60"." = ".$total."TK";
        		   ?>
        		 </td>
        		
        	</tr>
        </table>
    </div>
</div>

<!-- one column page main container here -->