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
                    <h1>Parcel Information View</h1>
                </div>
            </div>
            <div class="panel-body">
                <fieldset>
                    <legend>Parcel Information</legend>
                    <ul>
                        <li><strong>Invoice</strong> : 20211115-00036</li>
                        <li><strong>Date</strong> : 28/11/2021</li>
                    </ul>

                    <fieldset>
                        <legend>Parcel Charge</legend>
                        <ul>
                            <li><strong>Weight Package</strong> : Upto 1 kg</li>
                            <li><strong>Weight Charge</strong> : 130</li>
                            <li><strong>Delivery Charge</strong> : 130</li>
                            <li><strong>Total Charge</strong> : 130</li>
                        </ul>
                    </fieldset>

                    <fieldset>
                        <legend>Merchant Information</legend>
                        <ul>
                            <li><strong>Name</strong> : Aminur Islam</li>
                            <li><strong>Contact</strong> : 01910217482</li>
                            <li><strong>Address</strong> : Mymensingh</li>
                        </ul>
                    </fieldset>

                    <fieldset>
                        <legend>Customer Information</legend>
                        <ul>
                            <li><strong>Name</strong> : Aminur Islam</li>
                            <li><strong>Contact</strong> : 01910217482</li>
                            <li><strong>Address</strong> : Mymensingh</li>
                        </ul>
                    </fieldset>

                    <fieldset>
                        <legend>Pickup Branch Information</legend>
                        <ul>
                            <li><strong>Pickup Date</strong> : 10/10/2021</li>
                            <li><strong>Name</strong> : Aminur Islam</li>
                            <li><strong>Contact Number</strong> : 01910217482</li>
                        </ul>
                    </fieldset>

                    <fieldset>
                        <legend>parcel Log</legend>
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 45px;">SL</th>
                                <th style="width: 65px;">Date</th>
                                <th style="width: 10%">Time</th>
                                <th>Status </th>
                                <th>To (Action)</th>
                                <th>From</th>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>15/11/2021</td>
                                <td>18:40:58</td>
                                <td>Pickup Complete</td>
                                <td>Pickup Branch : Main Branch</td>
                                <td></td>
                            </tr>
                        </table>
                    </fieldset>
                </fieldset>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>