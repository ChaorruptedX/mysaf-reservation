<?php require_once ('../layouts\header.php'); ?>

<div>
    <br>
    <h1>Register User</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>"><button class="form back">Back</button></a>
</div>

<div class="wrapper form">
    <form>
        <label class="form" for="name">Name</label>
        <input class="input form" type="text" id="name" name="name" placeholder="Enter Name">

        <label  class="form" for="email">Email Address</label>
        <input  class="input form" type="email" id="email" name="email" placeholder="Enter Email">

        <label  class="form" for="phone">Phone Number</label>
        <input  class="input form" type="text" id="phone" name="phone" placeholder="Enter Phone Number">

        <label  class="form" for="roles">Roles</label>
        <select id="roles" name="roles">
            <option value="admin">System Admin</option>
            <option value="ajk">Mosque Committee</option>
        </select>

        <button class="form submit">Register</button>
  </form>
</div>

<?php require_once ('../layouts\footer.php'); ?>