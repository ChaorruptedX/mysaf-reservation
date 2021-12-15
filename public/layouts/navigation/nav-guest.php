<nav class="topnav">
    <div class="container">
        <a class="<?= active_url(["b031910250", "mysaf-reservation", "public", "index.php"]); ?>" href="<?= constant("BASEURL") . 'public/index.php' ?>">Home</a>
        <a class="<?= active_url("contactus.php"); ?>" href="<?= constant("BASEURL") . 'public/contactus.php' ?>">Contact</a>
        <a class="<?= active_url("aboutus.php"); ?>" href="<?= constant("BASEURL") . 'public/aboutus.php' ?>">About</a>
        <a class="<?= active_url("login.php"); ?>" href="<?= constant("BASEURL") . 'public/login.php' ?>" style="float: right;">Login</a>

        <!-- Temporary Link for Assignment 2 Presentation Purpose -->
        <a class="<?= active_url(["user-management.php", "register-user.php"]); ?>" href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>">User Management</a>
        <a class="<?= active_url("reservation.php"); ?>" href="<?= constant("BASEURL") . 'public/user/reservation.php' ?>">Reservation</a>
    </div>
</nav>