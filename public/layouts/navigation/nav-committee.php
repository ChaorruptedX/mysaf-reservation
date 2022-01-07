<nav class="sidenav">
    <a class="<?= active_url(["b031910250", "mysaf-reservation", "public", "committee", "index.php"]); ?>" href="<?= constant("BASEURL") . 'public/committee/index.php' ?>">Home</a>
    <a class="<?= active_url(["user-management.php", "register-user.php"]); ?>" href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>">User Management</a>
    <a class="<?= active_url("create-reservation.php"); ?>" href="<?= constant("BASEURL") . 'public/committee/create-reservation.php' ?>">User Management</a>
    <a href="#list-of-reservation">List of Reservation</a>
    <a href="#my-account">My Account</a>
    <a class="<?= active_url("logout.php"); ?>" href="<?= constant("BASEURL") . 'public/logout.php' ?>">Logout</a>
</nav>