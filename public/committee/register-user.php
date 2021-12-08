<?php require_once ('../layouts/header.php'); ?>

<div>
    <br>
    <h1>Register User</h1>
    <a href="<?= constant("BASEURL") . 'public/committee/user-management.php' ?>"><button class="form back">Back</button></a>
</div>

<div class="wrapper form">
    <form id="register-user">
        <label class="form" for="name">Name</label>
        <input class="input form" type="text" id="name" name="name" placeholder="Enter Name" required>
        
        <label class="form" for="email">Email Address</label>
        <input class="input form" type="email" id="email" name="email" placeholder="Enter Email" required>

        <label class="form" for="phone">Phone Number</label>
        <input class="input form" type="text" id="phone" name="phone" placeholder="Enter Phone Number" required>

        <label class="form" for="roles">Roles</label>
        <select id="roles" name="roles" required>
            <option value="">Please Select ...</option>
            <option value="admin">System Admin</option>
            <option value="ajk">Mosque Committee</option>
        </select>

        <button class="form submit">Register</button>
  </form>
</div>

<script type="text/javascript">

$(function() { // Shorthand for $( document ).ready()

    $("form#register-user").validate({ // Sign In Validation
        errorElement: "div",
        errorClass: "validation-error form-validation",
        rules: {
            phone: {
                number: true,
            }
        },
        messages: {
            name: {
                required: "Name is required",
            },
            email: {
                required: "Email Address is required",
                email: "Email address must be in the format of name@domain.com"
            },
            phone: {
                required: "Phone Number is required",
            },
            roles: {
                required: "User Role is required",
            },
        },
    });

});

</script>

<?php require_once ('../layouts/footer.php'); ?>