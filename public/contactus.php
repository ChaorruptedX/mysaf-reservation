<?php require_once ('layouts/header.php'); guestSession(); ?>


<link rel = "stylesheet" type="text/css" href="reservation.css">
<div class = "wrapper">
  <img class="bground" src="assets/image/test2.jpg">
<body>
    <nav class =" content">
        <ul>
           <li><a href=".html">Home</a></li>
            <li><a href=".html">My Reservation</a></li>
            <li><a href=".html">History</a></li>
            <li><a href=".html">My Account</a></li>
            <li><a href=".html">Logout</a></li>
        </ul>
    </nav>
    

    <div class ="center content"><hr>
    <h2 name = "title">Contact Us</h2>
        <p>For all enquires,please leave us a message: </p>
        <div class="row">
            <div class="column">
              <img src="img/masjid.jpg" style="width:100%">
            </div>
            <div class="column">
              <form action="/action_page.php">
                <span class ="label">First Name</span>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
                <span class ="label">Last Name</span>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                <span class ="label">State</span>
                <select id="state" name="state">
                  <option value="johor">Johor</option>
                  <option value="melaka">Melaka</option>
                  <option value="Kelantan">Kelantan</option>
                  <option value="terengganu">Terengganu</option>
                  <option value="Negeri">Negeri Sembilan</option>
                  <option value="Penang">Penang</option>
                </select>
                <span class ="label">Subject</span>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:160px"></textarea>
                <input type="submit" value="Submit">
              </form>
            </div>
          </div>
        <div class="center">
            <h4>Connect with us through our social media ! </h4>
            <p><a href="mailto:abu@gmail.com"target="_blank"><img src = "img/gmail.png" width="60px" height="60px">   </a>
            <a href="https://twitter.com/i/flow/login"target="_blank"><img src = "img/twitter.png" width="60px" height="60px">   </a>
            <a href="https://www.facebook.com/"target="_blank"><img src = "img/fb.png" width="60px" height="60px"></a>   </p>    
        </div>   
      </div>

</body>
</div>

<?php require_once ('layouts/footer.php'); ?>