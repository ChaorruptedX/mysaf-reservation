<nav class="topnav">
    <div class="container">
        <a class="<?= active_url(["b031910250", "mysaf-reservation", "public", "index.php"]); ?>" href="<?= constant("BASEURL") . 'public/index.php' ?>">Home</a>
        <a class="<?= active_url("contactus.php"); ?>" href="<?= constant("BASEURL") . 'public/contactus.php' ?>">Contact</a>
        <a class="<?= active_url("aboutus.php"); ?>" href="<?= constant("BASEURL") . 'public/aboutus.php' ?>">About</a>
        <a class="<?= active_url("login.php"); ?>" href="<?= constant("BASEURL") . 'public/login.php' ?>" style="float: right;">Login</a>
    </div>
</nav>