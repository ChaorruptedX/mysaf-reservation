<?php require_once ('layouts\header.php'); ?>
<!DOCTYPE html>
<html lang="en">

<body>
    <div class="background">
    <form>
        <h3>Login Here</h3>
        <h4><a href="https://www.w3schools.com/">New user? Click here to register.</a></h4>

        <label for="username">Username</label>
        <input type="text" placeholder="Email or Phone" id="username" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" required>

        <button>Log In</button>
    </form>
    </div>
</body>
</html>

<?php require_once ('layouts\footer.php'); ?>