<?php require_once ('../layouts/header.php'); userSession(); ?>

<?php
    $mosque = getActiveMosque($conn);
    $reservation = getClosestReservation($conn);
    $user_reservation_exist = checkExistingUserReservation($conn, getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'], $reservation['id']);
?>

<br>
<div>
    <h1>My Reservation</h1>
</div>

<?php /* Has Reservation */ ?>
<div class="wrapper form">

    <?php if ($user_reservation_exist) : ?>

        <h2> <?= $reservation['name']; ?> </h2>
        <table id="user">
            <tr >
                <th colspan="2">RESERVED</th>
            </tr>
            
            <tr>
                <td><b>Mosque Name:</b></td>
                <td><?= $mosque['name']; ?></td>
            </tr>
    
            <tr>
                <td><b>Reservation Date:</b></td>
                <td><?= getFullDateTimeFormat($reservation['open_time']); ?> - <?= getFullDateTimeFormat($reservation['close_time']); ?></td>
            </tr>

        </table>
        <br>
        <div>
            <a href=""><button class="form back">Cancel Reservation</button></a>
        </div>

    <?php else : ?>

        <div>
            <h3> No Reservation Has Been Made </h3>
        </div>

    <?php endif; ?>
        
</div>

<?php require_once ('../layouts/footer.php'); ?>
