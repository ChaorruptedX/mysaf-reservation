<?php require_once ('../layouts/header.php'); // userSession(); ?>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

<div class = "wrapper">
    <div class ="center content">
          <h2 name = "title"> Reservation Page </h2>
        <div class = "row">
            <div class = "column">
                <img src="<?= constant("BASEURL") . 'assets/image/bground1.jpg' ?>" style="width:100%">
            </div>
        </div>
        <div class = "column">
            <form action="">
                <h2>Create Reservation</h2>

                <h3>Select Date :</h3>
                <p><input type="date" id="date" name="date"></p>

                <h3>Capacity limit </h3>
                <p><input type="number" id="capacity" name="capacity"></p>

                <h3>Opening from :</h3>
                <input type="date" id="date_open" name="date_open"> to
                <input type="date" id="date_close" name="date_close">

                <p><input type = "reset" name = "Cancel"> <input type = "submit" name = "SAVE"></p>                
            </form>
        </div>
    </div> 
</div>

<?php require_once ('../layouts/footer.php'); ?>
