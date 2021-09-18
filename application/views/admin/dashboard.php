<link href="https://fonts.googleapis.com/css?family=Cookie|Josefin+Sans|Satisfy&display=swap" rel="stylesheet">

<!--panel header start here-->
<div class="container-fluid">
    <div class="row">
        <div class="dashboard_header_wrapper">
            <h1 class="title">Deshboard</h1>
        </div>
    </div>
</div>
<!--panel header end here-->

<div class="container-fluid">
    <div class="row">
   	    <?php msg();?>
   	    <div class="dashboard_box_wrapper">
           <div class="dash-box dash-box-1">
              <span>Total Agent</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-2">
              <span>Total Customer</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-3">
              <span>Todays Booking</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-4">
              <span>Monthly Booking</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-5">
              <span>Monthly Booking</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-6">
              <span>Pending Booking</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-7">
              <span>Today's Delivered</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-8">
              <span>Today's Booking Charge</span>
              <h1><?=number_format(0)?></h1>
           </div>
        </div>
    </div>
</div>
