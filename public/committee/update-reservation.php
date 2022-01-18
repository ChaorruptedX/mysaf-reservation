<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php
    $success_registration_message = false;
    $reservation_date_validation = true;

    
?>

<div>
    <br>
    <h1>Update Saf Reservation</h1>
</div>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

<div class="wrapper form">
    <form action ="update-reservation.php?id=<?=$_GET['id'];?>" method="post">
        <?php if ($success_registration_message === true) : ?>
            <div style="text-align: center; margin-bottom: 15px">
                <label class="validation-success">Reservation has been successfully registered into the system.</label>
            </div>
        <?php endif; ?>
        <?php if ($reservation_date_validation === false) : ?>
            <div style="text-align: center; margin-bottom: 15px">
                <label class="validation-error">The reservation date and time clash with another reservation.</label>
            </div>
        <?php endif; ?>

        <!-- <label class="form" for="date">Prayer Date</label>
        <input class="input form" type="date" name="date"> -->

        <label class="form" for="name">Name</label>
        <input type="text" name="name" class="input form"  value="<?= $row['name']; ?>"required>

        <label class="form" for="open_time">Open Date & Time</label>
        <input class="input form" type="date" name="open_date"  value="<?= $row['open_date']; ?>" required>
        <input class="input form" type="time" name="open_time"  value="<?= $row['open_time']; ?>"required>

        <label class="form" for="close_time">Close Date & Time</label>
        <input class="input form" type="date" name="close_date"  value="<?= $row['close_date']; ?>"required>
        <input class="input form" type="time" name="close_time" value="<?= $row['close_time']; ?>" required>

        <label class="form" for="capacity">Set Capcity</label>
        <input class="input form" type="number" name="capacity"  value="<?= $row['max_capacity']; ?>"required>

        <button class="form submit">Update Reservation</button>
    </form>
</div>

<br>

<?php require_once ('../layouts/footer.php'); ?>
