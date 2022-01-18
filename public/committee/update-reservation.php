<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php
    $success_update_message = false;
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
                    AND reservation.id != '" . $_GET['id'] . "'
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
                    UPDATE reservation
                    SET
                        name = :name,
                        open_time = :open_time,
                        close_time = :close_time,
                        maximum_capacity = :maximum_capacity
                    WHERE id = '" . $_GET['id'] . "'
                ");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':open_time', $open_time);
                $stmt->bindParam(':close_time', $close_time);
                $stmt->bindParam(':maximum_capacity', $maximum_capacity);

                // Insert a Row
                $name = $_POST['name'];
                $open_time = $open_datetime;
                $close_time = $close_datetime;
                $maximum_capacity = $_POST['capacity'];
                $stmt->execute();

                $success_update_message = true;
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

    try // Display Reservation Details
    {
        $stmt = $conn->prepare("
            SELECT
                *
            FROM reservation
            WHERE
                reservation.id = '" . $_GET['id'] . "'
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
?>

<div>
    <br>
    <h1>Update Saf Reservation</h1>
</div>

<link rel ="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/reservation.css' ?>">

<div class="wrapper form">
    <form action ="update-reservation.php?id=<?=$_GET['id'];?>" method="post">
        <?php if ($success_update_message === true) : ?>
            <div style="text-align: center; margin-bottom: 15px">
                <label class="validation-success">Reservation has been successfully updated.</label>
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
        <input type="text" name="name" class="input form"  value="<?= $row['name']; ?>"required>

        <label class="form" for="open_time">Open Date & Time</label>
        <input class="input form" type="date" name="open_date"  value="<?= date("Y-m-d", strtotime($row['open_time'])); ?>" required>
        <input class="input form" type="time" name="open_time"  value="<?= date("H:i:s", strtotime($row['open_time'])); ?>"required>

        <label class="form" for="close_time">Close Date & Time</label>
        <input class="input form" type="date" name="close_date"  value="<?= date("Y-m-d", strtotime($row['close_time'])); ?>"required>
        <input class="input form" type="time" name="close_time" value="<?= date("H:i:s", strtotime($row['close_time'])); ?>" required>

        <label class="form" for="capacity">Set Capcity</label>
        <input class="input form" type="number" name="capacity"  value="<?= $row['maximum_capacity']; ?>"required>

        <button class="form submit">Update Reservation</button>
    </form>
</div>

<br>

<?php require_once ('../layouts/footer.php'); ?>
