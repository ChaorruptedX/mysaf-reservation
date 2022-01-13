<?php require_once ('../layouts/header.php'); committeeSession(); ?>
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
                id='" .  $_GET['id'] . "'
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
                tel_no='".$_POST['phone'] . "'
            WHERE 
            id='".getPersonalDetailbyIdUser($conn, $_GET['id']) ['id']. "'
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

    //dd($_POST);
}    
try 
    {
    $stmt = $conn->prepare("
    SELECT
      user.id,
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
      user.id='" . $_GET['id'] . "'
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
<div>
    <br>
    <h1>Update User</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>"><button class="form back">Back</button></a>
</div>

<div class="wrapper form">
    <form action ="update-user.php?id=<?=$_GET['id'];?>" method="post">
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
        <input class="input form" type="text" name="name" value="<?= $row['name']; ?>">
        
        <label class="form" for="email">Email Address</label>
        <input class="input form" type="email" name="email" value="<?= $row['email']; ?>">

        <label class="form" for="phone">Phone Number</label>
        <input class="input form" type="text"  name="phone" value="<?= $row['tel_no']; ?>">

        <label class="form" for="roles">Roles</label>
        <select id="roles" name="roles" required>
            <option value="">Please Select ...</option>
            <option value="<?= lookupRole($conn, "U001")['id'] ?>" <?= (lookupRole($conn, "U001")['id'] == $row['ROLE']) ? "selected" : null; ?>><?= lookupRole($conn, "U001")['description'] ?></option>
            <option value="<?= lookupRole($conn, "MC001")['id'] ?>" <?= (lookupRole($conn, "MC001")['id'] == $row['ROLE']) ? "selected" : null; ?>><?= lookupRole($conn, "MC001")['description'] ?></option>
        </select>

        <button class="form submit">Register</button>
  </form>
</div>
<?php require_once ('../layouts/footer.php'); ?>