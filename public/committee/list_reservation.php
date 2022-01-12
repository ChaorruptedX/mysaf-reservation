<?php
session_start();
// include_once"customerheader.php";
// require_once ('../layouts/header.php'); // committeeSession();

$stmt = $conn->prepare("SELECT id,id_personal_detail,name,open_time,close_time,maximum_capacity,created_at,updated_at from reservation ");
$stmt->execute();
$run = $stmt->get_result();
$stmt->close();  
$check=mysqli_num_rows($run);
?>

<link rel ="stylesheet" href="../../assets/css/list_css.css">
<body>
<table align="center" class="styled-table">
    <thead>
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
    if($check>0)
    {
        while($rows=mysqli_fetch_assoc($run))
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
    }
    else
    {
        echo "<h2 class=\"center\">There are no reservation history</h2>";
    }
?>

</body>
<!-- <?php require_once ('../layouts/footer.php'); ?> -->

