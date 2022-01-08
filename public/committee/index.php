<?php require_once ('../layouts/header.php'); committeeSession(); ?>
<div>
<br>
    <h1>Committee Dashboard</h1>
</div>
<div class="main-part">
    <h2> System User </h2>
    <hr>
    <div class="box">
        <div class="icon-part"><br>
            <img src ="<?= constant("BASEURL") . 'assets/image/user-icon.png' ?>"alt="User Icon" width="50" height="50"/><br>
            <small>Members</small>
            <p>985</p>
        </div>
        <div class="card-content-part">
            <a href="#">More Details </a>
        </div>
    </div>

    <div class="box box-green">
        <div class="icon-part"><br>
        <img src ="<?= constant("BASEURL") . 'assets/image/admin-icon.png' ?>"alt="admin Icon" width="50" height="50"/><br>
                <small>System Admin</small>
            <p>2</p>
        </div>
        <div class="card-content-part">
            <a href="#">More Details </a>
        </div>
    </div>

    <div class="box box-pink">
        <div class="icon-part"><br>
        <img src ="<?= constant("BASEURL") . 'assets/image/committee-icon.jpg' ?>"alt="Committee Icon" width="50" height="50"/><br>
            <small>Mosque Committee</small>
            <p>11</p>
        </div>
        <div class="card-content-part">
            <a href="#">More Details </a>
        </div>
    </div>

    <br>
    <h2>Saf Reservation</h2>
    <hr>
    <div class="box-saf">
        <div class="icon-part"><br>
        <img src ="<?= constant("BASEURL") . 'assets/image/saf-icon.png' ?>"alt="User Icon" width="50" height="50"/><br>
        <h4> 20 January 2022 </h4>
            <small>Total Reservation</small>
            <p>130 / 200</p>
        </div>
        <div class="card-content-saf">
            <a href="#">More Details </a>
        </div>
    </div>
    
</div>
<br>
<?php require_once ('../layouts/footer.php'); ?>