<!DOCTYPE html>
<html lang="en" ng-app="MainApp">
    <head>
        <?php $site_info = read('header'); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="Keywords" content="<?php echo isset($meta_keyword) ? $meta_keyword : ''; ?>">
        <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : ''; ?>">

        <title><?php echo ucwords($meta_title); ?></title>
        <!-- favicon -->
        <link rel="icon" href="<?php echo site_url(isset($site_info) ? $site_info[0]->fev_icon : ''); ?>" type="image/x-icon" />
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo site_url('private/css/bootstrap.min.css'); ?>" rel="stylesheet">
    
        <style>
            *, *::after, *::before {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            .print_header img {max-height: 65px;}
            .table td, .table th {
                padding: 5px !important;
                font-size: 13px;
            }
            .print_header h3 {
                letter-spacing: 2px;
                color: #FF0000;
                margin: 0;
                font-size: 21px;
                font-weight: bold;
            }
            .print_header p {margin: 0;}
            .print_header {
                justify-content: space-between;
                align-items: flex-stat;
                text-align: center;
                display: flex;
                margin: 10px 0 20px;
                padding-bottom: 10px;
                border-bottom: 2px solid #FF0000;
            }
            li {list-style-type: none;}
            li strong {
                display: inline-block;
                min-width: 65px;
            }
            .print_info li {
                min-width: 220px;
                width: 33.33%;
            }
            .print_info {
                flex-wrap: wrap;
                display: flex;
            }
            .customer_info {
                justify-content: space-between;
                display: flex;
                margin: 15px 0 10px;
                align-items: flex-start;
            }
            .customer_info img {
                max-width: 165px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="print_header">
                <img src="<?php echo site_url('private/images/logo.png') ?>" alt="">
                <div class="title">
                    <h3>Dhaka Parcel</h3>
                    <p><strong>Head Office : </strong> 48/1, Yosuf Mansion (1st floor), Motijheel C/A, Dhaka-1000</p>
                    <p><strong>Hot Line :</strong> 01912441630, 01713634913</p>
                </div>
                <h5>Customer Copy</h5>
            </div>
            <ul class="print_info">
                <li><strong>Service Type</strong> : Office Delivery</li>
                <li><strong>Booking Date</strong> : 26-Nov-2021</li>
                <li><strong>Parcel No</strong> : METTROSESE20211126-00002</li>
            </ul>

            <div class="customer_info">
                <ul>
                    <li><strong>From </strong> : Mymensingh</li>
                    <li><strong>Address</strong> : Mymensingh</li>
                    <li><strong>Phone</strong> : 01910217482</li>
                </ul>
                <div class="barcode_img">
                    <img src="<?php echo site_url('private/images/barcode.png') ?>" alt="">
                </div>
                <ul>
                    <li><strong>To </strong> : Mymensingh</li>
                    <li><strong>Address</strong> : Mymensingh</li>
                    <li><strong>Phone</strong> : 01910217482</li>
                </ul>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 45px;" class="text-center">SL.No</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Description</th>
                        <th style="width: 100px;" class="text-center">Unit</th>
                        <th style="width: 100px;" class="text-center">Unit Rate</th>
                        <th style="width: 90px;" class="text-center">Quantity</th>
                        <th style="width: 100px;" class="text-right">Total Rate</th>
                    </tr>
                    <tr>
                        <td class="text-center">01</td>
                        <td class="text-center">Books and stationery</td>
                        <td class="text-center">Book Sample Packet</td>
                        <td class="text-center">Packet</td>
                        <td class="text-center">600.00</td>
                        <td class="text-center">100.00</td>
                        <td class="text-right">6900.00</td>
                    </tr>
                    <tr>
                        <th colspan="4" rowspan="10" style="vertical-align: middle;">Total Bill Amount : Three Hundred Taka Only</th>
                        <th class="text-right" colspan="2">Total Amount</th>
                        <th class="text-right">6900.00</th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="2">Vat Amount (15.0000 %)</th>
                        <th class="text-right">6900.00</th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="2">Discount Total</th>
                        <th class="text-right">6900.00</th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="2">Grand Total</th>
                        <th class="text-right">230.00</th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="2">Net Amount</th>
                        <th class="text-right">230.00</th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="2">Paid Amount</th>
                        <th class="text-right">230.00</th>
                    </tr>
                    <tr>
                        <th class="text-right" colspan="2">Due Amount</th>
                        <th class="text-right">230.00</th>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>