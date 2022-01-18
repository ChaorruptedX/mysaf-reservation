<?php require_once ('../layouts/header.php');  committeeSession(); ?>

<?php
    try
    {
        $stmt = $conn->prepare("
            SELECT
                id,
                id_personal_detail,
                name,
                open_time,
                close_time,
                maximum_capacity,
                created_at,
                updated_at
            FROM reservation
            WHERE
                deleted_at = '0'
            ORDER BY
                created_at DESC
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
            <td><?php echo $rows['open_time'];?></td>
            <td><?php echo $rows['close_time'];?></td>
            <td><?php echo $rows['maximum_capacity'];?></td>
            <td align="center">
                <button class="edit-user"><a href="update-reservation.php" class="button-action">Edit</a></button> 
                <button class="delete-user"><a id="remove-user-link" href="delete-reservation.php?id=<?php echo $rows["id"];?>" class="button-action">Delete</a></button>
                <button class="view-reservation"><a id="" href="view-reservation-list.php" class="button-action">View</a></button>
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

        let reservation_name = $(this).parent().siblings("td#reservation-name").html();
        let remove_reservation_link = $(this).children("a#remove-reservation-link").attr("href");
        console.log(reservation_name);
        event.preventDefault();

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

