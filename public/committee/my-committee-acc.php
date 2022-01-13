<?php require_once ('../layouts/header.php'); committeeSession(); ?>
<div>
    <h1>My Account</h1>
</div>

<?php
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

<div class="wrapper form">
    <table id="user">
        <tr >
            <th colspan="2" >Account Details</th>
        </tr>
        
        <tr>
            <td><b>Name:</b></td>
            <td><?= $row['name']; ?></td>
        </tr>
        
        <tr>
            <td><b>Email:</b></td>
            <td><?= $row['email']; ?></td>
        </tr>
  
        <tr>
            <td><b>Phone Number:</b></td>
            <td><?= $row['tel_no']; ?></td>
        </tr>

    </table>
    <br>
    <div>
        <a href="<?= constant("BASEURL") . 'public/committee/update-account.php' ?>"><button class="form submit">Update Account</button></a>
    </div>
</div>

<?php require_once ('../layouts/footer.php'); ?>