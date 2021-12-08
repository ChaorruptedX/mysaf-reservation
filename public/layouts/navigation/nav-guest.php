<nav class="topnav">
    <div class="container">
        <a class="<?= active_url("index.php"); ?>" href="<?= constant("BASEURL") . 'public/index.php' ?>">Home</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a class="<?= active_url("login.php"); ?>" href="<?= constant("BASEURL") . 'public/login.php' ?>" style="float: right;">Login</a>
        <a class="<?= active_url("user-management.php"); ?>" href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>">User Management</a>
    </div>
</nav>