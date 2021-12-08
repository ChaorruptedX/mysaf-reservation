<?php require_once ('layouts/header.php'); guestSession(); ?>

<div class="wrapper">
    <div id="formContent">

    <!-- Tabs Titles -->
    <h1> MySaf Reservation </h1>
        <div>
            <img src ="<?= constant("BASEURL") . 'assets/image/logo.png' ?>" id="icon" alt="System Icon" />
        </div>
  
<<<<<<< HEAD
        <h2 class="login active" id="sign-in"> Sign In </h2>
        <h2 class="login inactive " id="sign-up">Sign Up </h2>
=======
        <h2 class="login active" id="sign-in">Sign In</h2>
        <h2 class="login inactive underlineHover" id="sign-up">Sign Up</h2>
>>>>>>> 5648028e1ca5a7bde94b6e5d9f02d7159914c4f2

        <!-- Login Form -->
        <form id="signin" method="post">
            <input type="email" id="email-login" class="input login" name="email" placeholder="Email" required>
            <input type="password" id="password-login" class="input login" name="password" placeholder="Password" required>
            <button class="button login">LOG IN</button>
        </form>

        <!-- Sign up Form -->
        <form id="signup" method="post" style="display:none;">
            <input type="email" id="email" class="input login" name="email" placeholder="Email" required>
            <input type="password" id="password-signup" class="input login" name="password" placeholder="Password" required>
            <input type="text" id="name" class="input login" name="name" placeholder="Name" required>
            <input type="text" id="phone" class="input login" name="phone" placeholder="Phone Number" required>
            <button class="button login">Register</button>
        </form>

        <!-- Remind Passowrd -->
        <!--<div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div-->

    </div>
</div>
        
<script type="text/javascript">

$(function() { // Shorthand for $( document ).ready()

    $("form#signin").validate({ // Sign In Validation
        errorElement: "div",
        errorClass: "validation-error",
        messages: {
            email: {
                required: "Email address is required",
                email: "Email address must be in the format of name@domain.com"
            },
            password: {
                required: "Password is required",
            }
        }
    });

    $("form#signup").validate({ // Sign Up Validation
        errorElement: "div",
        errorClass: "validation-error",
        rules: {
            phone: {
                number: true,
            }
        },
        messages: {
            email: {
                required: "Email address is required",
                email: "Email address must be in the format of name@domain.com"
            },
            password: {
                required: "Password is required",
            },
            name: {
                required: "Name is required",
            },
            phone: {
                required: "Phone is required",
            }
        }
    });

    $(document).on("click", "h2#sign-in", function() // Show Sign In Form
    {
        $("form#signin").show();
        $("form#signup").hide();

        $( "h2#sign-up" ).removeClass( "active" ).addClass( "inactive " );
        $( "h2#sign-in" ).removeClass( "inactive" ).addClass( "active" );
      
    });

    $(document).on("click","h2#sign-up", function() // Show Sign Up Form
    {
        $("form#signup").show();
        $("form#signin").hide();

        $( "h2#sign-up" ).removeClass( "inactive" ).addClass( "active" );
        $( "h2#sign-in" ).removeClass( "active" ).addClass( "inactive" );
    });

});

</script>

<?php require_once ('layouts/footer.php'); ?>