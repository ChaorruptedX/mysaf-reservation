<?php require_once ('../layouts/header.php'); userSession(); ?>

<link rel = "stylesheet" type="text/css" href="reservation.css">
<div class = "wrapper">
    <img class="bground" src="assets/image/test2.jpg">
<body>
    
    <nav class ="content">

        <ul>
           <li><a href=".html">User Management</a></li>
            <li><a href=".html">Manage Reservation</a></li>
            <ul>
                <li><a href=".html">List of Reservation</a></li>
            </ul>
            <li><a href=".html">Report</a></li>
            <li><a href=".html">My Account</a></li>
            <li><a href=".html">Logout</a></li>
        </ul>
    </nav>
    <hr>
    <div class ="center content">
        
        <div class = "row">
            <div class = "column">
                <img src="assets/image/bground.jpg" style="width:100%">
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
</body>
</div>
<?php require_once ('../layouts/footer.php'); ?>
