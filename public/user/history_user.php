<?php require_once ('layouts/header.php'); guestSession(); ?>
<?php
try
{
$stmt = $conn->prepare("SELECT id,status from user_reservation ");
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
            <th>ID</th>
            <th>Status</th>
        </tr>
    </thead>
    <?php
    foreach($row as $rows)
    {
    ?>

    <tbody>       
        <tr>
            <td><?php echo $rows['id'];?></td>
            <td>
            <?php
            if($rows['status']==1){
                echo '<button class =" bttn attend"><a href="status.php?id=' .$rows['id'].'&status=0">Attend</a></button>';
            }else{
                echo '<button class = "bttn cancel"><a href="status.php?id='.$rows['id'].'&status=1">Canceled</a></button>'; 
            }
            ?>
            </td>
        </tr>
    </tbody>
<?php
    }

?>
</body>
<?php require_once ('../layouts/footer.php'); ?>