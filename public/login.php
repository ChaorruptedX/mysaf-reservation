<?php require_once ('layouts/header.php'); guestSession(); ?>

<?php
    $authentication_validation = true;
    $unique_email_validation = true;
    $success_registration_message = false;

    if ($_POST)
    {
        if ($_POST['type'] == "sign-in") // Sign In Process
        {
            dd($_POST);
        }
        else if ($_POST['type'] == "sign-up") // Sign Up Process
        {
            try {
                // Check for Unique Email
                $stmt = $conn->prepare("
                    SELECT
                        *
                    FROM user
                    WHERE
                        email='" . $_POST['email'] . "'
                        AND deleted_at='0'
                ");

                $stmt->execute();

                // Set the Resulting Array to Associative
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
            }
            catch (PDOException $e)
            {
                dd("Error: " . $e->getMessage());
            }

            if (!empty($stmt->fetch()))
            {
                $unique_email_validation = false;
            }
            else
            {
                try // Register User into the System
                {  
                    // Prepare SQL and Bind Parameters
                    $stmt = $conn->prepare("
                        INSERT INTO user (
                            id_role,
                            email,
                            password
                        )
                        VALUES (
                            :id_role,
                            :email,
                            :password
                        )
                    ");
                    $stmt->bindParam(':id_role', $id_role);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password', $password);

                    // Insert a Row
                    $id_role = lookupRole($conn, "U001")['id'];
                    $email = $_POST['email'];
                    $password = bcrypt_hash($_POST['password']);
                    $stmt->execute();

                    $id_user = $conn->lastInsertId(); // Get Last Insert ID from user Table
                }
                catch (PDOException $e)
                {
                    dd("Error: " . $e->getMessage());
                }

                try // Register User Personal Detail
                {
                    // Prepare SQL and Bind Parameters
                    $stmt = $conn->prepare("
                        INSERT INTO personal_detail (
                            id_user,
                            name,
                            tel_no
                        )
                        VALUES (
                            :id_user,
                            :name,
                            :tel_no
                        )
                    ");
                    $stmt->bindParam(':id_user', $id_user);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':tel_no', $tel_no);

                    // Insert a Row
                    $id_user = $id_user;
                    $name = $_POST['name'];
                    $tel_no = $_POST['phone'];
                    $stmt->execute();

                    $success_registration_message = true;
                }
                catch (PDOException $e)
                {
                    dd("Error: " . $e->getMessage());
                }
            }
            
            $conn = null;
        }
    }
?>

<div class="wrapper">
    <div id="formContent">

    <!-- Tabs Titles -->
    <h1> MySaf Reservation </h1>
        <div>
            <img src ="<?= constant("BASEURL") . 'assets/image/logo.png' ?>" id="icon" alt="System Icon" />
        </div>
  
        <h2 class="login active" id="sign-in"> Sign In </h2>
        <h2 class="login inactive " id="sign-up">Sign Up </h2>

        <!-- Login Form -->
        <form id="signin" method="post">
            <?php if ($authentication_validation === false) : ?>
                <div style="text-align: center; margin-bottom: 15px">
                    <label class="validation-error">Username or password is wrong, please try again.</label>
                </div>
            <?php endif; ?>
            <input type="hidden" name="type" value="sign-in">
            <input type="email" id="email-login" class="input login" name="email" placeholder="Email" required>
            <input type="password" id="password-login" class="input login" name="password" placeholder="Password" required>
            <button class="button login">LOG IN</button>
        </form>

        <!-- Sign up Form -->
        <form id="signup" method="post" style="display:none;">
            <?php if ($success_registration_message === true) : ?>
                <div style="text-align: center; margin-bottom: 15px">
                    <label class="validation-success">Your registration has been successfully completed.</label>
                </div>
            <?php endif; ?>
            <?php if ($unique_email_validation === false) : ?>
                <div style="text-align: center; margin-bottom: 15px">
                    <label class="validation-error">Email already exists.</label>
                </div>
            <?php endif; ?>
            <input type="hidden" name="type" value="sign-up">
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

    let current_page = '<?= ($_POST && $_POST['type'] == "sign-up") ? "sign-up" : "sign-in"; ?>';

    if (current_page == "sign-up")
    {
        $( "h2#sign-up" ).trigger( "click" );
    }

});

</script>

<?php require_once ('layouts/footer.php'); ?>