<?php require_once ('../layouts/header.php'); // userSession(); ?>

<div>
    <br>
    <h1>Create Saf Reservation</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>"><button class="form back">Back</button></a>
</div>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

<div class="wrapper form">
    <form>
        <label class="form" for="date">Prayer Date</label>
        <input class="input form" type="date" name="date">
        
        <label class="form" for="capacity">Set Capcity</label>
        <select name="capacity">
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="150">150</option>
            <option value="200">200</option>
        </select>

        <label class="form" for="phone">Reservation Open Day&Date</label>
        <input class="input form" type="date" name="open_date"> 
        <input class="input form" type="time" name="open_time"> 

        <label class="form" for="phone">Reservation Close Day&Date</label>
        <input class="input form" type="date" name="close_date"> 
        <input class="input form" type="time" name="close_time"> 

        <button class="form submit">Create Reservation</button>
  </form>
</div>
<br>
<?php require_once ('../layouts/footer.php'); ?>
