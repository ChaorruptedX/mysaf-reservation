<?php require_once ('layouts/header.php'); guestSession(); ?>

<?php
    $reservation = getClosestReservation($conn);
?>

<h1 class="h1 home">MASJID SAYYIDINA ABU BAKAR, UTEM</h1>

<div class="content home">
    <h2> Announcement </h2>
    <p>Hanya jemaah yang lengkap 2 dos vaksinasi dibenarkan solat berjemaah di masjid.</p>
</div>

<br>

<?php if (!empty($reservation)) : ?>

    <div class="content home">

        <h2> Friday Prayers Saf Reservation</h2>

        <table id="user">
            <tr>
                <td colspan="2"><h3><?= getDateFormat($reservation['open_time']); ?></h3></td>
            </tr>
            <tr>
                <th>Open</th>
                <th>Close</th>
            </tr>
            <tr>
                <td><?= getFullDateTimeFormat($reservation['open_time']); ?></td> <!-- e.g Thursday : 10:00 AM -->
                <td><?= getFullDateTimeFormat($reservation['close_time']); ?></td> <!-- e.g Friday : 10:00 AM -->
            </tr>
        </table>

        <br>

        <a href="<?= constant("BASEURL") . 'public/login.php' ?>"><button class="button home-reserve">Reserve Now</button></a>

    </div>

<?php endif; ?>

<?php require_once ('layouts/footer.php'); ?>