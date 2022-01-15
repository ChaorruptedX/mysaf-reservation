<?php
require_once ('../layouts/header.php'); // committeeSession();
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

<link rel="stylesheet" type="text/css" href="<?= constant("BASEURL") . 'assets/css/list_css.css' ?>">
<body>
<table class="styled-table">
    <thead>
        <h2 align="center">List of Reservation</h2>
        <tr>
            <th>ReserveID</th>
            <th>StaffID</th>
            <th>Mosque Name</th>
            <th>Date open </th>
            <th>Date close</th>
            <th>Maximum Capacity</th>
            <th>Created on</th>
            <th>Last Updated on</th>
        </tr>
    </thead>
    <?php
    foreach($row as $rows)
    {
    ?>

    <tbody>       
        <tr>
            <td><?php echo $rows['id'];?></td>
            <td><?php echo $rows['id_personal_detail'];?></td>
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rows['open_time'];?></td>
            <td><?php echo $rows['close_time'];?></td>
            <td><?php echo $rows['maximum_capacity'];?></td>
            <td><?php echo $rows['created_at'];?></td>
            <td><?php echo $rows['updated_at'];?></td>
        </tr>
    </tbody>
<?php
    }
?>
</body>
<!-- <?php require_once ('../layouts/footer.php'); ?> -->

