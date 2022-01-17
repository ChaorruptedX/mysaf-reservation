<?php require_once ('../layouts/header.php'); userSession(); ?>

<?php
    $capacity_validation = true;
    $success_reserved_message = false;
    $reservation = getClosestReservation($conn);
    
    if ($_POST)
    {
        if ($reservation['total_user_reserved'] < $reservation['maximum_capacity']) // If There Is Empty Slot, Proceed
        {
            try // Make Reservation
                {  
                    // Prepare SQL and Bind Parameters
                    $stmt = $conn->prepare("
                        INSERT INTO user_reservation (
                            id_personal_detail,
                            id_reservation,
                            status
                        )
                        VALUES (
                            :id_personal_detail,
                            :id_reservation,
                            :status
                        )
                    ");
                    $stmt->bindParam(':id_personal_detail', $id_personal_detail);
                    $stmt->bindParam(':id_reservation', $id_reservation);
                    $stmt->bindParam(':status', $status);

                    // Insert a Row
                    $id_personal_detail = getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'];
                    $id_reservation = $_POST['id_reservation'];
                    $status = 1; // Reserved
                    $stmt->execute();

                    $success_reserved_message = true;
                    $reservation = getClosestReservation($conn);
                }
                catch (PDOException $e)
                {
                    dd("Error: " . $e->getMessage());
                }
        }
        else
        {
            $capacity_validation = false;
        }
    }

    $user_reservation_exist = checkExistingUserReservation($conn, getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'], $reservation['id']);
?>

<div>

<br>
    <h1>User Dashboard</h1>
</div>

<div class="main-part">
    <?php if (!empty($reservation)) : ?>

        <h2>Saf Reservation</h2>

        <hr>

        <h3> Reservation for <?= $reservation['name']; ?> on <?= getDateFormat($reservation['open_time']); ?> </h3>

        <div class="box-saf">
            
            <div class="icon-part"><br>
                <img src ="<?= constant("BASEURL") . 'assets/image/saf-icon.png' ?>"alt="User Icon" width="50" height="50"/><br>
                <h3> Open - <?= getFullDateTimeFormat($reservation['open_time']); ?></h3>
                <h3> Close - <?= getFullDateTimeFormat($reservation['close_time']); ?></h3>
                <h4>Total Reservation</h4>
                <p><?= $reservation['total_user_reserved']; ?> / <?= $reservation['maximum_capacity'] ?></p>
            </div>
            
            <div>
                <?php if (!$user_reservation_exist) : ?>
                <form id="form-reserve" method="post">
                    <input type="hidden" name="id_reservation" value="<?= $reservation['id']; ?>">
                    <button id="reserve-now" type="submit" class="button home-reserve">Reserve Now</button>
                </form>
                <?php else : ?>
                    <button class="button home-reserved">Reserved</button>
                <?php endif; ?>
            </div>

            <br>

        </div>

    <?php endif; ?>
</div>

<br>

<script type="text/javascript">

$(function() { // Shorthand for $( document ).ready()

    let capacity_validation = '<?= json_encode($capacity_validation); ?>';
    let success_reserved_message = '<?= json_encode($success_reserved_message); ?>';
    
    if (capacity_validation == "false")
    {
        Swal.fire({
            icon: 'error',
            title: 'Reservation Failed',
            text: 'Maximum capacity has been reached.',
        });
    }

    if (success_reserved_message == "true")
    {
        Swal.fire({
            icon: 'success',
            title: 'Reservation Success',
            text: 'You have successfully made a reservation.',
        });
    }

    $(document).on("click", "button#reserve-now", function(event) {

        event.preventDefault();

        Swal.fire({
            title: 'Make Reservation',
            text: "Are you sure to reserve?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed)
                $("form#form-reserve").submit();
        })

    });

});

</script>

<?php require_once ('../layouts/footer.php'); ?>