<?php require_once ('layouts\header.php'); guestSession(); ?>

<div class="wrapper fadeInDown">
    <div id="formContent">

    <!-- Tabs Titles -->
    <h1> MySaf Reservation </h1>
        <div>
            <img src ="<?= constant("BASEURL") . 'assets/image/logo.png' ?>" id="icon" alt="System Icon" />
        </div>
  
        <h2 class="login active" id="sign-in"> Sign In </h2>
        <h2 class="login inactive underlineHover" id="sign-up">Sign Up </h2>

        <!-- Login Form -->
        <form id="signin" >
            <input type="text" id="email-login" class="input login" name="email" placeholder="Email">
            <input type="password" id="password-login" class="input login" name="password" placeholder="Password">
            <button class="button login">LOG IN</button>
        </form>

        <!-- Sign up Form -->
        <form id="signup" style="display:none">
            <input type="email" id="email" class="input login" name="email" placeholder="Email">
            <input type="password" id="password-signup" class="input login" name="password" placeholder="Password">
            <input type="text" id="name" class="input login" name="name" placeholder="Name">
            <input type="number" id="phone" class="input login" name="phone" placeholder="Phone Number">
            <button class="button login">Register</button>
        </form>

        <!-- Remind Passowrd -->
        <!--<div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div-->

    </div>
</div>
        
<script type="text/javascript">

$(document).ready(function() {

    $(document).on("click", "h2#sign-in", function()  // Click Sign in tab
    {
        $("form#signin").show();
        $("form#signup").hide();

        $( "h2#sign-up" ).removeClass( "active" ).addClass( "inactive underlineHover" );
        $( "h2#sign-in" ).removeClass( "inactive underlineHover" ).addClass( "active" );
      
    });

    $(document).on("click","h2#sign-up", function() // Click Sign up tab
    {
        $("form#signup").show();
        $("form#signin").hide();

        $( "h2#sign-up" ).removeClass( "inactive underlineHover" ).addClass( "active" );
        $( "h2#sign-in" ).removeClass( "active" ).addClass( "inactive underlineHover" );
    });

});

</script>

<?php require_once ('layouts\footer.php'); ?>