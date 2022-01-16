<?php require_once ('layouts/header.php'); guestSession(); ?>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

    <div class ="content"><hr>
        <h2 name = "title">Contact Us</h2>
        <p>For all enquires,please leave us a message: </p>
            <div class="column">
                <form action="#">
                    <span class ="label">First Name</span>
                        <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    <span class ="label">Last Name</span>
                        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                    <span class ="label">State</span>
                        <select id="faculty" name="faculty">
                            <option value="johor">Johor</option>
                            <option value="melaka">Melaka</option>
                            <option value="Kelantan">Kelantan</option>
                            <option value="terengganu">Terengganu</option>
                            <option value="Negeri">Negeri Sembilan</option>
                            <option value="Penang">Penang</option>
                        </select>
                    <span class ="label"></span>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:160px"></textarea>
                    <input type="submit" value="Submit">
                </form>
            </div>
        <div class="center">
            <h2> OR </h2><br><br>
            <h3>Connect with us through our social media ! </h3>
            <p><a href="mailto:abu@gmail.com" target="_blank"><img src="<?= constant("BASEURL") . 'assets/image/gmail.png' ?>" width="60px" height="60px"></a>
            <a href="https://twitter.com/i/flow/login"target="_blank"><img src="<?= constant("BASEURL") . 'assets/image/twitter.png' ?>" width="60px" height="60px"></a>
            <a href="https://www.facebook.com/"target="_blank"><img src="<?= constant("BASEURL") . 'assets/image/fb.png' ?>" width="60px" height="60px"></a></p>    
        </div>   
    </div>

<?php require_once ('layouts/footer.php'); ?>
