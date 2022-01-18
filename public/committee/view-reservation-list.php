<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php 
    try 
    {
        $stmt = $conn->prepare("
            SELECT
                reservation.*,
                COUNT(user_reservation.id) AS user_reserved
            FROM reservation
            LEFT JOIN user_reservation
                ON reservation.id = user_reservation.id_reservation AND user_reservation.status = '1' AND user_reservation.deleted_at = '0'
            WHERE
                reservation.id = '" . $_GET['id'] . "'
            GROUP BY
                reservation.id
        ");

          $stmt->execute();

          // Set the Resulting Array to Associative
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          $reservation = $stmt->fetch();
    }
    catch (PDOException $e)
    {
        dd("Error: " . $e->getMessage());
    }

    try 
    {
        $stmt = $conn->prepare("
            SELECT
                personal_detail.name,
                user.email,
                personal_detail.tel_no,
                user_reservation.status
            FROM user_reservation
            LEFT JOIN personal_detail
                ON user_reservation.id_personal_detail = personal_detail.id
            LEFT JOIN user
                ON personal_detail.id_user = user.id 
            WHERE
                user_reservation.id_reservation = '" . $_GET['id'] . "'
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

<div class="wrapper form">
    <table id="user">
        <tr >
            <th colspan="2" >Reservation Details</th>
        </tr>
        
        <tr>
            <td><b>Name:</b></td>
            <td><?= $reservation['name']; ?></td>
        </tr>
        
        <tr>
            <td><b>Open and Close Date & Time:</b></td>
            <td><?= getFullDateTimeFormat($reservation['open_time']); ?> - <?= getFullDateTimeFormat($reservation['close_time']); ?></td>
        </tr>
  
        <tr>
            <td><b>Capacity:</b></td>
            <td><?= $reservation['user_reserved']; ?> / <?= $reservation['maximum_capacity']; ?></td>
        </tr>

    </table>
</div>

<br>

<div>
    <h1>List of Users</h1>
</div>

<a href="<?= constant("BASEURL") . 'public/committee/list_reservation.php' ?>"><button class="form back">Back</button></a>

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