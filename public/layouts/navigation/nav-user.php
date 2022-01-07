<nav class="topnav">
    <div class="container">
        <a class="<?= active_url(["b031910250", "mysaf-reservation", "public", "user", "index.php"]); ?>" href="<?= constant("BASEURL") . 'public/user/index.php' ?>">Home</a>
        <a href="#my-reservation">My Reservation</a>
        <a href="#history">History</a>
        <a href="#my-account">My Account</a>
        <a class="<?= active_url("logout.php"); ?>" href="<?= constant("BASEURL") . 'public/logout.php' ?>" style="float: right;">Logout</a>
    </div>
</nav>