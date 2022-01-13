<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php
    $success_registration_message = false;
    $reservation_date_validation = true;

    if ($_POST)
    {
        $open_datetime = $_POST['open_date'].' '.$_POST['open_time'];
        $close_datetime = $_POST['close_date'].' '.$_POST['close_time'];

        try {
            // Check for Existing Reservation Date and Time
            $stmt = $conn->prepare("
                SELECT
                    *
                FROM reservation
                WHERE
                    (
                        (
                            reservation.open_time >= '" . $open_datetime . "'
                            AND reservation.close_time <= '" . $close_datetime . "'
                        )
                        OR
                        (
                            reservation.open_time <= '" . $open_datetime . "'
                            AND reservation.close_time >= '" . $close_datetime . "'
                        )
                        OR
                        (
                            reservation.open_time >= '" . $open_datetime . "'
                            AND reservation.open_time <= '" . $close_datetime . "'
                        )
                        OR
                        (
                            reservation.close_time >= '" . $open_datetime . "'
                            AND reservation.close_time <= '" . $close_datetime . "'
                        )
                    )
                    AND reservation.deleted_at = '0'
            ");
    
            $stmt->execute();
    
            // Set the Resulting Array to Associative
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
            $row = $stmt->fetch();
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }

        if (empty($row))
        {
            try // Register Reservation
            {
                // Prepare SQL and Bind Parameters
                $stmt = $conn->prepare("
                    INSERT INTO reservation (
                        id_personal_detail,
                        id_mosque,
                        name,
                        open_time,
                        close_time,
                        maximum_capacity
                    )
                    VALUES (
                        :id_personal_detail,
                        :id_mosque,
                        :name,
                        :open_time,
                        :close_time,
                        :maximum_capacity
                    )
                ");
                $stmt->bindParam(':id_personal_detail', $id_personal_detail);
                $stmt->bindParam(':id_mosque', $id_mosque);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':open_time', $open_time);
                $stmt->bindParam(':close_time', $close_time);
                $stmt->bindParam(':maximum_capacity', $maximum_capacity);

                // Insert a Row
                $id_personal_detail = getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'];
                $id_mosque = getActiveMosque($conn)['id'];
                $name = $_POST['name'];
                $open_time = $open_datetime;
                $close_time = $close_datetime;
                $maximum_capacity = $_POST['capacity'];
                $stmt->execute();

                $success_registration_message = true;
            }
            catch (PDOException $e)
            {
                dd("Error: " . $e->getMessage());
            }
        }
        else
        {
            $reservation_date_validation = false;
        }
    }
?>

<div>
    <br>
    <h1>Create Saf Reservation</h1>
</div>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

<div class="wrapper form">
    <form method="post">
        <?php if ($success_registration_message === true) : ?>
            <div style="text-align: center; margin-bottom: 15px">
                <label class="validation-success">Reservation has been successfully registered into the system.</label>
            </div>
        <?php endif; ?>
        <?php if ($reservation_date_validation === false) : ?>
            <div style="text-align: center; margin-bottom: 15px">
                <label class="validation-error">The reservation date and time clash with another reservation.</label>
            </div>
        <?php endif; ?>

        <!-- <label class="form" for="date">Prayer Date</label>
        <input class="input form" type="date" name="date"> -->

        <label class="form" for="name">Name</label>
        <input type="text" name="name" class="input form" required>

        <label class="form" for="open_time">Open Date & Time</label>
        <input class="input form" type="date" name="open_date" required>
        <input class="input form" type="time" name="open_time" required>

        <label class="form" for="close_time">Close Date & Time</label>
        <input class="input form" type="date" name="close_date" required>
        <input class="input form" type="time" name="close_time" required>

        <label class="form" for="capacity">Set Capcity</label>
        <input class="input form" type="number" name="capacity" required>

        <button class="form submit">Create Reservation</button>
    </form>
</div>

<br>

<?php require_once ('../layouts/footer.php'); ?>
