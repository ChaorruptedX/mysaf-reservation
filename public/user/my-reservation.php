<?php require_once ('../layouts/header.php'); userSession(); ?>

<?php
    $mosque = getActiveMosque($conn);
    $reservation = getClosestReservation($conn);
    $user_reservation_exist = checkExistingUserReservation($conn, getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'], $reservation['id']);
    $success_cancel_reserveation_message = false;

    if ($_POST)
    {
        try // Cancel Reservation
        {  
            // Prepare SQL and Bind Parameters
            $stmt = $conn->prepare("
                UPDATE user_reservation
                SET
                    status = 0
                WHERE
                    id_personal_detail = '" . getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'] . "'
                    AND id_reservation = '" . $_POST['id_reservation'] . "'
                    AND deleted_at = '0'
            ");

            $stmt->execute();

            $user_reservation_exist = checkExistingUserReservation($conn, getPersonalDetailbyIdUser($conn, $_SESSION['id_user'])['id'], $reservation['id']);
            $success_cancel_reserveation_message = true;
        }
        catch (PDOException $e)
        {
            dd("Error: " . $e->getMessage());
        }
    }
?>

<br>
<div>
    <h1>My Reservation</h1>
</div>

<?php /* Has Reservation */ ?>
<div class="wrapper form">

    <?php if ($user_reservation_exist) : ?>

        <h2> <?= $reservation['name']; ?> </h2>
        <table id="user">
            <tr >
                <th colspan="2">RESERVED</th>
            </tr>
            
            <tr>
                <td><b>Mosque Name:</b></td>
                <td><?= $mosque['name']; ?></td>
            </tr>
    
            <tr>
                <td><b>Reservation Date:</b></td>
                <td><?= getFullDateTimeFormat($reservation['open_time']); ?> - <?= getFullDateTimeFormat($reservation['close_time']); ?></td>
            </tr>

        </table>
        <br>
        <div>
            <form id="form-reserved" method="post">
                <input type="hidden" name="id_reservation" value="<?= $reservation['id'] ?>">
                <button id="cancel-reservation" class="form back">Cancel Reservation</button>
            </form>
        </div>

    <?php else : ?>

        <div>
            <h3> No Reservation Has Been Made </h3>
        </div>

    <?php endif; ?>
        
</div>

<script type="text/javascript">

$(function() { // Shorthand for $( document ).ready()

    let success_cancel_reserveation_message = '<?= json_encode($success_cancel_reserveation_message); ?>';

    if (success_cancel_reserveation_message == "true")
    {
        Swal.fire({
            icon: 'success',
            title: 'Reservation Cancellation Success',
            text: 'You have cancelled a reservation.',
        });
    }

    $(document).on("click", "button#cancel-reservation", function(event) {

        event.preventDefault();

        Swal.fire({
            title: 'Cancel Reservation',
            text: "Are you sure to cancel your reservation?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed)
                $("form#form-reserved").submit();
        })

    });

});

</script>

<?php require_once ('../layouts/footer.php'); ?>
