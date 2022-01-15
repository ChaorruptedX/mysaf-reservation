<?php require_once ('../layouts/header.php'); committeeSession(); ?>

<?php 
    try 
    {
        $stmt = $conn->prepare("
            SELECT
                user.id,
                personal_detail.name,
                user.email,
                personal_detail.tel_no,
                user.id_role AS ROLE,
                lookup_role.description AS role_desc
            FROM personal_detail
            LEFT JOIN user
                ON personal_detail.id_user = user.id
            LEFT JOIN lookup_role
                ON user.id_role = lookup_role.id
            WHERE
                personal_detail.deleted_at='0'
                AND user.deleted_at='0'
                AND user.id_role != '" . lookupRole($conn, "SA001")['id'] . "'
        ");

          $stmt->execute();

          // Set the Resulting Array to Associative
          $stmt->setFetchMode(PDO::FETCH_ASSOC);

          $row = $stmt->fetchAll();
    }
    catch (PDOException $e)
    {
        dd("Error: " . $e->getMessage());
    }
?>

<div>
    <br>
    <h1>List of Users</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/register-user.php' ?>"><button class="button register-user">Register User</button></a>
</div>

<div style="width: 90%;">

    <table id="user" class="data-table" style="width: 100%;">
        <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Role</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php foreach ($row as $data) : ?> <!-- LOOP TILL END OF DATA  -->
                <tr>
                    <!--FETCHING DATA FROM EACH ROW OF EVERY COLUMN-->
                    <td><?= $data['name']; ?></td>
                    <td><?= $data['email']; ?></td>
                    <td><?= $data['tel_no']; ?></td>
                    <td><?= $data['role_desc']; ?></td>
                    <td align="center"><button class="edit-user"><a href="update-user.php?id=<?php echo $data["id"];?>" class="button-action">Edit</a> </button> <button class="delete-user"><a href="delete-user.php?id=<?php echo $data["id"];?>" class="button-action">Delete</a></button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<?php require_once ('../layouts/footer.php'); ?>

