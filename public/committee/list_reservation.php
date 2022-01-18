<?php require_once ('../layouts/header.php');  committeeSession(); ?>

<?php
    try
    {
        $stmt = $conn->prepare("
            SELECT
                reservation.id,
                name,
                open_time,
                close_time,
                maximum_capacity,
                COUNT(user_reservation.id) AS user_reserved
            FROM reservation
            LEFT JOIN user_reservation
                ON reservation.id = user_reservation.id_reservation AND user_reservation.status = '1' AND user_reservation.deleted_at = '0'
            WHERE
                reservation.deleted_at = '0'
            GROUP BY
                reservation.id
            ORDER BY
                reservation.created_at DESC
        ");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $row = $stmt->fetchAll();
    }
    catch(PDOException $e)
    {
        dd("Error: " . $e->getMessage());
    }
?>

<body>
<table class="styled-table data-table">
    <thead>
        <h2 align="center">List of Reservation</h2>
        <tr>
            <th>No.</th>
            <th>Reservation Name</th>
            <th>Date open </th>
            <th>Date close</th>
            <th>Max Capacity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>  
    <?php
    foreach($row as $key => $rows)
    {
    ?>

         
        <tr>
            <td><?= isset($key) ? ++$key : $key = 1; ?></td>
            <td id="reservation-name"><?php echo $rows['name'];?></td>
            <td><?php echo getFullDateTimeFormat($rows['open_time']);?></td>
            <td><?php echo getFullDateTimeFormat($rows['close_time']);?></td>
            <td><?php echo $rows['user_reserved'] ." / ". $rows['maximum_capacity'];?></td>
            <td align="center">
                <a href="view-reservation-list.php?id=<?php echo $rows["id"];?>" class="button-action"><button class="view-reservation">View</button></a>
                <a href="update-reservation.php?id=<?php echo $rows["id"];?>" class="button-action"><button class="edit-user">Edit</button></a>
                <a id="remove-reservation-link" href="delete-reservation.php?id=<?php echo $rows["id"];?>" class="button-action"><button class="delete-user">Delete</button></a>
            </td>
        </tr>
    
<?php
    }
?>
</tbody>
</body>

<script type="text/javascript">

$(function() { // Shorthand for $( document ).ready()

    $(document).on("click", "button.delete-user", function(event) {

        event.preventDefault();

        let reservation_name = $(this).parent().parent().siblings("td#reservation-name").html();
        let remove_reservation_link = $(this).parent("a#remove-reservation-link").attr("href");

        Swal.fire({
            title: 'Remove Reservation',
            html: "Are you sure to remove reservation <b>" + reservation_name + "</b> ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed)
                $(location).attr('href', remove_reservation_link);
        })

    });

});

</script>
<?php require_once ('../layouts/footer.php'); ?>

