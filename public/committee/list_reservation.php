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
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rows['open_time'];?></td>
            <td><?php echo $rows['close_time'];?></td>
            <td><?php echo $rows['maximum_capacity'];?></td>
            <td align="center">
                <button class="edit-user"><a href="update-user.php?id=<?php echo $data["id"];?>" class="button-action">Edit</a></button> 
                <button class="delete-user"><a id="remove-user-link" href="delete-user.php?id=<?php echo $data["id"];?>" class="button-action">Delete</a></button>
                <button class="view-reservation"><a id="" href="view-reservation-list.php" class="button-action">View</a></button>
            </td>
        </tr>
    
<?php
    }
?>
</tbody>
</body>
<?php require_once ('../layouts/footer.php'); ?>

