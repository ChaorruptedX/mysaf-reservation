<?php
require_once ('../layouts/header.php');  committeeSession();
try
{
$stmt = $conn->prepare("SELECT id,id_personal_detail,name,open_time,close_time,maximum_capacity,created_at,updated_at from reservation ");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$row = $stmt->fetchAll();
}

catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
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
        </tr>
    
<?php
    }
?>
</tbody>
</body>
<?php require_once ('../layouts/footer.php'); ?>

