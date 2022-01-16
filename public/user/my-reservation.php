<?php require_once ('../layouts/header.php'); userSession(); ?>

<br>
<div>
    <h1>My Reservation</h1>
</div>

<?php /* Has Reservation */ ?>
<div class="wrapper form">
    <h2> Friday Prayer </h2>
    <h2> [ 20 January 2020 ] </h2>
    <table id="user">
        <tr >
            <th colspan="2" > RESERVED</th>
        </tr>
        
        <tr>
            <td><b>Mosque Name:</b></td>
            <td>Masjid Sayyidina Abu Bakar, UTeM</td>
        </tr>
        
        <tr>
            <td><b>Reserve by:</b></td>
            <td>Asyraf Hanif</td>
        </tr>
  
        <tr>
            <td><b>Reservation Date:</b></td>
            <td>19 January 2022</td>
        </tr>

    </table>
    <br>
    <div>
        <a href=""><button class="form back">Cancel Reservation</button></a>
    </div>

    <?php /* No Reservation */ ?>
    <div>
        <h3> No Reservation made </h3>
    <div>
        
</div>

<?php require_once ('../layouts/footer.php'); ?>
