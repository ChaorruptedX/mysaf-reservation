<?php require_once ('../layouts/header.php'); userSession(); ?>
<div>
<br>
    <h1>User Dashboard</h1>
</div>
<div class="main-part">
    <h2>Saf Reservation</h2>
    <hr>
    <h3> Saf Resrvation for Friday Prayer on [ 20 January 2022 ] </h3>
    <div class="box-saf">
        <div class="icon-part"><br>
            <img src ="<?= constant("BASEURL") . 'assets/image/saf-icon.png' ?>"alt="User Icon" width="50" height="50"/><br>
            <h3> Open - Thursday [19 January 2022] 10:00 AM</h3>
            <h3> Close - Friday [20 January 2022] 10:00 AM</h3>
            <h4>Total Reservation</h4>
            <p>130 / 200</p>
        </div>
        
        <div>
            <a href="<?= constant("BASEURL")?>"><button class="button home-reserve">Reserve Now</button></a>
        </div>
        <br>
    </div>
</div>
<br>
<?php require_once ('../layouts/footer.php'); ?>