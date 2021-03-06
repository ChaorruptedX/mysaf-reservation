<?php require_once ('../layouts/header.php'); userSession(); ?>
<?php 
    try 
    {
        $stmt = $conn->prepare("
            SELECT
                *
            FROM user_reservation
            LEFT JOIN personal_detail
                ON user_reservation.id_personal_detail = personal_detail.id
            LEFT JOIN user
                ON personal_detail.id_user = user.id
            LEFT JOIN reservation
                ON user_reservation.id_reservation = reservation.id
            WHERE
                user.id = '" . $_SESSION['id_user'] . "'
                AND user_reservation.deleted_at = '0'
            ORDER BY
                user_reservation.created_at DESC
        ");

          $stmt->execute();

          // Set the Resulting Array to Associative
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          $row = $stmt->fetchAll();
    }
    catch (PDOException $e)
    {
        dd("Error: " . $e->getMessage());
    }
?>
<br>
<div>
    <h1>My Reservation History</h1>
</div>
<br>

<div class="wrapper form">
<div style="width: 100%;">

    <table id="user" class="data-table">
        <thead>
            <tr>
            <th>No.</th>
            <th>Reservation Name</th>
            <th>Reservation Date & Time</th>
            <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=0; ?>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php foreach ($row as $data) : ?> <!-- LOOP TILL END OF DATA  -->
                <tr>
                    <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                    <td><?=++$no?></td>
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['created_at']; ?></td>
                    <td>
                        <?php
                            if (($data['status']) == '0') :
                                echo '<p style="color: red; text-align: center" >
                                <b> Cancelled</b> </p>';
                            elseif (($data['status']) == '1') :
                                echo '<p style="color: blue; text-align: center" >
                               <b> Reserved</b> </p>';
                            endif;
                        ?></td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</div>
<?php require_once ('../layouts/footer.php'); ?>