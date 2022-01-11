<?php require_once ('layouts/header.php'); guestSession(); ?>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

<div class = "wrapper">
    <div class ="center content"><hr>
        <h2 name = "title">Contact Us</h2>
        <p>For all enquires,please leave us a message: </p>
        <div class="row">
            <div class="column">
                <img src="<?= constant("BASEURL") . 'assets/image/masjid.jpg' ?>" style="width:100%">
            </div>
            <div class="column">
                <form action="#">
                    <span class ="label">First Name</span>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    <span class ="label">Last Name</span>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                    <span class ="label">State</span>
                        <select id="faculty" name="faculty">
                            <option value="FTMK">FTMK</option>
                            <option value="FKE">FKE</option>
                            <option value="FKEKK">FKEKK</option>
                            <option value="FKP">FKP</option>
                            <option value="FPTT"> FPTT</option>
                            <option value="FTKEE">FTKEE</option>
                        </select>
                    <span class ="label">Subject</span>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:160px"></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
        <div class="center">
            <h4>Connect with us through our social media ! </h4>
            <p><a href="mailto:abu@gmail.com" target="_blank"><img src="<?= constant("BASEURL") . 'assets/image/gmail.png' ?>" width="60px" height="60px">   </a>
            <a href="https://twitter.com/i/flow/login"target="_blank"><img src="<?= constant("BASEURL") . 'assets/image/twitter.png' ?>" width="60px" height="60px">   </a>
            <a href="https://www.facebook.com/"target="_blank"><img src="<?= constant("BASEURL") . 'assets/image/fb.png' ?>" width="60px" height="60px"></a>   </p>    
        </div>   
    </div>
</div>

<?php require_once ('layouts/footer.php'); ?>
