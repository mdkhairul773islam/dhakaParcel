<style>
    fieldset {
        border: 1px solid #3A3F51;
        padding: 5px 12px 0;
        margin: 8px 0 10px;
    }
    legend {
        background-color: #3A3F51;
        margin-bottom: 0;
        font-size: 17px;
        color: #fff;
        font-weight: 500;
        width: auto;
        padding: 2px 10px;
        display: inline-block;
    }
    fieldset ul li strong {
        display: inline-block;
        min-width: 120px;
    }
    fieldset ul li {
        border-bottom: 1px solid #ccc;
        min-width: calc(220px - 20px);
        display: inline-block;
        margin: 2px 10px;
        width: calc(50% - 20px);
        padding: 5px 0;
    }
    fieldset ul::after {
        width: calc(100% - 20px);
        display: inline-block;
        content: '';
        height: 1px;
        left: 10px;
        top: 0;
        background: #ccc;
        position: absolute;
    }
    fieldset ul {
        margin-bottom: 15px;
        position: relative;
        display: flex;
        flex-wrap: wrap;
        margin-left: -10px;
        margin-right: -10px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>View Booking Parcel</h1>
                </div>
            </div>
            <div class="panel-body">
                <fieldset>
                    <legend>Parcel Information</legend>
                    <ul>
                        <li><strong>Invoice</strong> : 20211115-00036</li>
                        <li><strong>Booking Date</strong> : 28/11/2021</li>
                        <li><strong>Delivery Type</strong> : Office Delivery</li>
                        <li><strong>Sender Branch</strong> : Main Branch</li>
                        <li><strong>Receiver Branch</strong> : Uttara Branch</li>
                    </ul>
                </fieldset>

                <fieldset>
                    <legend>Payment Information</legend>
                    <ul>
                        <li><strong>Total Amount</strong> : Upto 1 kg</li>
                        <li><strong>Vat Amount(15.0000 %)</strong> : 130</li>
                        <li><strong>Discount Total</strong> : 130</li>
                        <li><strong>Grand Total</strong> : 130</li>
                        <li><strong>Net Amount</strong> : 130</li>
                        <li><strong>Paid Amount</strong> : 130</li>
                        <li><strong>Due Amount</strong> : 130</li>
                    </ul>
                </fieldset>

                <fieldset>
                    <legend>Sender Information</legend>
                    <ul>
                        <li><strong>Sender Name</strong> : Aminur Islam</li>
                        <li><strong>Sender Phone</strong> : 01910217482</li>
                        <li><strong>Sender NID</strong> : Mymensingh</li>
                        <li><strong>Sender Address</strong> : Mymensingh</li>
                        <li><strong>Sender Divisiuon</strong> : Mymensingh</li>
                        <li><strong>Sender District</strong> : Mymensingh</li>
                        <li><strong>Sender Upazila/Thana</strong> : Mymensingh</li>
                        <li><strong>Sender Area</strong> : Mymensingh</li>
                    </ul>
                </fieldset>

                <fieldset>
                    <legend>Receiver Information</legend>
                    <ul>
                        <li><strong>Receiver Name</strong> : Aminur Islam</li>
                        <li><strong>Receiver Phone</strong> : 01910217482</li>
                        <li><strong>Receiver Address</strong> : Mymensingh</li>
                        <li><strong>Receiver Divisiuon</strong> : Mymensingh</li>
                        <li><strong>Receiver District</strong> : Mymensingh</li>
                        <li><strong>Receiver Upazila/Thana</strong> : Mymensingh</li>
                        <li><strong>Receiver Area</strong> : Mymensingh</li>
                    </ul>
                </fieldset>

                <fieldset>
                    <legend>Item Information</legend>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL. No.</th>
                                <th>Item Category </th>
                                <th>Item Name </th>
                                <th>Unit </th>
                                <th>Unit Rate </th>
                                <th>Quantity </th>
                                <th>Total Rate </th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>গাড়ির যন্ত্রাংশ</td>
                                <td>কার গ্লাস (সামনের)</td>
                                <td>Pcs</td>
                                <td>900.0000</td>
                                <td>1.00</td>
                                <td>900.0000</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>মেডিক্যাল ইকুপমেন্ট ও ঔষধ আইটেম</td>
                                <td>ও টি টেবিল</td>
                                <td>Pcs</td>
                                <td>2500.0000</td>
                                <td>1.00</td>
                                <td>2500.0000</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>ইলেক্ট্রনিক্স আইটেম</td>
                                <td>রঙিন টেলিভিশন (সাধারনের জন্য) প্রতি ইঞ্চি</td>
                                <td>Pcs</td>
                                <td>20.0000</td>
                                <td>10.00</td>
                                <td>200.0000</td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>