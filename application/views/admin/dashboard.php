<link href="https://fonts.googleapis.com/css?family=Cookie|Josefin+Sans|Satisfy&display=swap" rel="stylesheet">
<style>
    .dashboard_header_wrapper .title {margin: 10px 0 !important;}
</style>


<!--panel header start here-->
<div class="container-fluid">
    <div class="row">
        <div class="dashboard_header_wrapper">
            <h1 class="title">
                <?php 
                    if($this->session->userdata['privilege']=='super' || $this->session->userdata['privilege']=='president'){
                        echo "Super";
                    }elseif($this->session->userdata['privilege']=='admin'){
                        echo "Agent";
                    }elseif($this->session->userdata['privilege']=='user'){
                        echo "Delivery Man";
                    }else{
                        echo "";
                    }
                ?>
                Deshboard
            </h1>
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


<!--E-Courier Parcel Information-->
<div class="container-fluid">
    <div class="row">
        <div class="dashboard_header_wrapper">
            <h1 class="title">E-Courier Parcel Information</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
   	    <?php msg();?>
   	    <div class="dashboard_box_wrapper">
           <div class="dash-box dash-box-1">
              <span>Today Pickup Request</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-2">
              <span>Today Pickup Done</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-3">
              <span>Today Pickup Pending</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-4">
              <span>Today Pickup Cancel</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-5">
              <span>Today Delivery Parcel</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-6">
              <span>Today Delivery Done</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-7">
              <span>Today Delivery Pending</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-8">
              <span>Today delivery Cancel</span>
              <h1><?=number_format(0)?></h1>
           </div>
           
           <div class="dash-box dash-box-9">
              <span>Total Delivery Parcel</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-10">
              <span>Total Delivery Done</span>
              <h1><?=number_format(0)?></h1>
           </div>
           
           <div class="dash-box dash-box-11">
              <span>Total Delivery Pending</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-1">
              <span>Total Delivery Cancel</span>
              <h1><?=number_format(0)?></h1>
           </div>
           
           <div class="dash-box dash-box-2">
              <span>Total Collection Amount</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-3">
              <span>Paid To Account</span>
              <h1><?=number_format(0)?></h1>
           </div>
           
           <div class="dash-box dash-box-4">
              <span>Balance Amount</span>
              <h1><?=number_format(0)?></h1>
           </div>
        </div>
    </div>
</div>


<!--Traditional Parcel Information-->
<div class="container-fluid">
    <div class="row">
        <div class="dashboard_header_wrapper">
            <h1 class="title">Traditional Parcel Information</h1>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
   	    <?php msg();?>
   	    <div class="dashboard_box_wrapper">
           <div class="dash-box dash-box-1">
              <span>Today Delivery Parcel</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-2">
              <span>Today Booking Parcels</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-3">
              <span>Today Reject Parcels</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-4">
              <span>Total Delivery Parcel</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-5">
              <span>Total Booking Parcels</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-6">
              <span>Total Reject Parcels</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-7">
              <span>Delivery Collection Amount</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-8">
              <span>Booking Collection Amount</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-9">
              <span>Total Collection Amount</span>
              <h1><?=number_format(0)?></h1>
           </div>

           <div class="dash-box dash-box-10">
              <span>Total Accounts Amount</span>
              <h1><?=number_format(0)?></h1>
           </div>
        </div>
    </div>
</div>
