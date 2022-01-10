<?php require_once ('../layouts/header.php'); // committeeSession(); ?>

<?php
    $authentication_validation = true;
    $unique_email_validation = true;
    $success_registration_message = false;

    if ($_POST) 
    {
        try
        {
            // Check for Unique Email
             $stmt = $conn->prepare
             ("
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
                    $id_role = lookupRole($conn, "MC001")['id'];
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
?>

<div>
    <br>
    <h1>Register User</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>"><button class="form back">Back</button></a>
</div>

<div class="wrapper form">
    <form action ="register-user.php" method="post" id="register-user">
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
        <label class="form" for="name">Name</label>
        <input class="input form" type="text" id="name" name="name" placeholder="Enter Name" required>
        
        <label class="form" for="email">Email Address</label>
        <input class="input form" type="email" id="email" name="email" placeholder="Enter Email" required>

        <label class="form" for="email">Password</label>
        <input class="input form" type="password" id="password" name="password" placeholder="Enter Password" required>

        <label class="form" for="phone">Phone Number</label>
        <input class="input form" type="text" id="phone" name="phone" placeholder="Enter Phone Number" required>

        <label class="form" for="roles">Roles</label>
        <select id="roles" name="roles" required>
            <option value="">Please Select ...</option>
            <option value="1">System Admin</option>
            <option value="2">Mosque Committee</option>
        </select>

        <button class="form submit">Register</button>
  </form>
</div>

<script type="text/javascript">

$(function() { // Shorthand for $( document ).ready()

    $("form#register-user").validate({ // Sign In Validation
        errorElement: "div",
        errorClass: "validation-error form-validation",
        rules: {
            phone: {
                number: true,
            }
        },
        messages: {
            name: {
                required: "Name is required",
            },
            email: {
                required: "Email Address is required",
                email: "Email address must be in the format of name@domain.com"
            },
            phone: {
                required: "Phone Number is required",
            },
            roles: {
                required: "User Role is required",
            },
        },
    });

});

</script>

<?php require_once ('../layouts/footer.php'); ?>