<nav class="sidenav">
    <a class="<?= active_url(["b031910250", "mysaf-reservation", "public", "committee", "index.php"]); ?>" href="<?= constant("BASEURL") . 'public/committee/index.php' ?>">Home</a>
    <a class="<?= active_url(["user-management.php", "register-user.php"]); ?>" href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>">User Management</a>
    <a class="<?= active_url("create-reservation.php"); ?>" href="<?= constant("BASEURL") . 'public/committee/create-reservation.php' ?>">Create Reservation</a>
    <a class="<?= active_url("list_reservation.php"); ?>" href="<?= constant("BASEURL") . 'public/committee/list_reservation' ?>">List Reservation</a>
    <a class="<?= active_url("my-committee-acc.php"); ?>" href="<?= constant("BASEURL") . 'public/committee/my-committee-acc.php' ?>">My Account</a>
    <a class="<?= active_url("logout.php"); ?>" href="<?= constant("BASEURL") . 'public/logout.php' ?>">Logout</a>
</nav>