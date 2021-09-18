<div class="user_aside">
    <h3><?=(user()->name)?></h3>
    <ul class="user_menu">
        <li><a href="<?=site_url('user-panel/dashboard')?>" class="nav-link <?= ($aside=='dashboard' ? 'active' : '') ?>">Dashboard</a></li>
        <li><a href="<?=site_url('user-panel/booking')?>" class="nav-link <?= ($aside=='booking' ? 'active' : '') ?>">Booking</a></li>
        <li><a href="<?=site_url('user-panel/booking_list')?>" class="nav-link <?= ($aside=='booking_list' ? 'active' : '') ?>">Booking List</a></li>
        <li><a href="<?=site_url('user-panel/profile')?>" class="nav-link <?= ($aside=='profile' ? 'active' : '') ?>">Profile</a></li>
    </ul>
    <a href="<?=site_url('logout')?>" class="btn logout_btn">Logout</a>
</div>