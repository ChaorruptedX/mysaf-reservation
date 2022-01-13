<?php require_once ('../layouts/header.php'); userSession(); ?>
<div>
    <h1>My Account</h1>
</div>

<?php

    $authentication_validation = true;
    $unique_email_validation = true;
        $success_registration_message = false;

  
    if ($_POST) // Sign In Process
    {
        try 
        { // untuk table user sahaja
            // Authenticate Email and Password
            $stmt = $conn->prepare("
                UPDATE user
                SET 
                    email='".$_POST['email'] . "'
                WHERE 
                    id='" .  $_SESSION['id_user'] . "'
                ");

                $stmt->execute();
                
                // Set the Resulting Array to Associative
                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $success_registration_message = true;
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }
        
        try 
        { // untuk table personal detail sahaja
            // Authenticate Email and Password
            /*dd(
                getPersonalDetailbyIdUser($conn, $_SESSION['id_user']) ['id']
            );*/
            $stmt = $conn->prepare("
                UPDATE personal_detail
                SET 
                    name='".$_POST['name'] . "',
                    tel_no='".$_POST['tel_no'] . "'
                WHERE 
                id='".getPersonalDetailbyIdUser($conn, $_SESSION['id_user']) ['id']. "'
                ");

                $stmt->execute();
                //dd('telor');
                
                // Set the Resulting Array to Associative
                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $success_registration_message = true;
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }
    }     
    
    try 
    {
         $stmt = $conn->prepare("
  
        SELECT
        personal_detail.name,
        user.email,
        personal_detail.tel_no,
        user.id_role AS ROLE,
        lookup_role.description AS role_desc
        FROM personal_detail
        LEFT JOIN user
            ON personal_detail.id_user = user.id
        LEFT JOIN lookup_role
            ON user.id_role = lookup_role.id
        WHERE
            user.id='" . $_SESSION['id_user'] . "'
        ");

        $stmt->execute();

        // Set the Resulting Array to Associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $row = $stmt->fetch();

        //dd($row);
    }
 
    catch (PDOException $e)
    {
    dd("Error: " . $e->getMessage());
    }


?>

<a href="<?= constant("BASEURL") . 'public/user/my-user-account.php' ?>"><button class="form back">Back</button></a>

<form method="post" action="update-account.php">
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

    <div class="wrapper form">
    
        <table id="user">
            <tr >
                <th colspan="2" >Account Details</th>
            </tr>
        
            <tr>
                <td><b>Name:</b></td>
                <td><input class="input form" type="text" name="name" value="<?= $row['name']; ?>" ></td>
            </tr>
            
            <tr>
                <td><b>Email:</b></td>
                <td><input class="input form" type="email" name="email" value="<?= $row['email']; ?>" ></td>
            </tr>
    
            <tr>
                <td><b>Phone Number:</b></td>
                <td><input class="input form" type="number" name="tel_no" value="<?= $row['tel_no']; ?>" ></td>
            </tr>
            <!--tr>
                <td><b>Reset Password:</b></td>
                <td><input class="input form" type="password" name="password"></td>
            </tr-->
        </table>

        <div>
           <button class="form submit">Update Account</button>
        </div>
    </div> 
</form>

<?php require_once ('../layouts/footer.php'); ?>
