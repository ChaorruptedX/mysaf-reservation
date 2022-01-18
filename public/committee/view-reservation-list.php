<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php 
    try 
    {
        $stmt = $conn->prepare("
        SELECT
        *
        FROM user_reservation
        LEFT JOIN personal_detail
            ON user_reservation.id_personal_detail = personal_detail.id
        LEFT JOIN reservation
            ON user_reservation.id_reservation = reservation.id   
        WHERE
            reservation.id = id_reservation
            AND user_reservation.deleted_at = '0'
        ");

          $stmt->execute();

          // Set the Resulting Array to Associative
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          $row = $stmt->fetchAll();

          //dd($row);
    }
    catch (PDOException $e)
    {
        dd("Error: " . $e->getMessage());
    }
?>

<div>
    <h1>List of Saf Reservation</h1>
</div>

<div style="width: 100%;">

    <table id="user" class="data-table" style="width: 100%;">
        <thead>
            <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Reservation Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=0; ?>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php foreach ($row as $data) : ?> <!-- LOOP TILL END OF DATA  -->
                <tr>
                    <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                    <td><?=++$no?></td>
                    <td id="user-name"><?= $data['name']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['tel_no']; ?></td>
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
<?php require_once ('../layouts/footer.php'); ?>