<?php require_once ('../layouts/header.php'); userSession(); ?>

<?php
    $reservation = getClosestReservation($conn);
?>

<div>

<br>
    <h1>User Dashboard</h1>
</div>

<div class="main-part">
    <?php if (!empty($reservation)) : ?>

        <h2>Saf Reservation</h2>

        <hr>

        <h3> Resrvation for <?= $reservation['name']; ?> on <?= getDateFormat($reservation['open_time']); ?> </h3>

        <div class="box-saf">
            
            <div class="icon-part"><br>
                <img src ="<?= constant("BASEURL") . 'assets/image/saf-icon.png' ?>"alt="User Icon" width="50" height="50"/><br>
                <h3> Open - <?= getFullDateTimeFormat($reservation['open_time']); ?></h3>
                <h3> Close - <?= getFullDateTimeFormat($reservation['close_time']); ?></h3>
                <h4>Total Reservation</h4>
                <p><?= $reservation['total_user_reserved']; ?> / <?= $reservation['maximum_capacity'] ?></p>
            </div>
            
            <div>
                <a href="<?= constant("BASEURL")?>"><button class="button home-reserve">Reserve Now</button></a>
            </div>

            <br>

        </div>

    <?php endif; ?>
</div>

<br>

<?php require_once ('../layouts/footer.php'); ?>