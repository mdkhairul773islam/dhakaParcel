<style>
    .message_info {
        flex-wrap: wrap;
        display: flex;
        width: 100%;
    }
    .message_info li {
        margin: 8px 0 !important;
        align-items: flex-start;
        padding-right: 15px;
        min-width: 400px;
        display: flex;
        width: 100%;
    }
    .message_info li strong {
        display: inline-block;
        min-width: 200px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading panal-header">
                <div class="panal-header-title pull-left">
                    <h1>Show Message</h1>
                </div>
            </div>
            <div class="panel-body">
                <ul class="message_info">
                    <li><strong>Name</strong> : <?= $message[0]->name ?></li>
                    <li><strong>Mobile</strong> : <?= $message[0]->mobile ?></li>
                    <li><strong>Email</strong> : <?= $message[0]->email ?></li>
                    <li><strong>Message</strong> : <?= $message[0]->message ?></li>
                </ul>
            </div>
            <div class="panel-footer">&nbsp;</div>
        </div>
    </div>
</div>
