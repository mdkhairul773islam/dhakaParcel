<?php
    if($user_info->profile_verification!='complete'){
        if($user_info->profile_verification=='pending'){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully creat account.</p>
            <p>Please fill in the loan information then apply for loan.</p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } 
        if($user_info->profile_verification=='processing'){ ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <p>Dear <?php echo $user_info->name; ?>, your account has been processed.</p>
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } 
        if($user_info->profile_verification=='reject'){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>Dear <?php echo $user_info->name; ?>, your account has been rejected.</p>
            <p>Please Fill in the loan information.</p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } 
    }
?>