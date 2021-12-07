<?php require_once ('../layouts\header.php'); ?>

<div>
    <br>
    <h1>List of Users</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/register-user.php' ?>"><button class="button register-user">Register User</button></a>
</div>

<table id="user">
<br>
  <tr>
    <th>No.</th>
    <th>Name</th>
    <th>Phone Number</th>
    <th>Roles</th>
    <th>Actions</th>
  </tr>

  <tr>
    <td>1</td>
    <td>Fahmi</td>
    <td>0126636312</td>
    <td>Admin</td>
    <td>Edit | Delete</td>
  </tr>

  <tr>
    <td>1</td>
    <td>Fahmi</td>
    <td>0126636312</td>
    <td>Admin</td>
    <td>Edit | Delete</td>
  </tr>

  <tr>
    <td>1</td>
    <td>Fahmi</td>
    <td>0126636312</td>
    <td>Admin</td>
    <td>Edit | Delete</td>
  </tr>

</table>

<?php require_once ('../layouts\footer.php'); ?>