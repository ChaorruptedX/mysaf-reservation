<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php
    try 
    { // untuk table user sahaja
        $stmt = $conn->prepare("
            UPDATE user
            SET 
                deleted_at='".time(). "'
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
    
// redirect same page after deletion

header('Location: ' . constant("BASEURL") . 'public/committee/user-management.php');

?>
<?php require_once ('../layouts/footer.php'); ?>